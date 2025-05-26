<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Cadastro de Aluno</h2>
    
     <form action="cadastrado.php" method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>RA:</label><br>
        <input type="text" name="ra" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Curso:</label><br>
        <input type="text" name="curso" required><br><br>

        <button type="submit">Cadastrar</button>   
     <button type="button" onclick="window.location.href='adm.html'">Sou Adm</button>
    </form>
</body>
</html>
