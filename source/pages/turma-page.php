<?php

use Source\Models\Classes;

require '../Models/Database.php';
require '../Models/Classes.php';

$classes = new Classes();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST["description"];
    $year_at = $_POST["year_at"];
    $vacancies = $_POST["vacancies"];

    $classes->create($description, $year_at, $vacancies);

    echo "Turma criada com sucesso.<br> ";
    echo '<a href="../../index.php">Voltar</a>';
}