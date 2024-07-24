<?php
    require 'Database.php';
    require 'Aluno.php';

    $database = new Database();

    $aluno = new Aluno($database);
    $aluno->register('Pedro', '1991-01-01', '123456789');