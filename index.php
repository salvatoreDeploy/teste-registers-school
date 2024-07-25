<?php
require 'Database.php';
require 'Classes.php';

$database = new Database();
$classes = new Classes($database);
$fetchClasses = $classes->getAllClasses();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola - Sistema de Matrículas</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<header>
    <div>
        <h1>Escola - Sistema de Matrículas</h1>
    </div>
</header>

<h2>Cadastrar novo Aluno</h2>
<form action="pages/aluno-page.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="name" required>

    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" id="data_nascimento" name="birth_date" required>

    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" required>

    <input type="submit" value="Cadastrar Aluno">
</form>

<h2>Registrar nova Turma</h2>
<form action="pages/turma-page.php" method="post">
    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="description" required>

    <label for="ano">Ano:</label>
    <input type="number" id="ano" name="year_at" required>

    <label for="vagas">Vagas:</label>
    <input type="number" id="vagas" name="vacancies" required>

    <input type="submit" value="Cadastrar Turma">
</form>

<h2>Realizar Matrícula</h2>
<form action="pages/matricula.php" method="post">
    <label for="id_aluno">ID aluno:</label>
    <input type="number" id="id_aluno" name="id_student" required>

    <label for="id_turma">Selecionar Turma:</label>
    <select id="id_turma" name="id_classe">
        <?php
            $fetchClasses = $classes->getAllClasses();
        ?>
        <option value="">Selecione uma turma</option>
        <?php foreach ($fetchClasses as $class): ?>
            <option value="<?php echo $class['id']; ?>"><?php echo htmlspecialchars($class['description']); ?></option>
        <?php endforeach; ?>
    </select>

    <label for="data_matricula">Data da Matrícula:</label>
    <input type="date" id="data_matricula" name="registration_date" required>

    <input type="submit" value="Cadastrar Matrícula">
</form>

<h2>Relatório de chamadas </h2>
<form action="pages/relatorio-chamada.php" method="get">
    <label for="id_turma_relatorio">Selecionar Turma:</label>
    <select id="id_turma" name="id_classe">
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

