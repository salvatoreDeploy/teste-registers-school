<?php

require '../Database.php';
require '../Classes.php';

$database = new Database();
$classes = new Classes($database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST["description"];
    $year_at = $_POST["year_at"];
    $vacancies = $_POST["vacancies"];

    $classes->create($description, $year_at, $vacancies);

    echo "Turma cadastrada com sucesso.<br>";
    echo '<a href="../index.php">Voltar</a>';
}