<?php
include("conexao.php");

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=alunos.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Nome', 'RA', 'Email', 'Curso'));

$sql = "SELECT * FROM alunos";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

fclose($output);
$conn->close();
?>
