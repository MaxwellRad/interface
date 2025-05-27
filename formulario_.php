<!DOCTYPE html>
<!-- Declaração do tipo de documento HTML5 -->
<html lang="pt">
<!-- Início do documento HTML, com idioma definido como português -->

<head>
    <meta charset="UTF-8">
    <!-- Define o conjunto de caracteres como UTF-8 para suportar acentuação -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Faz com que a página seja responsiva, se adapte a diferentes tamanhos de tela (celular, tablet, PC) -->

    <title>Cadastro de Aluno</title>
    <!-- Título que aparece na aba do navegador -->

    <link rel="stylesheet" href="estilos.css">
    <!-- Link externo para um arquivo de estilos CSS, que define a aparência da página -->
</head>

<body>
    <!-- Conteúdo visível da página -->

    <h2>Cadastro de Aluno</h2>
    <!-- Título principal da página, visível no topo -->

    <!--  Formulário de cadastro de alunos -->
    <form action="cadastrado.php" method="POST">
        <!-- 
        action="cadastrado.php": o formulário envia os dados para o arquivo 'cadastrado.php' 
        method="POST": método POST é utilizado para enviar os dados de forma segura
        -->

        <!-- Campo para o nome do aluno -->
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>
        <!-- 'required' obriga o usuário a preencher antes de enviar -->

        <!-- Campo para o RA (Registro Acadêmico) -->
        <label>RA:</label><br>
        <input type="text" name="ra" required><br><br>

        <!-- Campo para o email do aluno -->
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <!-- O tipo 'email' valida se é um email válido -->

        <!-- Campo para o curso do aluno -->
        <label>Curso:</label><br>
        <input type="text" name="curso" required><br><br>

        <!-- Botão para enviar (cadastrar) os dados -->
        <button type="submit">Cadastrar</button>

        <!-- Botão que redireciona para a página de administrador -->
        <button type="button" onclick="window.location.href='adm.html'">Sou Adm</button>
    </form>
</body>

</html>
