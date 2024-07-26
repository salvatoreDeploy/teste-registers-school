<?php
use Source\Models\Students;

require '../Models/Database.php';
require '../Models/Students.php';

$students = new Students();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $birth_date = $_POST["birth_date"];
    $cpf = $_POST["cpf"];

    $students->register($name, $birth_date, $cpf);

    echo "Aluno cadastrado com sucesso! ";
    echo '<a href="../../index.php">Voltar</a>';
}