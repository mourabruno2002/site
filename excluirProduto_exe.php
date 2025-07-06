<?php
include_once('sessao.php');
include_once('conectaBD.php');

if (!isset($_SESSION['login'])) {
    header('Location: loginForm.php');
    exit();
}

if (!isset($_POST['id'])) {
    echo "ID do produto não informado.";
    exit;
}

$id = $_POST['id'];

$sql = "DELETE FROM produtos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: listarProduto.php?sucesso_exclusao=1");
    exit;
} else {
    echo "Erro ao excluir produto: " . $stmt->error;
}

$stmt->close();
$conn->close();