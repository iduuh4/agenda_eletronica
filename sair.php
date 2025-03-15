<?php
//sair da conta logada

session_start();
session_destroy();
header("Location: index.php");
exit();
