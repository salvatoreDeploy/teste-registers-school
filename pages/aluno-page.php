<?php
require '../Database.php';
require '../Students.php';

$database = new Database();
$students = new Students($database);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $birth_date = $_POST["birth_date"];
    $cpf = $_POST["cpf"];

    $students->register($name, $birth_date, $cpf);

    echo "Aluno cadastrado com sucesso!";
    echo '<a href="../index.php">Voltar</a>';
}