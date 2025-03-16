<?php
//pegar db
require_once 'conexao.php';

//recuperar as atividades no db
$sql = "SELECT id, nome, descricao, data_inicio, data_termino, status FROM atividades";
//solicitar query ao banco
$result = $conexao->query($sql);

//array para salvar as atividades do db
$atividades = [];

//percorrer a lista retornando do db
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
