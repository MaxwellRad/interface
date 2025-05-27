<?php
// Carrega o autoload do Composer, que inclui todas as dependências, como Dompdf
require_once __DIR__ . '/vendor/autoload.php';

// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Importa as classes necessárias do Dompdf
use Dompdf\Dompdf;
use Dompdf\Options;

// ==============================
// 🔧 CONFIGURAÇÃO DO DOMPDF
// ==============================

// Cria uma instância das opções do Dompdf
$options = new Options();

// Habilita o uso de recursos externos (ex.: imagens, fontes, CSS externo)
$options->set('isRemoteEnabled', true);

// Cria uma instância do Dompdf com as opções configuradas
$dompdf = new Dompdf($options);

// ==============================
//  ESTRUTURA DO HTML + CSS
// ==============================

$html = '
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Alunos</title>
    <style>
        /* Estilo do corpo do documento */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        /* Estilo do título */
        h2 {
            text-align: center;
            color: #004080;
        }

        /* Estilo da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Cabeçalho da tabela */
        thead {
            background-color: #004080;
            color: white;
        }

        /* Células da tabela */
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        /* Efeito zebra nas linhas da tabela */
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Efeito hover nas linhas */
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

// ==============================
//  CONSULTA AO BANCO DE DADOS
// ==============================

// Query para selecionar todos os alunos cadastrados
$sql = "SELECT * FROM alunos";
$resultado = $conn->query($sql);

// Verifica se há registros retornados
if ($resultado->num_rows > 0) {
    // Percorre cada registro (linha) retornado do banco
    while ($row = $resultado->fetch_assoc()) {
        // Adiciona uma linha na tabela HTML com os dados do aluno
        $html .= '<tr>
                    <td>' . htmlspecialchars($row["id"]) . '</td>
                    <td>' . htmlspecialchars($row["nome"]) . '</td>
                    <td>' . htmlspecialchars($row["ra"]) . '</td>
                    <td>' . htmlspecialchars($row["email"]) . '</td>
                    <td>' . htmlspecialchars($row["curso"]) . '</td>
                  </tr>';
    }
} else {
    // Caso não haja alunos cadastrados, exibe uma mensagem
    $html .= '<tr><td colspan="5">Nenhum aluno cadastrado.</td></tr>';
}

// Fecha as tags do HTML
$html .= '
        </tbody>
    </table>
</body>
</html>';

// ==============================
//  GERAÇÃO DO PDF COM DOMPDF
// ==============================

// Carrega o conteúdo HTML no Dompdf
$dompdf->loadHtml($html);

// Define o tamanho da folha e a orientação (A4 e retrato)
$dompdf->setPaper('A4', 'portrait');

// Renderiza o PDF (converte o HTML em PDF)
$dompdf->render();

// Envia o PDF para download no navegador
$dompdf->stream('alunos.pdf', [
    'Attachment' => true // Se 'true' faz download, se 'false' abre no navegador
]);

// ==============================
//  ENCERRAMENTO
// ==============================

// Fecha a conexão com o banco de dados
$conn->close();
?>
