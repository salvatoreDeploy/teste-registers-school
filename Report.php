<?php

class Report
{
    private Database $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function classCall(int $id_classe)
    {
        $enrollment = new Enrollment($this->database);

        $studentsListClass = $enrollment->getListByClass(1);

        echo "<table border='1'>";
        echo "<tr><th>Nome</th><th>Data de Nascimento</th><th>Chamada</th></tr>";

        foreach ($studentsListClass as $student) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($student['name']) . "</td>";
            echo "<td>" . htmlspecialchars($student['birth_date']) . "</td>";
            echo "<td><input type='checkbox' name='chamada[]'></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}