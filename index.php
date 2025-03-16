<?php
// tela inicial de login

session_start();
require_once 'conexao.php';

//enviar os dados para o db
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    //verificar se existe o usuario no db
    $sql = "SELECT * FROM usuarios WHERE login = '$login'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_login'] = $usuario['login'];

            header("Location: fullCalendar.php");
            exit();
        } else {
            echo "Usuario ou senha incorretos!";
        }
    } else {
        echo "Usuário sem cadastro!";
    }
}


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="fullCalendar.css">
</head>

<body>
    <div class="container">

        <h1 class="d-flex justify-content-center">Área de Login</h1>
        <br>
        <form method="post" action="index.php">
            <div class="mb-3">
                <label for="" class="form-label">Usuário:</label>
                <input type="text" class="form-control" name="login" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">Senha:</label>
                <input type="password" class="form-control" name="senha" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <br>
        <p>Não possui uma conta ? <a href="cadastro.php">Cadastrar</a></p>
    </div>
</body>

</html>