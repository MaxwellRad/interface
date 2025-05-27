<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos Cadastrados</title>

    <!-- Estilos CSS para formatação da página -->
    <style>
        /* Estilo para o corpo da página */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        /* Estilo para o título principal */
        h2 {
            text-align: center;
            color: #004080;
            margin-bottom: 30px;
        }

        /* Estilo para o container dos botões */
        .buttons {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Estilo para os botões */
        .buttons button {
            background-color: #004080;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Efeito hover nos botões */
        .buttons button:hover {
            background-color: #0066cc;
        }

        /* Estilo para a tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        /* Estilo para células da tabela */
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        /* Estilo para cabeçalhos da tabela */
        th {
            background-color: #004080;
            color: white;
        }

        /* Estilo para linhas pares (efeito zebra) */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Efeito hover nas linhas da tabela */
        tr:hover {
            background-color: #e0e0e0;
        }

        /* Estilo para os links */
        a {
            color: #004080;
            text-decoration: none;
            font-weight: bold;
        }

        /* Efeito hover nos links */
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Título da página -->
    <h2>Lista de Alunos Cadastrados</h2>

    <!-- Botões de navegação e exportação -->
    <div class="buttons">
        <button onclick="window.location.href='adm.html'">Voltar</button>
        <button onclick="window.location.href='exportar_csv.php'">Exportar CSV</button>
        <button onclick="window.location.href='exportar_pdf.php'">Exportar PDF</button>
    </div>

    <!-- Tabela para exibir os alunos cadastrados -->
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>RA</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Ações</th>
        </tr>

        <!-- Código PHP para buscar e exibir os alunos cadastrados -->
        <?php
        // Inclui o arquivo de conexão com o banco de dados
        include("conexao.php");

        // Query para selecionar todos os alunos da tabela
        $sql = "SELECT * FROM alunos";
        $resultado = $conn->query($sql);

        // Verifica se há resultados
        if ($resultado->num_rows > 0) {
            // Percorre cada registro retornado
            while ($row = $resultado->fetch_assoc()) {
                // Cria uma linha da tabela para cada aluno
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["nome"]."</td>
                        <td>".$row["ra"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["curso"]."</td>
                        <td>
                            <a href='editar.php?id=".$row["id"]."'>Editar</a> | 
                            <a href='deletar.php?id=".$row["id"]."' onclick=\"return confirm('Tem certeza que deseja apagar este aluno?');\">Apagar</a>
                        </td>
                      </tr>";
            }
        } else {
            // Caso não haja alunos cadastrados
            echo "<tr><td colspan='6'>Nenhum aluno cadastrado.</td></tr>";
        }

        // Fecha a conexão com o banco
        $conn->close();
        ?>
    </table>

</body>
</html>
