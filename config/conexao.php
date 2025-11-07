<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "portal_noticias";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Define o charset para evitar problemas com caracteres especiais
$conexao->set_charset("utf8");
?>