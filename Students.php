<?php

class Students
{
    # TODO: validar se ja tem esse cpf cadastrado
    private Database $database;

    public function __construct(Database $database){
        $this->database = $database;
    }

    public function register(string $name, string $birth_date, string $cpf){

        $sql = "INSERT INTO students (name, birth_date, cpf) VALUES (?, ?, ?)";

        $stmt = $this->database->conn->prepare($sql);

        if ($stmt === false) {
            die("Erro ao preparar a consulta: " . $this->db->conn->error);
        }

        $stmt->bind_param("sss", $name, $birth_date, $cpf);

        if($stmt->execute()){
            echo "Students cadastrado com sucesso.";
        }else {
            echo "Erro ao cadastrar aluno: " . $stmt->error;
        }

        $stmt->close();
    }

    public function getAllStudents(): array{
        $sql = "SELECT * FROM students";
        $result =  $this->database->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}