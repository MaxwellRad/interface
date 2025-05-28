<?php

//  Endereço do servidor (localhost quando está rodando localmente)
$servidor = "localhost";

//  Nome de usuário do banco de dados (por padrão, 'root' no XAMPP, WAMP ou similar)
$usuario = "root";

//  Senha do banco de dados (em ambientes locais geralmente fica vazia)
$senha = "";

//  Nome do banco de dados que será utilizado
$banco = "cadastro_aluno";

// Utilizando o construtor da classe mysqli para criar a conexão
$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    // Se houver erro, exibe uma mensagem e encerra o script
    die("Falha na conexão: " . $conn->connect_error);
}

// Se não houve erro, a conexão foi realizada com sucesso e a variável $conn pode ser usada
?>
