<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM alunos WHERE id=$id";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $aluno = $resultado->fetch_assoc();
    } else {
        echo "Aluno não encontrado.";
        exit;
    }
} else {
    echo "ID não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Editar Aluno</h2>

    <form action="atualizar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>" required><br><br>

        <label>RA:</label><br>
        <input type="text" name="ra" value="<?php echo $aluno['ra']; ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $aluno['email']; ?>" required><br><br>

        <label>Curso:</label><br>
        <input type="text" name="curso" value="<?php echo $aluno['curso']; ?>" required><br><br>

        <button type="submit">Atualizar</button>
        <button type="button" onclick="window.location.href='select.php'">Cancelar</button>
    </form>
</body>
</html>
