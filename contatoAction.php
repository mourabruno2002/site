<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estiloSite.css">
    <link rel="icon" type="image/png" href="imagens/logoprincipal.png">
    <title>Action Figures - Retorno Furmulário</title>
</head>

<body>
    <?php
    $nome = $_POST["name"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $termo = $_POST["termoAceite"];
    $data = $_POST["dataNasc"];

    list($ano, $mes, $dia) = explode('-', $data);
    $aniversario =  $dia . '/' . $mes . '/' . $ano;

    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('y'));

    $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25)
    ?>

    <div class="barraSuperior2"></div>

    <div class="superiorPagina">
        <div class="logo">
            <a href="index.html">
                <img id="logoEmpresa" src="imagens/logoprincipal.png" alt="Logo Figures Brasil">
            </a>
        </div>

        <div class="barraNavegacao">
            <a href="index.html">Home</a>
            <a href="sobre.html">Sobre</a>
            <a href="noticias.html" id="noticias">Notícias</a>
            <a class="active" href="contato.html" id="contato">Contato</a>
        </div>

        <div class="telefone">
            <a id="linkwpp" href="https://www.whatsapp.com/?lang=pt_BR" target="_blank">
                <img id="imgwpp" src="imagens/imagemwpp.png" alt="Logo Whatsapp">
            </a>
            <img id="imgTelefone" src="imagens/telefone.png" alt="Imagem Telefone">
            <h2 id="numeroTelefone">(41) 3333-2222</h2>
        </div>
    </div>

    <div class="centroPagina" id="resultado">
        <h2>Dados Recebidos</h2>
        <table id="dadosTabela">
            <tr><th>Nome</th><td><?php echo $nome; ?></td></tr>
            <tr><th>E-mail</th><td><?php echo $email; ?></td></tr>
            <tr><th>Celular</th><td><?php echo $celular; ?></td></tr>
            <tr><th>Aniversário</th><td><?php echo $aniversario; ?></td></tr>
            <tr><th>Idade</th><td><?php echo $idade; ?></td></tr>
            <tr><th>Aceite Formulário</th><td><?php echo $termo; ?></td></tr>
        </table>
        <div class="botaoRetorno">
        <a href="contato.html" class="botaoRetornar">Retornar</a>
        </div>
    </div>

    <div class="barraInferior2"></div>

    <div class="inferiorPagina">

        <div class="localizacao">

            <div class="imagemLocalizacao">
                <a href="https://www.google.com/maps" target="_blank">
                    <img src="imagens/localizacao.png" alt="Localização Loja Física Action Figure">
                </a>
            </div>

            <div class="enderecoLocalizacao">
                <h2>LOCALIZAÇÃO LOJA FÍSICA</h2>
                <p>Rua Imaculada Conceição, 1155</p>
                <p>Bairro Prado Velho</p>
                <p>Curitiba-PR</p>
                <p>CEP: 80215-901</p>
            </div>
        </div>

        <div class="pagamento">
            <div class="cartaoPagamento">
                <h2 id="tituloPagamento">FORMAS DE PAGAMENTO</h2>
                <div class="elo">
                    <img src="imagens/elo.png" alt="Cartão ELO">
                    <p>ELO - Crédito/Débito</p>
                </div>

                <div class="mastercard">
                    <img src="imagens/mastercard.png" alt="Cartão Mastercard">
                    <p>MASTER - Crédito/Débito</p>
                </div>

                <div class="visa">
                    <img src="imagens/visa.png" alt="Cartão Visa">
                    <p>VISA - Crédito/Débito</p>
                </div>

                <div class="amex">
                    <img src="imagens/amex.png" alt="Cartão AMEX">
                    <p>AMEX - Crédito/Débito</p>
                </div>


            </div>

            <div class="outrasFormasPagamento">
                <div class="boleto">
                    <img src="imagens/boleto.png" alt="Boleto">
                    <p>Boleto</p>
                </div>

                <div class="deposito">
                    <img src="imagens/pix.png" alt="PIX">
                    <p>PIX</p>
                </div>
            </div>

            <div class="cnpjEmail">
                <p>CNPJ:</p>
                <p>00.000.000/0001-00</p>
                <br>
                <p>E-mail:</p>
                <p>actionfigure@acfigure.com.br</p>
            </div>
        </div>
    </div>

    <script src="script/script.js"></script>
</body>

</html>