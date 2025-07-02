<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estiloSite.css">
    <link rel="icon" type="image/png" href="imagens/logoprincipal.png">
    <title>Action Figures - Home</title>
</head>

<body>
    <?php
    include('menu.php')
    ?>

    <div class="centroPagina">
        <div class="imagensInicio">
            <div class="divisaoImg">
                <img src="imagens/figuresInicio.png" alt="Action Figures" class="imagemPrincipal">
                <div>
                    <a href="#fotobatman">
                    <img src="imagens/figuresLink.png" alt="Imagem Com Link Figures" class="imagemLink">
                    </a>
                </div>
            </div>
            
            <div class="divisaoImg">
                <img src="imagens/camisetasInicio.png" alt="Camisetas Personalizadas" class="imagemPrincipal">
                <div>
                    <a href="#camisetaFlash">
                    <img src="imagens/camisetasLink.png" alt="Imagem Com Link Camisetas" class="imagemLink">
                    </a>
                </div>
            </div>

            <div class="divisaoImg">
                <img src="imagens/personalizadosInicio.png" alt="Presentes Personalizadas" class="imagemPrincipal">
                <div>
                    <a href="#camisetaFlash">
                    <img src="imagens/presentesLink.png" alt="Imagem Com Link Presentes" class="imagemLink">
                    </a>
                </div>
            </div>
        </div>

        <h2 class="tituloSecao">PRODUTOS MAIS VENDIDOS:</h2>
        <div class="maisVendidos">
            <div class="produto">
                <img id="fotoluffy" src="imagens/luffy.png" alt="Figure Luffy">
                <div class="nomeProduto">LUFFY ONE PIECE</div>
                <div class="precoProduto">R$ 499,90</div>
                <div class="prazoEntrega">A pronta entrega</div>
                <input class="botaoSaibaMais" type="button" value="Saiba Mais" id="botaoLuffy">
            </div>

            <div class="produto">
                <img id="fotobatman" src="imagens/batman.png" alt="Figure Batman">
                <div class="nomeProduto">BATMAN ARKAM KNIGH</div>
                <div class="precoProduto">R$ 299,90</div>
                <div class="prazoEntrega">A pronta entrega</div>
                <input class="botaoSaibaMais" type="button" value="Saiba Mais" id="botaoBatman">
            </div>

            <div class="produto">
                <img id="fotohomemferro" src="imagens/homemferro.png" alt="Figure Ironman">
                <div class="nomeProduto">IRON MAN MARK 85</div>
                <div class="precoProduto">R$ 799,90</div>
                <div class="prazoEntrega">A pronta entrega</div>
                <input class="botaoSaibaMais" type="button" value="Saiba Mais" id="botaoIronMan">
            </div>
        </div>

        <div class="maisVendidos">
            <div class="produto">
                <img id="canecaLuffy" src="imagens/canecaLuffy.png" alt="Caneca Luffy">
                <div class="nomeProduto">CANECA LUFFY ONE PIECE</div>
                <div class="precoProduto">R$ 89,90</div>
                <div class="prazoEntrega">A pronta entrega</div>
                <input class="botaoSaibaMais" type="button" value="Saiba Mais" id="botaoCanecaLuffy">
            </div>

            <div class="produto">
                <img id="camisetaFlash" src="imagens/camisetaFlash.png" alt="Camiseta Flash">
                <div class="nomeProduto">CAMISETA FLASH</div>
                <div class="precoProduto">R$ 109,90</div>
                <div class="prazoEntrega">A pronta entrega</div>
                <input class="botaoSaibaMais" type="button" value="Saiba Mais" id="botaoFlash">
            </div>

            <div class="produto">
                <img id="chaveiroGojo" src="imagens/chaveiro.png" alt="Chaveiro Anime">
                <div class="nomeProduto">CHAVEIRO SATORU GOJO</div>
                <div class="precoProduto">R$ 29,90</div>
                <div class="prazoEntrega">A pronta entrega</div>
                <input class="botaoSaibaMais" type="button" value="Saiba Mais" id="botaoGojo">
            </div>
        </div>
    </div>

    <div class="barraInferior2"></div>

    <?php
    include('rodape.php')
    ?>

    <div id="modalFigures" class="modal">
        <div class="botaoFechar">
            <span id="fecharModalFigures">X</span>
        </div>
        <div>
            <p id="txt1" class="infoH"></p>
            <p id="txt2" class="info"></p>
            <p id="txt3" class="infoL"></p>
        </div>
    </div>

    <div id="modalPersonalizados" class="modal">
        <div class="botaoFechar">
            <span id="fecharModalPersonalizados">X</span>
        </div>
        <div>
            <p id="txtPersonalizado1" class="infoH"></p>
            <p id="txtPersonalizado2" class="info"></p>
            <p id="txtPersonalizado3" class="infoL"></p>
        </div>
    </div>

    <script src="script/script.js"></script>

</body>

</html>