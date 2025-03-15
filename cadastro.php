<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (login, senha) VALUES ('$login', '$senha')";

    if ($conexao->query($sql)) {
        echo "Cadastro feito com sucesso!";
    } else {
        echo "Erro ao realizar o cadastro: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Área de Cadastro</h1>
        <br>
        <form method="post" action="cadastro.php">
            <div class="mb-3">
                <label class="form-label">Usuário</label>
                <input name="login" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input name="senha" type="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        <br>
        <p>Já possui uma conta? <a href="index.php">Login</a></p>
    </div>
</body>

</html>