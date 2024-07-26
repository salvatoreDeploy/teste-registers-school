<?php

namespace Source\Models;

use Database;

class Report extends Database
{
    public function __construct() {
       parent::__construct();
    }

    public function classCall(int $id_classe)
    {
        $enrollment = new Enrollment();

        $studentsListClass = $enrollment->getListByClass($id_classe);

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