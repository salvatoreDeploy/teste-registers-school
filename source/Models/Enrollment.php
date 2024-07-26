<?php

namespace Source\Models;

use Database;

class Enrollment extends Database
{

    public function __construct()
    {
        parent::__construct();
    }

    private function countEnrollmentClass(int $id_classe): int {
        $sql = "SELECT COUNT(*) AS total FROM enrollment WHERE id_classe = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Erro ao preparar a consulta: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id_classe);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['total'];
    }

    public function register(int $id_student, int $id_classe, string $registration_date )
    {
        $classes = new Classes();
        $available_vacancies = $classes->getAvailableVacancies($id_classe);

        $total_number_enrolled = $this->countEnrollmentClass($id_classe);


        if($total_number_enrolled < $available_vacancies){
            $sql = "INSERT INTO enrollment (id_student, id_classe, registration_date) VALUES (?, ?, ?)";

            $stmt = $this->conn->prepare($sql);
            if ($stmt === false) {
                die("Erro ao preparar a consulta: " . $this->conn->error);
            }

            $stmt->bind_param("iss", $id_student, $id_classe, $registration_date);

            if(!$stmt->execute()){
                echo "Erro ao matricular aluno Erro: " . $stmt->error;
            }
            $stmt->close();
        }else{
            echo "Desculpe: Não ha vagas disponiveis na turma";
        }

    }

    public function getListByClass(int $id_classe): array
    {
        $sql = "SELECT students.name, students.birth_date
        FROM enrollment
        JOIN students ON enrollment.id_student = students.id
        WHERE enrollment.id_classe = ?";

        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Erro ao preparar a consulta: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id_classe);
        $stmt->execute();
        $result = $stmt->get_result();
        $listByClass = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $listByClass;
    }
}