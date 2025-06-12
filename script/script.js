function abrirSaibaMais(botaoId) {
    const tituloProduto = document.getElementById("txt1");
    const descricaoProduto = document.getElementById("txt2");
    const precoProduto = document.getElementById("txt3");

    switch (botaoId) {
        case "botaoLuffy":
            tituloProduto.innerHTML = "Monk D. Luffy - One Piece Film: Z";
            descricaoProduto.innerHTML = "Action figure de 20cm inspirada no filme One Piece, de 2012. Feita em PVC de alta qualidade, com braços e pernas articulados.";
            precoProduto.innerHTML = "R$ 499,90";
            break;

        case "botaoBatman":
            tituloProduto.innerHTML = "Batman - Edição Clássica 1989";
            descricaoProduto.innerHTML = "Action figure de 15cm inspirada no visual clássico do Cavaleiro das Trevas. Feita em PVC de alta qualidade, com braços e pernas articulados.";
            precoProduto.innerHTML = "R$ 299,90";
            break;

        case "botaoIronMan":
            tituloProduto.innerHTML = "Homem de Ferro - Armadura Mark 85";
            descricaoProduto.innerHTML = "Action figure de 20cm inspirada na armadura utilizada por Tony Stark em Vingadores: Ultimato. Altamente detalhada, com braços e pernas articulados.";
            precoProduto.innerHTML = "R$ 799,90";
            break;

        default:
            tituloProduto.innerHTML = "";
            descricaoProduto.innerHTML = "";
            precoProduto.innerHTML = "";
    }

    document.getElementById("saibaMais").style.display = "inline-block";
}

function fecharSaibaMais() {
    document.getElementById("saibaMais").style.display = "none";
}

function aplicarMascaraTelefone(evento) {
    let numero = evento.target.value.replace(/\D+/g, "");
    let tamanho = numero.length;

    if (tamanho > 11) {
        numero = numero.slice(0, 11);
    }

    if (tamanho > 10) {
        numero = numero.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
    } else if (tamanho > 5) {
        numero = numero.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
    } else if (tamanho > 2) {
        numero = numero.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
    } else {
        numero = numero.replace(/^(\d*)/, "($1");
    }

    evento.target.value = numero;
}

function obterParametrosUrl() {
    const parametros = {};
    const url = window.location.href;
    const inicio = url.indexOf("?");

    if (inicio !== -1) {
        const queryString = decodeURIComponent(url.substring(inicio + 1));
        const pares = queryString.split("&");

        for (let i = 0; i < pares.length; i++) {
            const [chave, valor] = pares[i].split("=");
            if (chave && valor) {
                parametros[chave] = valor.replace(/\+/g, " ");
            }
        }
    }

    return parametros;
}

document.addEventListener("DOMContentLoaded", function () {
    const botaoFecharModal = document.getElementById("fecharBotaoSaibaMais");
    const botaoLuffy = document.getElementById("botaoLuffy");
    const botaoBatman = document.getElementById("botaoBatman");
    const botaoIronMan = document.getElementById("botaoIronMan");
    const campoTelefone = document.getElementById("celular");
    const botaoVoltar = document.getElementById("botaoRetornar");

    if (botaoFecharModal) {
        botaoFecharModal.addEventListener("click", fecharSaibaMais);
    }

    if (botaoLuffy) {
        botaoLuffy.addEventListener("click", () => abrirSaibaMais("botaoLuffy"));
    }

    if (botaoBatman) {
        botaoBatman.addEventListener("click", () => abrirSaibaMais("botaoBatman"));
    }

    if (botaoIronMan) {
        botaoIronMan.addEventListener("click", () => abrirSaibaMais("botaoIronMan"));
    }

    if (campoTelefone) {
        campoTelefone.addEventListener("input", aplicarMascaraTelefone);
    }

    if (botaoVoltar) {
        botaoVoltar.addEventListener("click", () => {
            window.location.href = "contato.html";
        });
    }

    if (window.location.pathname.includes("contatoAction.html")) {
        const parametrosForm = obterParametrosUrl();
        const areaResultado = document.getElementById("dadosTabela");

        if (parametrosForm && Object.keys(parametrosForm).length > 0) {
            const tabelaResultado = document.createElement("table");
            tabelaResultado.className = "tabelaResultado";

            const nomesFormatados = {
                name: "Nome",
                email: "E-mail",
                celular: "Celular",
                dataNasc: "Data de Nascimento",
                termoAceite: "Termo de Aceite"
            };

            for (const campo in parametrosForm) {
                const linha = document.createElement("tr");

                const celulaNomeCampo = document.createElement("td");
                celulaNomeCampo.textContent = nomesFormatados[campo] || campo;
                celulaNomeCampo.className = "label";

                const celulaValorCampo = document.createElement("td");
                let valor = parametrosForm[campo];

                if (campo === "dataNasc" && valor) {
                    const [ano, mes, dia] = valor.split("-");
                    valor = `${dia}/${mes}/${ano}`;
                }

                celulaValorCampo.textContent = valor;

                linha.appendChild(celulaNomeCampo);
                linha.appendChild(celulaValorCampo);
                tabelaResultado.appendChild(linha);
            }

            areaResultado.appendChild(tabelaResultado);
        } else {
            areaResultado.innerHTML = "<p style='color: white;'>Nenhum dado recebido.</p>";
        }
    }
});