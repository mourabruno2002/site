<?php

$conn = new mysqli("localhost", "root", "", "lojaAction");
if ($conn->connect_error) {
    die("A conexão falhou: " . $conn->connect_error);
}

$id = $_POST["id"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];

$sqlImagem = "SELECT imagem FROM produtos WHERE id = $id";
$resultado = $conn->query($sqlImagem);
$produto = $resultado->fetch_assoc();
$imagem_nome = $produto["imagem"];

if (!empty($_FILES["imagem"]["name"])) {
    $pasta_destino = "imagens/";
    $novaImagem = basename($_FILES["imagem"]["name"]);
    $caminho_completo = $pasta_destino . $novaImagem;

    if (!file_exists($pasta_destino)) {
        mkdir($pasta_destino, 0755, true);
    }

    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho_completo)) {
        $imagem_nome = $novaImagem;
    } else {
        echo "<p style='color:red;'>Erro ao enviar a nova imagem.</p>";
        exit;
    }
}

$sql = "UPDATE produtos 
        SET nome = '$nome',
            descricao = '$descricao',
            preco = '$preco',
            categoria = '$categoria',
            imagem = '$imagem_nome'
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: listarProduto.php");
    exit;
} else {
    echo "<p style='color:red;'>Erro ao atualizar: " . $conn->error . "</p>";
}

$conn->close();

?>
