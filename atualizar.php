<?php
include("conexao.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    $sql = "UPDATE alunos SET nome='$nome', ra='$ra', email='$email', curso='$curso' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Aluno atualizado com sucesso!'); window.location.href='select.php';</script>";
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
} else {
    echo "Dados não recebidos.";
}

$conn->close();
?>
