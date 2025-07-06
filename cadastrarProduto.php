<?php
include_once('sessao.php');
include_once('conectaBD.php');

if (!isset($_SESSION['login'])) {
    header('Location: loginForm.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="estilos/estiloSite.css" />
    <link rel="icon" type="image/png" href="imagens/logoprincipal.png" />
    <title>Action Figures - Cadastrar</title>
</head>

<body>
    <?php include('menu.php') ?>

    <div class="centroPagina">
        <h2>Cadastro de produtos</h2>

        <div class="formPrincipalProduto">
            <form action="cadastrarProduto_exe.php" method="POST" enctype="multipart/form-data" class="formProduto">
                <label>Nome:</label><br />
                <input type="text" name="nome" required /><br /><br />

                <label>Descrição:</label><br />
                <textarea name="descricao" rows="4" cols="50"></textarea><br /><br />

                <label>Preço:</label><br />
                <input type="number" name="preco" step="0.01" required /><br /><br />

                <label>Categoria:</label><br />
                <select name="categoria_id" required>
                    <option value="">Selecione uma categoria</option>
                    <?php
                    $sqlCat = "SELECT id, nome FROM categoria ORDER BY nome ASC";
                    $resCat = $conn->query($sqlCat);
                    if ($resCat->num_rows > 0) {
                        while ($cat = $resCat->fetch_assoc()) {
                            echo "<option value='" . intval($cat['id']) . "'>" . htmlspecialchars($cat['nome']) . "</option>";
                        }
                    }
                    ?>
                </select><br /><br />

                <div class="formImagem">
                    <label for="imagem" class="botaoEscolherImagem">Escolher Imagem</label>
                    <span id="nomeImagem" class="nomeImagem">Nenhuma imagem selecionada</span>
                    <input type="file" name="imagem" id="imagem" class="inserirImg" />
                </div>

                <div class="formCadastrarVoltar">
                    <button type="submit" name="acao" value="cadastrar" class="formCadastrar">Cadastrar</button>
                    <button type="button" class="formVoltarLista" onclick="window.location.href='listarProduto.php'">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <?php include('rodape.php'); ?>

    <script src="script/script.js"></script>
</body>

</html>