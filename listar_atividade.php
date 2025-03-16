<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Recuperar as atividades do usuário logado
$sql = "SELECT id, nome, descricao, data_inicio, data_termino, status FROM atividades WHERE usuario_id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

$atividades = [];

while ($activy = $result->fetch_assoc()) {
    extract($activy);

    $atividades[] = [
        'id' => $id,
        'title' => $nome,
        'descricao' => $descricao,
        'start' => $data_inicio,
        'end' => $data_termino,
        'status' => $status
    ];
}

echo json_encode($atividades);
