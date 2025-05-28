<?php
include("conexao.php");

//  VERIFICA SE O PARÂMETRO 'id' FOI RECEBIDO NA URL
if (isset($_GET['id'])) {
    //  Recebe o valor do 'id' passado pela URL
    $id = $_GET['id'];

    // Comando SQL para deletar o aluno com o ID informado
    $sql = "DELETE FROM alunos WHERE id=$id";

    //  Executa o comando SQL
    if ($conn->query($sql) === TRUE) {
        //  Se a exclusão foi bem-sucedida
        // Mostra um alerta e redireciona para a página 'select.php'
        echo "<script>
                alert('Aluno apagado com sucesso!');
                window.location.href='select.php';
              </script>";
    } else {
        //  Se houve erro na exclusão, exibe a mensagem de erro
        echo "Erro ao apagar: " . $conn->error;
    }
} else {
    //  Caso o 'id' não tenha sido enviado via URL
    echo "ID não fornecido.";
}

//  Fecha a conexão com o banco de dados
$conn->close();
?>
