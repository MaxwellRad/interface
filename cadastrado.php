<?php
// Inclui o arquivo que faz a conexão com o banco de dados
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //  Recebendo os dados do formulário ou definindo como vazio caso não venham
    $nome = $_POST['nome'] ?? '';
    $ra = $_POST['ra'] ?? '';
    $email = $_POST['email'] ?? '';
    $curso = $_POST['curso'] ?? '';
} else {
    //  Se o acesso não for via POST, redireciona para o formulário
    header("Location: formulario_.php");
    exit();
}

// Monta a query SQL para inserir os dados
$sql = "INSERT INTO alunos (nome, ra, email, curso) 
        VALUES ('$nome', '$ra', '$email', '$curso')";
// Executa a query e verifica o resultado
if ($conn->query($sql) === TRUE) {
    $mensagem = "Cadastro realizado com sucesso!";
} else {
    $mensagem = "Erro no cadastro: " . $conn->error;
}
//  Fechamento da conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro Concluído</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <!--  Mensagem de sucesso -->
    <h2>Cadastro realizado com sucesso!</h2>

     <!--  Exibe os dados cadastrados de forma segura -->
    <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
    <p><strong>RA:</strong> <?php echo htmlspecialchars($ra); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>Curso:</strong> <?php echo htmlspecialchars($curso); ?></p>

    <br>
    <!--  Link para voltar ao formulário e cadastrar outro aluno -->
    <a href="formulario_.php">Cadastrar novo aluno</a>



</body>
</html>
