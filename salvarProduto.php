<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lojaAction";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("A conexão falhou: " . $conn->connect_error);
}

$acao = $_POST['acao'] ?? '';

if ($acao === 'voltar') {
    header("Location: listarProduto.php");
    exit;
}

if ($acao === 'cadastrar') {
    $imagem_nome = "";
    if (!empty($_FILES["imagem"]["name"])) {
        $pasta_destino = "imagens/";
        $imagem_nome = basename($_FILES["imagem"]["name"]);
        $caminho_completo = $pasta_destino . $imagem_nome;

        if (!file_exists($pasta_destino)) {
            mkdir($pasta_destino, 0755, true);
        }

        move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho_completo);
    }

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];

    $sql = "INSERT INTO produtos (nome, descricao, preco, categoria, imagem)
        VALUES ('$nome', '$descricao', '$preco', '$categoria', '$imagem_nome')";

    if ($conn->query($sql) === TRUE) {
        header("Location: listarProduto.php?sucesso=1");
        exit;
    } else {
        echo "<p style='color:red;'>Erro: " . $conn->error . "</p>";
    }
}

$conn->close();

?>