<?php
session_start();
include("conectaBD.php");

$nome    = $conn->real_escape_string($_POST['nome']);
$celular = $conn->real_escape_string($_POST['celular']);
$login   = $conn->real_escape_string($_POST['login']);
$senha   = $conn->real_escape_string($_POST['Senha1']);

try {
    $sql = "INSERT INTO Usuario (nome, celular, login, senha)
            VALUES ('$nome', '$celular', '$login', md5('$senha'))";
    $conn->query($sql);

    header("Location: index.php?cadastroSucesso=1");
    exit();

} catch (mysqli_sql_exception $e) {
    if ($e->getCode() === 1062) {
        $mensagem = urlencode("ALERTA! Já existe um usuário com esse login, tente novamente!");
    } else {
        $mensagem = urlencode("Erro ao cadastrar usuário.");
    }

    header("Location: index.php?cadastroErro=1&mensagem=$mensagem");
    exit();
}