<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'conexao.php'; // 🔗 Conexão com o banco de dados

use Dompdf\Dompdf;
use Dompdf\Options;

// Configurações do Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// HTML com estilo CSS
$html = '
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Alunos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #004080;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        thead {
            background-color: #004080;
            color: white;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Lista de Alunos Cadastrados</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>RA</th>
                <th>Email</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>';

// Consulta ao banco
$sql = "SELECT * FROM alunos";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $html .= '<tr>
                    <td>' . htmlspecialchars($row["id"]) . '</td>
                    <td>' . htmlspecialchars($row["nome"]) . '</td>
                    <td>' . htmlspecialchars($row["ra"]) . '</td>
                    <td>' . htmlspecialchars($row["email"]) . '</td>
                    <td>' . htmlspecialchars($row["curso"]) . '</td>
                  </tr>';
    }
} else {
    $html .= '<tr><td colspan="5">Nenhum aluno cadastrado.</td></tr>';
}

$html .= '
        </tbody>
    </table>
</body>
</html>';

// Carrega o HTML no Dompdf
$dompdf->loadHtml($html);

// Define o tamanho do papel e a orientação
$dompdf->setPaper('A4', 'portrait');

// Renderiza o PDF
$dompdf->render();

// Envia o PDF para download
$dompdf->stream('alunos.pdf', [
    'Attachment' => true
]);

// Fecha conexão
$conn->close();
?>
