<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM alunos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Aluno apagado com sucesso!'); window.location.href='select.php';</script>";
    } else {
        echo "Erro ao apagar: " . $conn->error;
    }
} else {
    echo "ID não fornecido.";
}

$conn->close();
?>
