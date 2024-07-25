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
<form action="aluno.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" id="data_nascimento" name="data_nascimento" required>

    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" required>

    <input type="submit" value="Cadastrar Aluno">
</form>

<h2>Registrar nova Turma</h2>
<form action="turma.php" method="post">
    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" required>

    <label for="ano">Ano:</label>
    <input type="number" id="ano" name="ano" required>

    <label for="vagas">Vagas:</label>
    <input type="number" id="vagas" name="vagas" required>

    <input type="submit" value="Cadastrar Turma">
</form>

<h2>Realizar Matrícula</h2>
<form action="matricula.php" method="post">
    <label for="id_aluno">CPF aluno:</label>
    <input type="number" id="id_aluno" name="id_aluno" required>

    <label for="id_turma">Selecionar Turma:</label>
    <input type="number" id="id_turma" name="id_turma" required>

    <label for="data_matricula">Data da Matrícula:</label>
    <input type="date" id="data_matricula" name="data_matricula" required>

    <input type="submit" value="Cadastrar Matrícula">
</form>

<h2>Relatório de chamadas </h2>
<form action="relatorio.php" method="get">
    <label for="id_turma_relatorio">Selecionar Turma:</label>
    <input type="number" id="id_turma_relatorio" name="id_turma_relatorio" required>

    <input type="submit" value="Gerar Relatório">
</form>

</body>
</html>

