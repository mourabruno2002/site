<?php
if (!isset($_GET['id'])) {
    echo "ID do produto não informado.";
    exit;
}

$id = $_GET['id'];

$conn = new mysqli("localhost", "root", "", "lojaAction");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "DELETE FROM produtos WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: listarProduto.php");
    exit;
} else {
    echo "Erro ao excluir produto: " . $conn->error;
}

$conn->close();
?>