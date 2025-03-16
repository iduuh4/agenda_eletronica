<?php
//Tela de Cadastro
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (login, senha) VALUES ('$login', '$senha')";

    if ($conexao->query($sql)) {
        echo '<script> alert ("Cadastro criado com sucesso!"); location.href=("index.php")</script>';
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
    <link rel="stylesheet" href="fullCalendar.css">
</head>

<body>
    <div class="container">
        <h1 class="d-flex justify-content-center">Área de Cadastro</h1>
        <br>
        <form method="post" action="cadastro.php">
            <div class="mb-3">
                <label class="form-label">Usuário</label>
                <input name="login" type="text" class="form-control" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input name="senha" type="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        <br>
        <p>Já possui uma conta? <a id="buttonPerson" href="index.php">Login</a></p>
    </div>
</body>

</html>