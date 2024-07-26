<?php

use Source\Models\Enrollment;

require '../Models/Database.php';
require '../Models/Report.php';
require '../Models/Enrollment.php';


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $enrollments = new Enrollment();

    $id_classe = $_GET['id_classe'];

    $enrollment = $enrollments->getListByClass($id_classe);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola - Sistema de Matrículas</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
    <body>
       <div>
           <header>
               <h2>Relatório de Matrículas da Turma <?php echo htmlspecialchars($id_classe); ?></h2>
           </header>
           <table>
               <tr>
                   <th>Nome</th>
                   <th>Data de Nascimento</th>
                   <th>Chamada</th>
               </tr>
               <?php foreach ($enrollment as $present): ?>
                   <tr>
                       <td><?php echo htmlspecialchars($present['name']); ?></td>
                       <td><?php $dateOfBirth = new DateTime($present['birth_date']); echo $dateOfBirth->format('d/m/Y'); ?></td>
                       <td><input type="checkbox"></td>
                   </tr>
               <?php endforeach; ?>
           </table>
       </div>
        <a href="../../index.php">Voltar</a>
    </body>
</html>
<?php
}
?>