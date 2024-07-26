<?php
require __DIR__ . '/vendor/autoload.php';

use Source\Models\Classes;

require 'source/Models/Database.php';
require 'source/Models/Classes.php';

$classes = new Classes();
$fetchClasses = $classes->getAllClasses();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola - Sistema de Matrículas</title>
    <link rel="stylesheet" href="source/styles/style.css">
</head>
<body>

<header>
    <div>
        <h1>Escola - Sistema de Matrículas</h1>
    </div>
</header>

<h2>Cadastrar novo Aluno</h2>
<form action="source/pages/aluno-page.php" method="post">
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" required>

    <label for="birth_date">Data de Nascimento:</label>
    <input type="date" id="birth_date" name="birth_date" required>

    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" required>

    <input type="submit" value="Cadastrar Aluno">
</form>

<h2>Registrar nova Turma</h2>
<form action="source/pages/turma-page.php" method="post">
    <label for="description">Descrição:</label>
    <input type="text" id="description" name="description" required>

    <label for="year_at">Ano:</label>
    <input type="number" id="year_at" name="year_at" required>

    <label for="vacancies">Vagas:</label>
    <input type="number" id="vacancies" name="vacancies" required>

    <input type="submit" value="Cadastrar Turma">
</form>

<h2>Realizar Matrícula</h2>
<form action="source/pages/matricula.php" method="post">
    <label for="id_student">ID aluno:</label>
    <input type="number" id="id_student" name="id_student" required>

    <label for="id_classe">Selecionar Turma:</label>
    <select id="id_classe" name="id_classe">
        <?php
            $fetchClasses = $classes->getAllClasses();
        ?>
        <option value="">Selecione uma turma</option>
        <?php foreach ($fetchClasses as $class): ?>
            <option value="<?php echo $class['id']; ?>"><?php echo htmlspecialchars($class['description']); ?></option>
        <?php endforeach; ?>
    </select>

    <label for="registration_date">Data da Matrícula:</label>
    <input type="date" id="registration_date" name="registration_date" required>

    <input type="submit" value="Cadastrar Matrícula">
</form>

<h2>Relatório de chamadas </h2>
<form action="source/pages/relatorio-chamada.php" method="get">
    <label for="id_classe">Selecionar Turma:</label>
    <select id="id_classe" name="id_classe">
        <?php
        $fetchClasses = $classes->getAllClasses();
        ?>
        <option value="">Selecione uma turma</option>
        <?php foreach ($fetchClasses as $class): ?>
            <option value="<?php echo $class['id']; ?>"><?php echo htmlspecialchars($class['description']); ?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" value="Gerar Relatório">
</form>

</body>
</html>

