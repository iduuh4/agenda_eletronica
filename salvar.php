<?php
//inserir novas atividades ao banco de dados
include 'conexao.php';

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$data_inicio = $_POST['data_inicio'];
$data_termino = $_POST['data_termino'];
$status = $_POST['status'];

$sql = "INSERT INTO atividades (nome, descricao, data_inicio, data_termino, status) VALUES ('$nome', '$descricao', '$data_inicio', '$data_termino', '$status')";
if ($conexao->query($sql)) {
    header("Location: calendario.php");
} else {
    echo "Erro de conexão: " . $conexao->error;
}
