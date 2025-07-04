<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estiloSite.css">
    <link rel="icon" type="image/png" href="imagens/logoprincipal.png">
    <title>Action Figures - Contato</title>
</head>

<body>
    <?php include('menu.php') ?>

    <div class="centroPagina">
        <h2>Deixe seu Contato!</h2>
        <div class="formContato">
            <form class="formPrincipal" method="post" action="contatoAction.php">
                <div class="formGrupo">
                    <img src="imagens/nomeContato.png" alt="Ícone Nome do Contato">
                    <label for="name"><i class="formNome" aria-hidden="true"></i></label>
                    <input type="text" name="name" id="name" placeholder="Seu Nome..." required>
                </div>

                <div class="formGrupo">
                    <img src="imagens/emailContato.png" alt="Ícone E-mail Contato">
                    <label for="email"><i class="formEmail" aria-hidden="true"></i></label>
                    <input type="email" name="email" id="email" placeholder="Seu E-mail..." required>
                </div>

                <div class="formGrupo">
                    <img src="imagens/telefoneContato.png" alt="Ícone Telefone Contato">
                    <label for="celular"><i class="formCelular" aria-hidden="true"></i></label>
                    <input type="phone" name="celular" id="celular" pattern="\(\d{2})\s\d{4,5}-\d{4}$"
                        placeholder="Seu Celular..." title="(xx) xxxxx-xxxx" required>
                </div>

                <div class="formGrupo">
                    <img src="imagens/dataContato.png" alt="Ícone Data Nascimento">
                    <label for="dataNasc"><i class="formDataNasc" aria-hidden="true"></i></label>
                    <input type="date" name="dataNasc" id="dataNasc" title="Data de Nascimento">
                </div>

                <div class="formGrupo">
                    <input type="checkbox" name="termoAceite" id="termoAceite" class="termoAceite" required>
                    <label for="termoAceite" class="labelTermoAceite"><span><span></span></span>Eu concordo com os <a
                            href="#" class="termoServico">termos de serviço</a>.</label>
                </div>

                <div class="formGrupo formBotao">
                    <input type="submit" class="formSubmit" value="Enviar">
                    <input type="reset" class="formSubmit" value="Limpar">
                </div>
            </form>

        </div>
    </div>

    <?php
    include('rodape.php')
    ?>

    <script src="script/script.js"></script>

</body>

</html>