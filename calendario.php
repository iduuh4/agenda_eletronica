<?php
//tela calendario e listagem das atividades

session_start();
require_once 'conexao.php';

$welcome = $_SESSION['usuario_login'];

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM atividades";
$result = $conexao->query($sql);

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
        <br>
        <hr>

        <h3>Lista das Atividades</h3> <br>
        <a href="criar.php"><button type="button" class="btn btn-primary">Criar atividade</button></a>
        <a href="fullCalendar.php"><button type="button" class="btn btn-primary">Ir ao Calendário</button></a>
        <br><br>
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
                <?php while ($activy = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $activy['nome'] ?></td>
                        <td><?= $activy['descricao'] ?></td>
                        <td><?= date("d/m/Y H:i:s", strtotime($activy['data_inicio'])) ?></td>
                        <td><?= date("d/m/Y H:i:s", strtotime($activy['data_termino'])) ?></td>
                        <td><?= $activy['status'] ?></td>
                        <td>
                            <a href="editar.php?id=<?= $activy['id'] ?>"><button type="button" class="btn btn-info">Editar</button></a>
                            <a href="excluir.php?id=<?= $activy['id'] ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>



        <br>
        <hr>
        <a href="sair.php"><button type="button" class="btn btn-danger">Sair da conta</button></a>
    </div>
</body>

</html>