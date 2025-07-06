<?php
include_once('sessao.php');
include_once('conectaBD.php');

if (!isset($_SESSION['login'])) {
    header('Location: loginForm.php');
    exit();
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
    $categoria_id = $_POST["categoria_id"];

    if (empty($categoria_id)) {
        echo "<p style='color:red;'>Por favor, selecione uma categoria válida.</p>";
        echo "<a href='cadastrarProduto.php'>Voltar</a>";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, preco, categoria_id, imagem) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdss", $nome, $descricao, $preco, $categoria_id, $imagem_nome);

    if ($stmt->execute()) {
        header("Location: listarProduto.php?sucesso=1");
        exit;
    } else {
        echo "<p style='color:red;'>Erro ao cadastrar: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>