<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['login'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (login, senha) VALUES ('$login', '$senha')";

    if ($conexao->query($sql)) {
        echo "Cadastro feito!";
    } else {
        echo "Erro ao realizar o cadastro: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro</title>
</head>

<body>
    <h1>olá, mundop</h1>
</body>

</html>