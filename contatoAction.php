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

    <?php include('menu.php') ?>

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

    <?php include('rodape.php') ?>

    <script src="script/script.js"></script>
</body>

</html>