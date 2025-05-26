<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos Cadastrados</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #004080;
            margin-bottom: 30px;
        }

        .buttons {
            text-align: center;
            margin-bottom: 20px;
        }

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

        .buttons button:hover {
            background-color: #0066cc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #004080;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        a {
            color: #004080;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h2>Lista de Alunos Cadastrados</h2>

    <div class="buttons">
        <button onclick="window.location.href='adm.html'">Voltar</button>
        <button onclick="window.location.href='exportar_csv.php'">Exportar CSV</button>
        <button onclick="window.location.href='exportar_pdf.php'">Exportar PDF</button>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>RA</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Ações</th>
        </tr>

        <?php
        include("conexao.php");
        $sql = "SELECT * FROM alunos";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
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
            echo "<tr><td colspan='6'>Nenhum aluno cadastrado.</td></tr>";
        }

        $conn->close();
        ?>
    </table>

</body>
</html>
