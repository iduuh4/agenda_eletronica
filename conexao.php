<?php
//Conexao com o banco de dados

$servename = 'localhost';
$username = 'root';
$password = '';
$dbname = 'users';

$conexao = new mysqli($servename, $username, $password, $dbname);

if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}
