function abrirSaibaMais(botaoId) {
    const figures = {
        botaoLuffy: {
            titulo: "Monk D. Luffy - One Piece Film: Z",
            descricao: "Action figure de 20cm inspirada no filme One Piece, de 2012. Feita em PVC de alta qualidade, com braços e pernas articulados.",
            preco: "R$ 499,90"
        },
        botaoBatman: {
            titulo: "Batman - Edição Clássica 1989",
            descricao: "Action figure de 15cm inspirada no visual clássico do Cavaleiro das Trevas. Feita em PVC de alta qualidade, com braços e pernas articulados.",
            preco: "R$ 299,90"
        },
        botaoIronMan: {
            titulo: "Homem de Ferro - Armadura Mark 85",
            descricao: "Action figure de 20cm inspirada na armadura utilizada por Tony Stark em Vingadores: Ultimato. Altamente detalhada, com braços e pernas articulados.",
            preco: "R$ 799,90"
        }
    };

    const personalizados = {
        botaoCanecaLuffy: {
            titulo: "Caneca Personalizada - Monk D. Luffy",
            descricao: "Caneca de cerâmica personalizável com estampa de Monkey D. Luffy. Um excelente presente para fãs de anime.",
            preco: "R$ 89,90"
        },
        botaoFlash: {
            titulo: "Camiseta Personalizada - Flash",
            descricao: "Camiseta unissex em algodão com estampa do herói Flash. Confortável, com impressão de alta qualidade e disponível em diversos tamanhos.",
            preco: "R$ 109,90"
        },
        botaoGojo: {
            titulo: "Chaveiro Personalizado - Satoru Gojo",
            descricao: "Chaveiro personalizável com arte do personagem Satoru Gojo, de Jujutsu Kaisen. Leve e resistente, ideal para mochilas, chaves ou decoração.",
            preco: "R$ 29,90"
        }
    };

    document.getElementById("modalFigures").style.display = "none";
    document.getElementById("modalPersonalizados").style.display = "none";

    if (figures[botaoId]) {
        document.getElementById("txt1").innerText = figures[botaoId].titulo;
        document.getElementById("txt2").innerText = figures[botaoId].descricao;
        document.getElementById("txt3").innerText = figures[botaoId].preco;
        document.getElementById("modalFigures").style.display = "inline-block";
    } else if (personalizados[botaoId]) {
        document.getElementById("txtPersonalizado1").innerText = personalizados[botaoId].titulo;
        document.getElementById("txtPersonalizado2").innerText = personalizados[botaoId].descricao;
        document.getElementById("txtPersonalizado3").innerText = personalizados[botaoId].preco;
        document.getElementById("modalPersonalizados").style.display = "inline-block";
    }
}

function fecharSaibaMais() {
    document.getElementById("modalFigures").style.display = "none";
    document.getElementById("modalPersonalizados").style.display = "none";
}

function aplicarMascaraTelefone(evento) {
    let numero = evento.target.value.replace(/\D+/g, "").slice(0, 11);
    if (numero.length > 10) {
        numero = numero.replace(/^(\d\d)(\d{5})(\d{4})/, "($1) $2-$3");
    } else if (numero.length > 5) {
        numero = numero.replace(/^(\d\d)(\d{4})(\d{0,4})/, "($1) $2-$3");
    } else if (numero.length > 2) {
        numero = numero.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
    } else {
        numero = numero.replace(/^(\d*)/, "($1");
    }
    evento.target.value = numero;
}

function obterParametrosUrl() {
    const parametros = {};
    const queryString = window.location.search.substring(1);
    queryString.split("&").forEach(par => {
        const [chave, valor] = par.split("=");
        if (chave && valor) {
            parametros[chave] = decodeURIComponent(valor.replace(/\+/g, " "));
        }
    });
    return parametros;
}

function abrirModal(id) {
    const modal = document.getElementById(id);
    if (modal) modal.style.display = "block";
}

function fecharModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.style.display = "none";
        modal.querySelector(".avisoLogin")?.remove();
    }
}

function renomearImgEnviada() {
    const input = document.getElementById("imagem");
    const label = document.getElementById("nomeImagem");
    if (input && label) {
        input.addEventListener("change", () => {
            label.textContent = input.files.length ? input.files[0].name : "Nenhuma imagem selecionada";
        });
    }
}

function mostrarOcultarSenha(id1, id2 = null) {
    const campo1 = document.getElementById(id1);
    const campo2 = id2 ? document.getElementById(id2) : null;
    const tipoAtual = campo1.type === "password" ? "text" : "password";
    campo1.type = tipoAtual;
    if (campo2) campo2.type = tipoAtual;
}

