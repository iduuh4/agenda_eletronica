<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

// Verificar o limite de atividades do usuário
$sql_verificar_limite = "SELECT limite_atividades FROM usuarios WHERE id = ?";
$stmt_verificar_limite = $conexao->prepare($sql_verificar_limite);
$stmt_verificar_limite->bind_param("i", $usuario_id);
$stmt_verificar_limite->execute();
$result_verificar_limite = $stmt_verificar_limite->get_result();
$row_verificar_limite = $result_verificar_limite->fetch_assoc();

$limite_atividades = $row_verificar_limite['limite_atividades'];

// Contar quantas atividades o usuário já criou
$sql_contar_atividades = "SELECT COUNT(*) AS total FROM atividades WHERE usuario_id = ?";
$stmt_contar_atividades = $conexao->prepare($sql_contar_atividades);
$stmt_contar_atividades->bind_param("i", $usuario_id);
$stmt_contar_atividades->execute();
$result_contar_atividades = $stmt_contar_atividades->get_result();
$row_contar_atividades = $result_contar_atividades->fetch_assoc();

$total_atividades = $row_contar_atividades['total'];

// Verificar se o usuário pode criar mais atividades
if ($total_atividades >= $limite_atividades) {
    echo "Você atingiu o limite máximo de atividades (" . $limite_atividades . ").";
    exit();
}

// Se o limite não foi atingido, criar a nova atividade
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data_inicio = $_POST['data_inicio'];
    $data_termino = $_POST['data_termino'];
    $status = $_POST['status'];

    $sql_inserir = "INSERT INTO atividades (nome, descricao, data_inicio, data_termino, status, usuario_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_inserir = $conexao->prepare($sql_inserir);
    $stmt_inserir->bind_param("sssssi", $nome, $descricao, $data_inicio, $data_termino, $status, $usuario_id);
    $stmt_inserir->execute();

    header("Location: fullCalendar.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Atividade</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="fullCalendar.css">
</head>

<body>
    <div class="container">
        <h1>Criar Atividade</h1>
        <form method="POST">
            <div class="mb-3 form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3 form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" required></textarea>
            </div>
            <div class="mb-3 form-group">
                <label for="data_inicio">Data de Início</label>
                <input type="datetime-local" class="form-control" id="data_inicio" name="data_inicio" required>
            </div>
            <div class="mb-3 form-group">
                <label for="data_termino">Data de Término</label>
                <input type="datetime-local" class="form-control" id="data_termino" name="data_termino">
            </div>
            <div class="mb-3 form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Pendente">Pendente</option>
                    <option value="Cancelado">Cancelado</option>
                    <option value="Concluido">Concluído</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Criar</button>
            <a href="fullCalendar.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
        </form>
    </div>
</body>

</html>