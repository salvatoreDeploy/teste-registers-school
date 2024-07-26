<?php

namespace Source\Models;

use Database;

class Students extends Database
{
    public function __construct(){
        parent:: __construct();
    }

    public function register(string $name, string $birth_date, string $cpf){

        if ($this->verificarCPF($cpf)) {
            echo "<a href='../../index.php'>Voltar</a> ";
            die("Aluno ja cadastrado com esse CPF");
        }

        $sql = "INSERT INTO students (name, birth_date, cpf) VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Erro ao preparar a consulta: " . $this->conn->error);
        }

        $stmt->bind_param("sss", $name, $birth_date, $cpf);

        if(!$stmt->execute()){
            echo "Erro ao cadastrar aluno: " . $stmt->error;
        }

        $stmt->close();
    }

    public function verificarCPF($cpf) {
        $query = "SELECT COUNT(*) as total FROM students WHERE cpf = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $cpf);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['total'] > 0;
    }

    public function getAllStudents(): array{
        $sql = "SELECT * FROM students";
        $result =  $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}