<?php
// Inclui o arquivo de conexão (conexao.php) que estabelece a conexão com o banco de dados
include("conexao.php");

// Verifica se o formulário foi enviado utilizando o método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtém os dados enviados pelo formulário HTML
    $nome = $_POST["nome"];
    $ra = $_POST["ra"];
    $email = $_POST["email"];
    $curso = $_POST["curso"];

    // Monta a query SQL para inserir os dados na tabela 'alunos'
    $sql = "INSERT INTO alunos (nome, ra, email, curso) 
            VALUES ('$nome', '$ra', '$email', '$curso')";

    // Executa a query e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        // Mensagem de sucesso
        echo "Aluno cadastrado com sucesso!";
    } else {
        // Mensagem de erro, exibindo o erro do banco
        echo "Erro ao cadastrar: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
