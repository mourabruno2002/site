<?php
include_once('sessao.php');
include_once('conectaBD.php');

if (!isset($_SESSION['login'])) {
    header('Location: loginForm.php');
    exit();
}

if (!isset($_GET['id'])) {
    echo "ID do produto não informado.";
    exit;
}

$id = $_GET['id'];

$sql = "SELECT p.*, c.nome AS categoria 
        FROM produtos p
        LEFT JOIN categoria c ON p.categoria_id = c.id
        WHERE p.id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    echo "Produto não encontrado.";
    exit;
}

$produto = $resultado->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estiloSite.css">
    <link rel="icon" type="image/png" href="imagens/logoprincipal.png">
    <title>Action Figures - Exclusão</title>
</head>
<body>
<?php include('menu.php'); ?>

<div class="centroPagina">
    <h2 class="tituloExcluir">Exclusão de Produtos</h2>

    <div class="cardExclusao">
        <div class="conteudoExclusao">
            <p><strong>Código do Produto:</strong> <?= $produto['id'] ?></p>
            <p><strong>Nome:</strong> <?= $produto['nome'] ?></p>
            <p><strong>Descrição:</strong> <?= $produto['descricao'] ?></p>
            <p><strong>Preço:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            <p><strong>Categoria:</strong> <?= $produto['categoria'] ?></p>
        </div>

        <div class="imagemExclusao">
            <img src="imagens/<?= $produto['imagem'] ?>" alt="Imagem do Produto">
        </div>
    </div>

    <form action="excluirProduto_exe.php" method="POST" class="botoesExclusao">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
        <button type="submit" class="botaoExcluirConfirmar">Confirmar exclusão?</button>
        <a href="listarProduto.php" class="botaoCancelar">Cancelar</a>
    </form>
</div>

<?php include('rodape.php'); ?>
</body>
</html>
