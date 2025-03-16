<?php
require_once('conexao.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$data_inicio = $_POST['data_inicio'];
$data_termino = $_POST['data_termino'];
$status = $_POST['status'];

$sql = "UPDATE atividades SET nome='$nome', descricao='$descricao', data_inicio='$data_inicio', data_termino='$data_termino', status='$status' WHERE id=$id";

if ($conexao->query($sql)) {
        header("Location: fullCalendar.php");
} else {
        echo "Erro de conexão: " . $conexao->error;
}
