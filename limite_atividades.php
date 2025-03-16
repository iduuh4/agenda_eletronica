<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novo_limite = $_POST['novo_limite'];
    $usuario_id = $_SESSION['usuario_id'];

    $sql_atualizar_limite = "UPDATE usuarios SET limite_atividades = ? WHERE id = ?";
    $stmt_atualizar_limite = $conexao->prepare($sql_atualizar_limite);
    $stmt_atualizar_limite->bind_param("ii", $novo_limite, $usuario_id);
    $stmt_atualizar_limite->execute();
    $limite_atividades = $novo_limite;

    echo "Limite de atividades atualizado para " . $novo_limite . ".";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Limite de Atividades</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="fullCalendar.css">
</head>

<body>
    <div class="container">
        <h1>Atualizar Limite de Atividades</h1>
        <form method="POST">
            <div class="form-group">
                <label for="novo_limite">Novo Limite</label>
                <input type="number" class="form-control" id="novo_limite" name="novo_limite" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="fullCalendar.php"><button type="button" class="btn btn-danger">Voltar</button></a>
        </form>
    </div>
</body>

</html>