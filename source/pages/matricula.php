<?php

use Source\Models\Enrollment;

require '../Models/Database.php';
require '../Models/Enrollment.php';
require '../Models/Classes.php';

$enrollment = new Enrollment();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_student = $_POST["id_student"];
    $id_classe = $_POST["id_classe"];
    $registration_date = $_POST["registration_date"];

    $enrollment->register($id_student, $id_classe, $registration_date);

    echo "Aluno matriculado com sucesso! ";
    echo '<a href="../../index.php">Voltar</a>';
}