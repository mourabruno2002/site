<?php
$conn = new mysqli("localhost", "root", "", "lojaAction");
if ($conn->connect_error) {
    die("A Conexão falhou: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
    echo "O ID do produto não informado.";
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows === 0) {
    echo "Ops, produto não encontrado.";
    exit;
}

$produto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="estilos/estiloSite.css">
</head>
<body>
<?php include('menu.php'); ?>

<div class="centroPagina">
    <h2>Editar Produto</h2>
    <form action="atualizarProduto.php" method="POST" enctype="multipart/form-data" class="formProduto">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= $produto['nome'] ?>" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao" rows="4" cols="50"><?= $produto['descricao'] ?></textarea><br><br>

        <label>Preço:</label><br>
        <input type="number" name="preco" step="0.01" value="<?= $produto['preco'] ?>" required><br><br>

        <label>Categoria:</label><br>
        <input type="text" name="categoria" value="<?= $produto['categoria'] ?>"><br><br>

        <label>Imagem atual:</label><br>
        <img src="imagens/<?= $produto['imagem'] ?>" style="max-width: 100px;"><br><br>

        <label>Nova imagem (opcional):</label><br>
        <input type="file" name="imagem"><br><br>

        <input type="submit" value="Salvar Alterações" class="formCadastrar">
    </form>
</div>

<?php include('rodape.php'); ?>
</body>
</html>