function validarSenhas() {
    const s1 = document.getElementById("senhaCadastro1").value;
    const s2 = document.getElementById("senhaCadastro2").value;
    if (s1 !== s2) {
        alert("As senhas não coincidem!");
        return false;
    }
    return true;
}

document.addEventListener("DOMContentLoaded", function () {
    ["botaoLuffy", "botaoBatman", "botaoIronMan", "botaoCanecaLuffy", "botaoFlash", "botaoGojo"].forEach(id => {
        document.getElementById(id)?.addEventListener("click", () => abrirSaibaMais(id));
    });

    document.getElementById("fecharModalFigures")?.addEventListener("click", fecharSaibaMais);
    document.getElementById("fecharModalPersonalizados")?.addEventListener("click", fecharSaibaMais);

    document.querySelectorAll('input[type="tel"], input[name="celular"]').forEach(input => {
        input.addEventListener("input", aplicarMascaraTelefone);
    });

    const formContato = document.querySelector("form");
    const campoDataNasc = document.getElementById("dataNasc");
    if (formContato && campoDataNasc) {
        const hoje = new Date().toISOString().split("T")[0];
        campoDataNasc.setAttribute("max", hoje);
        formContato.addEventListener("submit", e => {
            const data = new Date(campoDataNasc.value);
            if (campoDataNasc.value && data > new Date()) {
                alert("A data de nascimento não pode ser no futuro!");
                e.preventDefault();
            }
        });
    }

    renomearImgEnviada();

    document.getElementById("modalLogin")?.querySelector(".fecharLoginCadastro")
        ?.addEventListener("click", () => fecharModal("modalLogin"));
    document.getElementById("modalCadastro")?.querySelector(".fecharLoginCadastro")
        ?.addEventListener("click", () => fecharModal("modalCadastro"));

    const parametros = obterParametrosUrl();

    if (parametros["loginNecessario"] === "1" || parametros["erroLogin"] === "1") {
        abrirModal("modalLogin");

        const modal = document.getElementById("modalLogin");
        if (modal) {
            modal.querySelector(".avisoLogin")?.remove();
            const aviso = document.createElement("p");
            aviso.textContent = parametros["erroLogin"] === "1"
                ? "Usuário ou senha inválidos." : "ALERTA! Login necessário!";
            aviso.className = "avisoLogin";
            aviso.style.color = "#f9b000";
            aviso.style.fontWeight = "bold";
            aviso.style.marginBottom = "15px";
            modal.querySelector("form").insertAdjacentElement("beforebegin", aviso);
        }
    }

    if (parametros["cadastroErro"] === "1") {
        abrirModal("modalCadastro");

        const modal = document.getElementById("modalCadastro");
        if (modal) {
            modal.querySelector(".avisoLogin")?.remove();
            const aviso = document.createElement("p");
            aviso.textContent = parametros["mensagem"] || "Erro ao cadastrar.";
            aviso.className = "avisoLogin";
            aviso.style.color = "#f9b000";
            aviso.style.fontWeight = "bold";
            aviso.style.marginBottom = "15px";
            modal.querySelector("form").insertAdjacentElement("beforebegin", aviso);
        }
    }

    if (parametros["loginSucesso"] === "1") {
        const campoMensagem = document.getElementById("mensagemLoginSucesso");
        if (campoMensagem) {
            campoMensagem.textContent = "Login efetuado com sucesso!";
            campoMensagem.style.display = "block";
            abrirModal("modalLogin");

            setTimeout(() => {
                campoMensagem.style.display = "none";
                fecharModal("modalLogin");
                window.history.replaceState({}, document.title, window.location.pathname);
            }, 3000);
        }
    }

    if (parametros["cadastroSucesso"] === "1") {
        const campoMensagem = document.getElementById("mensagemCadastroSucesso");
        if (campoMensagem) {
            campoMensagem.textContent = "Cadastro efetuado com sucesso!";
            campoMensagem.style.display = "block";
            abrirModal("modalCadastro");

            setTimeout(() => {
                campoMensagem.style.display = "none";
                fecharModal("modalCadastro");
                abrirModal("modalLogin");
                window.history.replaceState({}, document.title, window.location.pathname);
            }, 3000);
        }
    }

    const checkboxMostrar = document.getElementById("mostrarSenha");
    if (checkboxMostrar) {
        checkboxMostrar.addEventListener("change", () => {
            const senha1 = document.getElementById("Senha1");
            const senha2 = document.getElementById("Senha2");
            const tipo = checkboxMostrar.checked ? "text" : "password";
            if (senha1) senha1.type = tipo;
            if (senha2) senha2.type = tipo;
        });
    }
});