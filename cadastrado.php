<?php
// ============================================
//  CONEXÃO COM O BANCO DE DADOS
// ============================================
// Inclui o arquivo que faz a conexão com o banco de dados
include("conexao.php");

// ============================================
//  VERIFICAÇÃO DO MÉTODO DE ENVIO (POST)
// ============================================
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

// ============================================
//  INSERÇÃO DOS DADOS NO BANCO
// ============================================
// Monta a query SQL para inserir os dados
$sql = "INSERT INTO alunos (nome, ra, email, curso) 
        VALUES ('$nome', '$ra', '$email', '$curso')";

// Executa a query e verifica o resultado
if ($conn->query($sql) === TRUE) {
    $mensagem = "Cadastro realizado com sucesso!";
} else {
    $mensagem = "Erro no cadastro: " . $conn->error;
}

// ============================================
//  FECHAMENTO DA CONEXÃO
// ============================================
$conn->close();
?>
