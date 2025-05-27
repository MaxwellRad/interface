<?php
// ===========================================
//  CONEXÃO COM O BANCO DE DADOS
// ===========================================
// Inclui o arquivo de conexão (conexao.php) que estabelece a conexão com o banco de dados
include("conexao.php");

// ===========================================
//  VERIFICAÇÃO DO MÉTODO POST
// ===========================================
// Verifica se o formulário foi enviado utilizando o método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ===========================================
    //  RECEBIMENTO DOS DADOS DO FORMULÁRIO
    // ===========================================
    // Obtém os dados enviados pelo formulário HTML
    $nome = $_POST["nome"];
    $ra = $_POST["ra"];
    $email = $_POST["email"];
    $curso = $_POST["curso"];

    // ===========================================
    //  QUERY SQL PARA INSERIR DADOS
    // ===========================================
    // Monta a query SQL para inserir os dados na tabela 'alunos'
    $sql = "INSERT INTO alunos (nome, ra, email, curso) 
            VALUES ('$nome', '$ra', '$email', '$curso')";

    // ===========================================
    //  EXECUÇÃO DA QUERY E RETORNO
    // ===========================================
    // Executa a query e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        // Mensagem de sucesso
        echo "Aluno cadastrado com sucesso!";
    } else {
        // Mensagem de erro, exibindo o erro do banco
        echo "Erro ao cadastrar: " . $conn->error;
    }

    // ===========================================
    //  FECHAMENTO DA CONEXÃO
    // ===========================================
    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
