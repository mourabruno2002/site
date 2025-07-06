<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

include('conectaBD.php');

$acao = $_POST['acao'] ?? '';
if ($acao === 'cancelar') {
    header("Location: listarProduto.php");
    exit;
}

$id = $_POST["id"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria_id = $_POST["categoria_id"];

$sqlImagem = "SELECT imagem FROM produtos WHERE id = ?";
$stmtImg = $conn->prepare($sqlImagem);
$stmtImg->bind_param("i", $id);
$stmtImg->execute();
$resultImg = $stmtImg->get_result();
$produto = $resultImg->fetch_assoc();
$imagem_nome = $produto["imagem"] ?? "";
$stmtImg->close();

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
        SET nome = ?, descricao = ?, preco = ?, categoria_id = ?, imagem = ? 
        WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdssi", $nome, $descricao, $preco, $categoria_id, $imagem_nome, $id);

if ($stmt->execute()) {
    header("Location: listarProduto.php?sucesso_edicao=1");
    exit;
} else {
    echo "<p style='color:red;'>Erro ao atualizar: " . $stmt->error . "</p>";
}

$stmt->close();
$conn->close();
?>