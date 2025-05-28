<?php
//  Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

//  Verifica se o parâmetro 'id' foi passado via URL
if (isset($_GET['id'])) {
    //  Pega o 'id' do aluno que veio da URL
    $id = $_GET['id'];

    //  Cria uma consulta SQL para buscar os dados do aluno com o ID fornecido
    $sql = "SELECT * FROM alunos WHERE id=$id";

    //  Executa a consulta
    $resultado = $conn->query($sql);

    //  Verifica se encontrou algum aluno com aquele ID
    if ($resultado->num_rows > 0) {
        //  Se encontrou, pega os dados do aluno e armazena na variável $aluno
        $aluno = $resultado->fetch_assoc();
    } else {
        //  Se não encontrou, exibe uma mensagem e encerra o script
        echo "Aluno não encontrado.";
        exit;
    }
} else {
    //  Se não recebeu o ID pela URL, exibe mensagem e encerra o script
    echo "ID não fornecido.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <!--  Título da Página -->
    <h2>Editar Aluno</h2>

    <!--  Formulário para atualizar os dados do aluno -->
    <form action="atualizar.php" method="post">
        <!--  Campo oculto que carrega o ID do aluno (necessário para o update) -->
        <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">

        <!--  Campo Nome -->
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>" required><br><br>

        <!--  Campo RA -->
        <label>RA:</label><br>
        <input type="text" name="ra" value="<?php echo $aluno['ra']; ?>" required><br><br>

        <!--  Campo Email -->
        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $aluno['email']; ?>" required><br><br>

        <!--  Campo Curso -->
        <label>Curso:</label><br>
        <input type="text" name="curso" value="<?php echo $aluno['curso']; ?>" required><br><br>

        <!--  Botões -->
        <button type="submit">Atualizar</button> <!-- Salva as alterações -->
        <button type="button" onclick="window.location.href='select.php'">Cancelar</button> <!-- Cancela e volta -->
    </form>

</body>
</html>

