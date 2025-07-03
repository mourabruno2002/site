<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estiloSite.css">
    <link rel="icon" type="image/png" href="imagens/logoprincipal.png">
    <title>Action Figures - Listar Produtos</title>
</head>

<body>
    <?php include('menu.php') ?>

    <div class="centroPagina">
        <div class="painelProdutos">
            <h2>Produtos Cadastrados</h2>
            <?php
            date_default_timezone_set("America/Sao_Paulo");
            echo "<p class='dataAcesso'>Acesso em: " . date("d/m/Y H:i:s") . "</p>";

            $conn = new mysqli("localhost", "root", "", "seu_banco");

            if ($conn->connect_error) {
                die("Falha de conexão: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM produtos ORDER BY id DESC";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) {
                echo "<table class='tabelaProdutos'>";
                echo "<tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                    </tr>";

                while ($produto = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='imagens/" . $produto['imagem'] . "' alt='Imagem' style='max-width: 100px;'></td>";
                    echo "<td>" . $produto['nome'] . "</td>";
                    echo "<td>" . $produto['descricao'] . "</td>";
                    echo "<td>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>";
                    echo "<td>" . $produto['categoria'] . "</td>";
                    echo "<td>
                        <a href='editarProduto.php?id=" . $produto['id'] . "' class='botaoAcao'>Editar</a> |
                        <a href='excluirProduto.php?id=" . $produto['id'] . "' class='botaoAcao' onclick=\"return confirm('Tem certeza que deseja excluir este produto?');\">Excluir</a></td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p> Nenhum produto foi encontrado! </p>";
            }

            $conn->close();

            ?>
        </div>
    </div>

    <?php include('rodape.php'); ?>

</body>

</html>