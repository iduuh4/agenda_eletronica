<?php
//tela criacao da atividade
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Atividade</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Cadastrar Atividade</h1>
        <br>
        <form method="post" action="salvar.php">
            <div class="mb-3">
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
            <button type="submit" class="btn btn-primary">Adicionar</button>
            <a href="fullCalendar.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
        </form>
    </div>
</body>

</html>