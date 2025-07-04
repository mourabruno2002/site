<?php $pagina_atual = basename($_SERVER['PHP_SELF']); ?>

<div class="barraSuperior2"></div>

<div class="superiorPagina">
    <div class="logo">
        <a href="index.php">
            <img id="logoEmpresa" src="imagens/logoprincipal.png" alt="Logo Figures Brasil">
        </a>
    </div>

    <div class="barraNavegacao">
        <a href="index.php" class="<?= ($pagina_atual == 'index.php') ? 'active' : '' ?>">Home</a>
        <a href="sobre.php" class="<?= ($pagina_atual == 'sobre.php') ? 'active' : '' ?>">Sobre</a>
        <a href="noticias.php" class="<?= ($pagina_atual == 'noticias.php') ? 'active' : '' ?>">Notícias</a>
        <a href="contato.php" class="<?= ($pagina_atual == 'contato.php') ? 'active' : '' ?>">Contato</a>
        <a href="listarProduto.php" class="<?= ($pagina_atual == 'listarProduto.php') ? 'active' : '' ?>">Produtos</a>
    </div>

    <div class="telefone">
        <a id="linkwpp" href="https://www.whatsapp.com/?lang=pt_BR" target="_blank">
            <img id="imgwpp" src="imagens/imagemwpp.png" alt="Logo Whatsapp">
        </a>
        <img id="imgTelefone" src="imagens/telefone.png" alt="Imagem Telefone">
        <h2 id="numeroTelefone">(41) 3333-2222</h2>
    </div>

</div>