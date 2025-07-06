<?php
session_start();
include("conectaBD.php");

$usuario = $conn->real_escape_string($_POST['login']);
$senha   = $conn->real_escape_string($_POST['senha']);

$redirect = isset($_POST['redirect']) ? $_POST['redirect'] : 'index.php';

$sql = "SELECT idUsuario, nome FROM Usuario 
        WHERE login = '$usuario' AND senha = md5('$senha')";

$result = $conn->query($sql);

if ($result && $result->num_rows === 1) {
    $dados = $result->fetch_assoc();
    $_SESSION['login'] = $usuario;
    $_SESSION['idUsuario'] = $dados['idUsuario'];
    $_SESSION['nome'] = $dados['nome'];

    header("Location: $redirect?loginSucesso=1");
    exit();
} else {
    $_SESSION['erroLogin'] = "Usuário ou senha inválidos.";
    header("Location: $redirect?loginNecessario=1&erroLogin=1");
    exit();
}