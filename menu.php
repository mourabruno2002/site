<?php include_once('sessao.php');

$exibirModalSucesso = false;

if (isset($_SESSION['mensagemCadastro'])) {
    $mensagemCadastro = $_SESSION['mensagemCadastro'];
    $exibirModalSucesso = true;
    unset($_SESSION['mensagemCadastro']);
}
?>

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

    <div class="barraLogin">
        <?php if (isset($_SESSION['login'])): ?>
            <a href="logout.php" id="botaoSair">Sair (<?php echo $_SESSION['nome']; ?>)</a>
        <?php else: ?>
            <a href="#" onclick="abrirModal('modalLogin')">Login</a>
            <a href="#" onclick="abrirModal('modalCadastro')">Cadastro</a>
        <?php endif; ?>
    </div>

    <div id="modalLogin" class="modalLoginCadastro">
        <div class="conteudoModal modalLoginAltura">
            <span class="fecharLoginCadastro" onclick="fecharModal('modalLogin')">X</span>
            <form action="login.php" method="POST">
                <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                <input type="text" name="login" placeholder="Login" required><br>
                <input type="password" name="senha" id="senhaLogin" placeholder="Senha" required><br>
                <div class="mostrar-senha">
                    <input type="checkbox" id="mostrarSenhaLogin" onclick="mostrarOcultarSenha('senhaLogin')">
                    <label for="mostrarSenhaLogin">Mostrar senha</label>
                </div>
                <input type="submit" value="Entrar">

                <p id="mensagemLoginSucesso" style="display: none; color: #28a745; font-weight: bold; margin-top: 20px; margin-bottom: 0px;"></p>
            </form>
        </div>
    </div>

    <div id="modalCadastro" class="modalLoginCadastro">
        <div class="conteudoModal modalCadastroAltura">
            <span class="fecharLoginCadastro" onclick="fecharModal('modalCadastro')">X</span>
            <form action="cadastro.php" method="POST" onsubmit="return validarSenhas()">
                <input type="text" name="nome" placeholder="Nome" required><br>
                <input type="tel" name="celular" id="celularCadastro" placeholder="Celular" required>
                <input type="text" name="login" placeholder="Login" required><br>
                <input type="password" name="Senha1" id="senhaCadastro1" placeholder="Senha" required><br>
                <input type="password" name="Senha2" id="senhaCadastro2" placeholder="Confirmar senha" required><br>
                <div style="display: flex; align-items: center; gap: 5px; margin: 10px 0;">
                    <input type="checkbox" id="mostrarSenhaCadastro" onclick="mostrarOcultarSenha('senhaCadastro1', 'senhaCadastro2')">
                    <label for="mostrarSenhaCadastro" style="margin: 0;">Mostrar senha</label>
                </div>
                <input type="submit" value="Cadastrar">

                <p id="mensagemCadastroSucesso" style="display: none; color: #28a745; font-weight: bold; margin-top: 20px; margin-bottom: 0px;"></p>
            </form>
        </div>
    </div>
</div>

<script src="script/script.js"></script>