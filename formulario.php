<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $ra = $_POST["ra"];
    $email = $_POST["email"];
    $curso = $_POST["curso"];

    $sql = "INSERT INTO alunos (nome, ra, email, curso) VALUES ('$nome', '$ra', '$email', '$curso')";

    if ($conn->query($sql) === TRUE) {
        echo "Aluno cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    $conn->close();
}
?>
