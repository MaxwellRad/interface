<?php
// ===========================================
//  CONEXÃO COM O BANCO DE DADOS
// ===========================================
// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// ===========================================
//  VERIFICAÇÃO SE O ID FOI ENVIADO
// ===========================================
// Verifica se o campo 'id' foi enviado via POST (indica que é uma solicitação de edição)
if (isset($_POST['id'])) {

    // ===========================================
    //  RECEBIMENTO DOS DADOS DO FORMULÁRIO
    // ===========================================
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    // ===========================================
    //  MONTAGEM DA QUERY DE ATUALIZAÇÃO (UPDATE)
    // ===========================================
    $sql = "UPDATE alunos 
            SET nome='$nome', ra='$ra', email='$email', curso='$curso' 
            WHERE id=$id";

    // ===========================================
    //  EXECUÇÃO DA QUERY E TRATAMENTO DO RESULTADO
    // ===========================================
    if ($conn->query($sql) === TRUE) {
        // Se a atualização foi bem-sucedida, exibe alerta e redireciona para select.php
        echo "<script>
                alert('Aluno atualizado com sucesso!');
                window.location.href='select.php';
              </script>";
    } else {
        // Se houve erro na atualização, exibe o erro
        echo "Erro ao atualizar: " . $conn->error;
    }

} else {
    // Caso o ID não tenha sido enviado, exibe mensagem de erro
    echo "Dados não recebidos.";
}

// ===========================================
//  FECHAMENTO DA CONEXÃO
// ===========================================
$conn->close();
?>
