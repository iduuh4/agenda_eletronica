<?php
//Tela editar a atividade

require_once 'conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM atividades WHERE id = $id";
$result = $conexao->query($sql);
$activy = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Atividade</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="fullCalendar.css">
</head>

<body>
    <div class="container">
        <h1>Editar atividade</h1>
        <br>
        <form method="post" action="atualizar.php">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $activy['id'] ?>">

                <label class="form-label">Nome</label>
                <input name="nome" type="text" class="form-control" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descrição</label><br>
                <textarea style="width: 300px;" name="descricao" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Data de Inicio</label>
                <input name="data_inicio" type="datetime-local" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">data de Término</label>
                <input name="data_termino" type="datetime-local" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" required>
                    <option value="Pendente">Pendente</option>
                    <option value="Concluída">Concluída</option>
                    <option value="Cancelada">Cancelada</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="fullCalendar.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
        </form>
    </div>
</body>

</html>