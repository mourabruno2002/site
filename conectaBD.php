<?php
$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$banco    = "lojaAction";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("A conexão falhou: " . $conn->connect_error);
}
?>