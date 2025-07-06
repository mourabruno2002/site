<?php
include_once('sessao.php');
include_once('conectaBD.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="estilos/estiloSite.css" />
    <link rel="icon" type="image/png" href="imagens/logoprincipal.png" />
    <title>Action Figures - Produtos</title>
</head>

<body>
    <?php include('menu.php'); ?>

    <div class="centroPagina">
        <div class="painelProdutos">
            <h2>Listagem de Produtos</h2>

            <?php
            date_default_timezone_set("America/Sao_Paulo");
            echo "<p class='dataAcesso'>Acesso em: " . date("d/m/Y H:i:s") . "</p>";

            $sql = "SELECT p.*, c.nome AS categoria FROM produtos p LEFT JOIN categoria c ON p.categoria_id = c.id ORDER BY p.id DESC";
            $resultado = $conn->query($sql);

            echo "<div class='centroPagina'>";
            echo "<table class='tabelaProdutos'>";
            echo "<tr class='cabeçalhoProdutos'>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th id='descTabela'>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>";

            if (isset($_SESSION['login'])) {
                echo "<th>Ações</th>";
            }

            echo "</tr>";

            if ($resultado->num_rows > 0) {
                while ($produto = $resultado->fetch_assoc()) {
                    echo "<tr class='linhasProdutos'>";
                    echo "<td><a href='index.php'><img src='imagens/" . htmlspecialchars($produto['imagem']) . "' alt='Imagem' style='max-width: 100px;'></a></td>";
                    echo "<td>" . htmlspecialchars($produto['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($produto['descricao']) . "</td>";
                    echo "<td>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>";
                    echo "<td>" . htmlspecialchars($produto['categoria']) . "</td>";

                    if (isset($_SESSION['login'])) {
                        echo "<td>
                                <a href='editarProduto.php?id=" . intval($produto['id']) . "' class='botaoAcao' title='Editar'><img src='imagens/lapis.png' class='botaoEditar' alt='Editar'></a>
                                <a href='excluirProduto.php?id=" . intval($produto['id']) . "' class='botaoAcao' title='Excluir'><img src='imagens/lixeira.png' class='botaoExcluir' alt='Excluir'></a>
                            </td>";
                    }

                    echo "</tr>";
                }
            } else {
                $colspan = isset($_SESSION['login']) ? 6 : 5;
                echo "<tr>
                    <td colspan='$colspan' style='text-align:center; padding: 20px;'>Nenhum produto foi encontrado. Cadastre um produto e tente novamente!</td>
                </tr>";
            }

            echo "</table>";

            if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
                echo "<p id='mensagemSucesso'>Produto cadastrado com sucesso!</p>";
            }
            if (isset($_GET['sucesso_edicao']) && $_GET['sucesso_edicao'] == 1) {
                echo "<p id='mensagemSucesso'>Produto atualizado com sucesso!</p>";
            }
            if (isset($_GET['sucesso_exclusao']) && $_GET['sucesso_exclusao'] == 1) {
                echo "<p id='mensagemSucesso'>Produto excluído com sucesso!</p>";
            }

            if (isset($_SESSION['login'])) {
                echo "<form class='adicionarProduto' action='cadastrarProduto.php'><input type='submit' value='+' class='novoProduto' title='Adicionar Produto'></form>";
            }

            echo "</div>";

            $conn->close();
            ?>
        </div>
    </div>

    <?php include('rodape.php'); ?>

</body>

</html>