<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estiloSite.css">
    <link rel="icon" type="image/png" href="imagens/logoprincipal.png">
    <title>Action Figures - Home</title>
</head>

<body>
    <?php include('menu.php') ?>

    <div class="centroPagina">
        <h2>Cadastro de produtos</h2>

        <div class="formPrincipalProduto">
            <form action="salvarProduto.php" method="POST" enctype="multipart/form-data" class="formProduto">
                <label>Nome:</label><br>
                <input type="text" name="nome" required><br><br>

                <label>Descrição:</label><br>
                <textarea name="descricao" rows="4" cols="50"></textarea><br><br>

                <label>Preço:</label><br>
                <input type="number" name="preco" step="0.01" required><br><br>

                <label>Categoria:</label><br>
                <input type="text" name="categoria"><br><br>

                <label>Imagem:</label><br>
                <input type="file" name="imagem"><br><br>

                <input type="submit" value="Cadastrar" class="formCadastrar">

            </form>
        </div>
    </div>

    <?php include('rodape.php'); ?>

</body>

</html>