function abrirSaibaMais (figure) {
    let txt1 = document.getElementById("txt1");
    let txt2 = document.getElementById("txt2");
    let txt3 = document.getElementById("txt3");
    let saibaMais = document.getElementById("saibaMais");
    let produtos = document.getElementById(figure);
    let produtosMov = produtos.getBoundingClientRect();

    switch (figure) {
        case "botaoLuffy":
            txt1.innerHTML = "Monk D. Luffy - One Piece Film: Z";
            txt2.innerHTML = "Action figure de 20cm inspirada no filme One Piece, de 2012. Feita em PVC de alta qualidade, com braços e pernas articulados. ";
            txt3.innerHTML = "R$ 499,90";
            break;

        case "botaoBatman":
            txt1.innerHTML = "Batman - Edição Clássica 1989";
            txt2.innerHTML = "Action figure de 15cm inspirada no visual classico do Cavaleiro das Trevas. Feita em PVC de alta qualidade, com braços e pernas articulados. ";
            txt3.innerHTML = "R$ 299,90";
            break;

        case "botaoIronMan":
            txt1.innerHTML = "Homem de Ferro - Armadura Mark 85";
            txt2.innerHTML = "Action figure de 20cm inspirada na armadura utilizada por Tony Stark em Vingadores: Ultimato. Altamente detalhada, com braços e pernas articulados. ";
            txt3.innerHTML = "R$ 799,90";
            break;

        default:
            txt1.innerHTML = "";
            txt2.innerHTML = "";
            txt3.innerHTML = "";
    }

    document.getElementById("saibaMais").style.display = "inline-block";

}

function fecharSaibaMais() {
    document.getElementById("saibaMais").style.display = 'none';
}

document.getElementById("fecharBotaoSaibaMais").addEventListener("click", function () {
    fecharSaibaMais("saibaMais");
})

document.getElementById("botaoLuffy").addEventListener("click", function () {
    abrirSaibaMais("botaoLuffy");
});

document.getElementById("botaoBatman").addEventListener("click", function () {
    abrirSaibaMais("botaoBatman");
});

document.getElementById("botaoIronMan").addEventListener("click", function () {
    abrirSaibaMais("botaoIronMan");
});

function mascaraTelefone (event) {
    let tecla = event.key;
    let telefone = event.target.value.replace(/\D+/g, "");

    if (/^[0-9]$/i.test(tecla)) {
        telefone = telefone + tecla;
        let tamanho = telefone.length;
        if (tamanho >= 12) {
            return false;
        }

        if (tamanho > 10) {
            telefone = telefone.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
        } else if (tamanho > 5) {
            telefone = telefone.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
        } else if(tamanho > 2) {
            telefone = telefone.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
        } else {
            telefone = telefone.replace(/^(\d*)/, "($1");
        }

        event.target.value = telefone;
    }

    if (!["Backspace", "Delete", "Tab"].includes(tecla)) {
        return false;
    }
}

function getParametros() {
    let parametros = {};
    let url = window.location.href;
    let parametrosInicio = url.indexOf("?");

    if (parametrosInicio !== -1) {
        let parametrosString = url.substring(parametrosInicio + 1);
        parametrosString = decodeURIComponent(parametrosString);
        let pares = parametrosString.split("&");

        for (let i = 0; i < pares.length; i++) {
            let parArray = pares[i].split("=");
            if (parArray.length === 2) {
                parametros[parArray[0]] = parArray[1].replace(/\+/g, ' ');
            }
        }
    }

    return parametros;
}

document.addEventListener("DOMContentLoaded", function () {
    if (window.location.pathname.includes("contatoAction.html")) {
        const dados = getParametros();
        const resultado = document.getElementById("resultado");

        if (dados && Object.keys(dados).length > 0) {
            const table = document.createElement("table");
            table.className = "tabela-dados";

            for (const chave in dados) {
                const row = document.createElement("tr");

                const cellLabel = document.createElement("td");
                cellLabel.textContent = chave.charAt(0).toUpperCase() + chave.slice(1);
                cellLabel.className = "label";

                const cellValue = document.createElement("td");
                cellValue.textContent = dados[chave];

                row.appendChild(cellLabel);
                row.appendChild(cellValue);
                table.appendChild(row);
            }

            resultado.appendChild(table);
        } else {
            resultado.textContent = "Nenhum dado recebido.";
        }
    }
});

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('celular').addEventListener('keydown', mascaraTelefone);
})
