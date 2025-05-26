<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'] ?? '';
    $ra = $_POST['ra'] ?? '';
    $email = $_POST['email'] ?? '';
    $curso = $_POST['curso'] ?? '';
} else {
    header("Location: formulario_.");
    exit();
}
$sql = "INSERT INTO alunos (nome, ra, email, curso) VALUES ('$nome', '$ra', '$email', '$curso')";

if ($conn->query($sql) === TRUE) {
    $mensagem = "Cadastro realizado com sucesso!";
} else {
    $mensagem = "Erro no cadastro: " . $conn->error;
}

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
 
    <h2>Cadastro realizado com sucesso!</h2>
    <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
    <p><strong>RA:</strong> <?php echo htmlspecialchars($ra); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>Curso:</strong> <?php echo htmlspecialchars($curso); ?></p>

    <br>
    <a href="formulario_.php">Cadastrar novo aluno</a>



</body>
</html>
