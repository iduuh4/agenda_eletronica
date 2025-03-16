<?php

require_once 'conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM atividades WHERE id = $id";

if ($conexao->query($sql)) {
    header("Location: fullCalendar.php");
} else {
    echo "Erro de conexão: " . $conexao->error;
}
