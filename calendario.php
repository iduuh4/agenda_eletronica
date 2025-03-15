<?php
//tela calendario e listagem das atividades

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
        <br>
        <hr>

        <h3>Tarefas</h3>
        <a href="criar.php">Criar Atividade</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data de Inicio</th>
                    <th scope="col">Data de Término</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Estudar</td>
                    <td>15/03/2025 15:44</td>
                    <td></td>
                    <td>Pendente</td>
                    <td></td>
                </tr>
            </tbody>
        </table>



        <br>
        <hr>
        <a href="sair.php">Sair da conta</a>
    </div>
</body>

</html>