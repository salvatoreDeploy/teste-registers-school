<?php

require '../Database.php';
require '../Enrollment.php';
require '../Classes.php';

$database = new Database();
$enrollment = new Enrollment($database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_student = $_POST["id_student"];
    $id_classe = $_POST["id_classe"];
    $registration_date = $_POST["registration_date"];

    $enrollment->register($id_student, $id_classe, $registration_date);

    echo "Aluno cadastrado com sucesso!";
    echo '<a href="../index.php">Voltar</a>';
}