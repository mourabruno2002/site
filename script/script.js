function abrirSaibaMais (figure) {
    let txt1 = document.getElementById("txt1");
    let txt2 = document.getElementById("txt2");
    let txt3 = document.getElementById("txt3");

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