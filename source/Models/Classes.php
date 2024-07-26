<?php

namespace Source\Models;

use Database;

class Classes extends Database
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create(string $description, int $year_at, int $vacancies): void
    {
        $sql = "INSERT INTO classes( description, year_at, vacancies) VALUES(?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if($stmt === false){
            die("Erro ao preparar a query " . $this->database->conn->error);
        }

        $stmt->bind_param("ssi", $description, $year_at, $vacancies);
        if(!$stmt->execute()){
            echo "Erro ao cadastrar a turma Erro: " . $stmt->error;
        }

        $stmt->close();
    }

    public function getAllClasses(): array{
        $sql = "SELECT * FROM classes";
        $result = $this->conn->query($sql);

        if($result === null){
            die('Erro ao executar a consulta: ' . $this->database->conn->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAvailableVacancies(int $id_classes): int{
        $sql = "SELECT vacancies - COUNT(enrollment.id) AS available_vacancies 
                FROM classes
                LEFT JOIN enrollment ON classes.id = enrollment.id_classe
                WHERE classes.id = ?
                ";
        $stmt = $this->conn->prepare($sql);

        if($stmt === false){
            die("Erro ao preparar a consulta: " . $this->database->conn->error);
        }

        $stmt->bind_param("i", $id_classes);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['available_vacancies'] ?? 0;

    }
}