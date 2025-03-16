<?php
//tela calendario e listagem das atividades
session_start();
require_once 'conexao.php';

$welcome = $_SESSION['usuario_login'];

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

//pegando o id do usuario logado
$usuario_id = $_SESSION['usuario_id'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário</title>

    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="fullCalendar.css">
</head>

<body>
    <div class="container">
        <h1 class="d-flex justify-content-center">Bem vindo, <?= $welcome ?>!</h1> <br>
        <div class="d-flex justify-content-evenly">
            <a clas href="criar.php"><button type="button" class="btn btn-success">Criar atividade</button></a>
            <a href="calendario.php"><button type="button" class="btn btn-dark">Voltar para lista</button></a>
            <a href="sair.php"><button type="button" class="btn btn-danger">Sair da conta</button></a>
        </div>

        <br><br>
        <div id='calendar'></div>

        <!-- Modal da atividade -->
        <div class="modal fade" id="mostrarModal" tabindex="-1" aria-labelledby="mostrarModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="mostrarModal">Atividade</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <dl class="row">
                            <dt class="col-sm-3">Nome: </dt>
                            <dd class="col-sm-9" id="mostrar_nome">A description list is perfect for defining terms.</dd>

                            <dt class="col-sm-3">Descrição: </dt>
                            <dd class="col-sm-9" id="mostrar_descricao">A description list is perfect for defining terms.</dd>

                            <dt class="col-sm-3">Início: </dt>
                            <dd class="col-sm-9" id="mostrar_inicio">A description list is perfect for defining terms.</dd>

                            <dt class="col-sm-3">Fim: </dt>
                            <dd class="col-sm-9" id="mostrar_fim">A description list is perfect for defining terms.</dd>

                            <dt class="col-sm-3">Status:</dt>
                            <dd class="col-sm-9" id="mostrar_status">A description list is perfect for defining terms.</dd>
                        </dl>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success"><a href="#" id="editarLink">Editar</a></button>
                        <button type="button" class="btn btn-danger"><a href="#" id="excluirLink">Excluir</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap.bundle.min.js"></script>
    <script src="./js/index.global.min.js"></script>
    <script src="./js/core/locales-all.global.min.js"></script>
    <script src="./js/custom.js"></script>
    <script src="./fullcalendar-6.1.15/packages/bootstrap5/index.global.min.js"></script>
</body>

</html>