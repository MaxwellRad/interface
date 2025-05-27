<?php
// ================================================
//  Conexão com o banco de dados
// ================================================
include("conexao.php");

// ================================================
//  Cabeçalhos HTTP para informar que o conteúdo é um arquivo CSV
// ================================================

// Define o tipo do conteúdo como CSV e o charset como UTF-8
header('Content-Type: text/csv; charset=utf-8');

// Define que o arquivo será baixado e o nome dele será 'alunos.csv'
header('Content-Disposition: attachment; filename=alunos.csv');

// ================================================
//  Criação do arquivo CSV
// ================================================

// Abre a saída padrão (php://output) para escrita
$output = fopen('php://output', 'w');

//  Escreve a primeira linha do CSV, que são os nomes das colunas
fputcsv($output, array('ID', 'Nome', 'RA', 'Email', 'Curso'));

// ================================================
//  Consulta os dados da tabela 'alunos'
// ================================================
$sql = "SELECT * FROM alunos";
$resultado = $conn->query($sql);

//  Verifica se há registros
if ($resultado->num_rows > 0) {
    //  Loop para percorrer cada linha retornada pela consulta
    while ($row = $resultado->fetch_assoc()) {
        //  Escreve cada linha de dados no CSV
        fputcsv($output, $row);
    }
}

//  Fecha o ponteiro de escrita no CSV
fclose($output);

// Encerra a conexão com o banco de dados
$conn->close();
?>
