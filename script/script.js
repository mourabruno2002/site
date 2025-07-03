function abrirSaibaMais(botaoId) {
    document.getElementById("modalFigures").style.display = "none";
    document.getElementById("modalPersonalizados").style.display = "none";

    if (botaoId === "botaoLuffy" || botaoId === "botaoBatman" || botaoId === "botaoIronMan") {
        const titulo = document.getElementById("txt1");
        const descricao = document.getElementById("txt2");
        const preco = document.getElementById("txt3");

        switch (botaoId) {
            case "botaoLuffy":
                titulo.innerHTML = "Monk D. Luffy - One Piece Film: Z";
                descricao.innerHTML = "Action figure de 20cm inspirada no filme One Piece, de 2012. Feita em PVC de alta qualidade, com braços e pernas articulados.";
                preco.innerHTML = "R$ 499,90";
                break;
            case "botaoBatman":
                titulo.innerHTML = "Batman - Edição Clássica 1989";
                descricao.innerHTML = "Action figure de 15cm inspirada no visual clássico do Cavaleiro das Trevas. Feita em PVC de alta qualidade, com braços e pernas articulados.";
                preco.innerHTML = "R$ 299,90";
                break;
            case "botaoIronMan":
                titulo.innerHTML = "Homem de Ferro - Armadura Mark 85";
                descricao.innerHTML = "Action figure de 20cm inspirada na armadura utilizada por Tony Stark em Vingadores: Ultimato. Altamente detalhada, com braços e pernas articulados.";
                preco.innerHTML = "R$ 799,90";
                break;
        }

        document.getElementById("modalFigures").style.display = "inline-block";

    } else if (botaoId === "botaoCanecaLuffy" || botaoId === "botaoFlash" || botaoId === "botaoGojo") {
        const titulo = document.getElementById("txtPersonalizado1");
        const descricao = document.getElementById("txtPersonalizado2");
        const preco = document.getElementById("txtPersonalizado3");

        switch (botaoId) {
            case "botaoCanecaLuffy":
                titulo.innerHTML = "Caneca Personalizada - Monk D. Luffy";
                descricao.innerHTML = "Caneca de cerâmica personalizável com estampa de Monkey D. Luffy. Um excelente presente para fãs de anime.";
                preco.innerHTML = "R$ 89,90";
                break;
            case "botaoFlash":
                titulo.innerHTML = "Camiseta Personalizada - Flash";
                descricao.innerHTML = "Camiseta unissex em algodão com estampa do herói Flash. Confortável, com impressão de alta qualidade e disponível em diversos tamanhos.";
                preco.innerHTML = "R$ 109,90";
                break;
            case "botaoGojo":
                titulo.innerHTML = "Chaveiro Personalizado - Satoru Gojo";
                descricao.innerHTML = "Chaveiro personalizável com arte do personagem Satoru Gojo, de Jujutsu Kaisen. Leve e resistente, ideal para mochilas, chaves ou decoração.";
                preco.innerHTML = "R$ 29,90";
                break;
        }

        document.getElementById("modalPersonalizados").style.display = "inline-block";
    }
}

function fecharSaibaMais() {
    document.getElementById("modalFigures").style.display = "none";
    document.getElementById("modalPersonalizados").style.display = "none";
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

function removerRequired() {
    const inputs = document.querySelectorAll('input[required], textarea[required]');
    inputs.forEach(input => input.removeAttribute('required'));
}

document.addEventListener("DOMContentLoaded", function () {
    const botaoLuffy = document.getElementById("botaoLuffy");
    const botaoBatman = document.getElementById("botaoBatman");
    const botaoIronMan = document.getElementById("botaoIronMan");
    const botaoCanecaLuffy = document.getElementById("botaoCanecaLuffy");
    const botaoFlash = document.getElementById("botaoFlash");
    const botaoGojo = document.getElementById("botaoGojo");
    const campoTelefone = document.getElementById("celular");

    if (botaoLuffy) {
        botaoLuffy.addEventListener("click", () => abrirSaibaMais("botaoLuffy"));
    }

    if (botaoBatman) {
        botaoBatman.addEventListener("click", () => abrirSaibaMais("botaoBatman"));
    }

    if (botaoIronMan) {
        botaoIronMan.addEventListener("click", () => abrirSaibaMais("botaoIronMan"));
    }

    if (botaoCanecaLuffy) {
        botaoCanecaLuffy.addEventListener("click", () => abrirSaibaMais("botaoCanecaLuffy"));
    }

    if (botaoFlash) {
        botaoFlash.addEventListener("click", () => abrirSaibaMais("botaoFlash"));
    }

    if (botaoGojo) {
        botaoGojo.addEventListener("click", () => abrirSaibaMais("botaoGojo"));
    }

    document.getElementById("fecharModalFigures")?.addEventListener("click", fecharSaibaMais);
    document.getElementById("fecharModalPersonalizados")?.addEventListener("click", fecharSaibaMais);

    if (campoTelefone) {
        campoTelefone.addEventListener("input", aplicarMascaraTelefone);
    }

    const formContato = document.querySelector("form");
    const campoDataNasc = document.getElementById("dataNasc");

    if (formContato && campoDataNasc) {
        formContato.addEventListener("submit", function (e) {
            const dataInserida = new Date(campoDataNasc.value);
            const hoje = new Date();

            if (campoDataNasc.value && dataInserida > hoje) {
                alert("A data de nascimento não pode ser no futuro!");
                e.preventDefault();
            }
        });

        const hoje = new Date().toISOString().split("T")[0];
        campoDataNasc.setAttribute("max", hoje);
    }
});

