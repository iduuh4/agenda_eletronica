<?php
session_start();
require_once 'conexao.php';

$welcome = $_SESSION['usuario_login'];

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Calendário</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Bem vindo, <?= $welcome ?>!</h1>

        <a href="sair.php">Sair da conta</a>
    </div>
</body>

</html>