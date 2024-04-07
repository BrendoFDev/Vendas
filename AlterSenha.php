<?php
require_once "php_action/db_connect.php";
session_start();

if ($_SESSION['code'] == null) {
    session_destroy();
    header("location:Login.php");
} elseif ((isset($_SESSION['nome']) == true) && (isset($_SESSION['senha']) == true) && (isset($_SESSION['tipo']) == true)) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Pathway+Extreme:wght@500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>

    <style>
        body {
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            padding: 0%;
            margin: 0%;
        }

        button {
            font-size: 20px;
            padding: 5px;
            margin: 10px;
            box-shadow: 1px 1px 10px black;
            border: none;
            border-radius: 5px 5px;
        }

        input[type=text] {
            font-size: 20px;
            width: 250px;
            padding: 5px;
            margin-left: 20px;
            border: none;
            border-radius: 5px 5px;
            box-shadow: 1px 1px 10px black;
        }
        input[type=password] {
            font-size: 20px;
            width: 250px;
            padding: 5px;
            margin-left: 20px;
            border: none;
            border-radius: 5px 5px;
            box-shadow: 1px 1px 10px black;
        }
        div#barra{
            position:absolute;
            top:15%;
            left: 18%;
            transform: translate(-50%,-50%);
        }
        span#span{
            position:absolute;
            top:23%;
            left: 21%;
            transform: translate(-50%,-50%);
        }
</style>
</head>

<body>

<div class="box_form">
    <div class="box_text">
        <h1>Coloque o Código no Campo Correto e Adicione a Senha nova</h1>
    </div>
    <form action="php_action/AlterSenha.php" method="post">
        
        <input type="text" name="code" placeholder="Código" require>
        <!-- Formate o type para password, agradeço brendo -->
        <input type="password" id="senha" name="senha" minlength="6" maxlength="6" onkeyup="verificaForcaSenha();" placeholder="Senha" required/>
                            <br><div id="barra" style="border:1px solid black; width:50px; height:1px; padding:5px; border-radius:10px 10px">
                            </div>
                            <span id="span"></span>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                            <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
                            </script>
                            <script>
                                function verificaForcaSenha() {
                                    v = senha.value;

                                    var chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<]) /;


                                    if (v.match(/[A-Z]{1,}/) && v.match(/[0-9]{1,}/) && v.match(/[~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<]{1,}/) && $('#senha').val().length < 6) {
                                        barra.style.backgroundColor = "yellow ";
                                        document.getElementById("span").innerHTML = "Média:<br>Digite Pelo menos<br> 6 Caracteres";
                                    } else if (v.match(/[A-Z]{1,}/) && v.match(/[0-9]{1,}/) && v.match(/[~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<]{1,}/) && $('#senha').val().length == 6) {
                                        barra.style.backgroundColor = "green";
                                        document.getElementById("span").innerHTML = "Forte";
                                    } else if (v.match(/[A-Z]{1,}/) && $('#senha').val().length < 6) {
                                        barra.style.backgroundColor = "red";
                                        document.getElementById("span").innerHTML = "Fraca:<br>Digite Pelo menos<br> 1 Número<br> 1 Caractere Especial<br> 6 Caracteres";
                                    } else if (v.match(/[A-Z]{1,}/) && $('#senha').val().length == 6) {
                                        barra.style.backgroundColor = "yellow";
                                        document.getElementById("span").innerHTML = "Média:<br>Digite Pelo Menos<br> 1 Número <br>1 Caractere Especial";
                                    } else if (v.match(/[0-9]{1,}/) && $('#senha').val().length < 6) {
                                        barra.style.backgroundColor = "red";
                                        document.getElementById("span").innerHTML = "Fraca:<br>Digite Pelo menos<br> 1 Letra Maiúscula<br> 1 Caractere Especial<br> 6 Caracteres";
                                    } else if (v.match(/[0-9]{1,}/) && $('#senha').val().length == 6) {
                                        barra.style.backgroundColor = "yellow";
                                        document.getElementById("span").innerHTML = "Média:<br>Digite Pelo Menos<br> 1 Letra Maiúscula<br>1 Caractere Especial";
                                    } else if (v.match(/[~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<]{1,}/) && $('#senha').val().length < 6) {
                                        barra.style.backgroundColor = "red";
                                        document.getElementById("span").innerHTML = "fraca:<br>Digite Pelo menos<br> 1 Letra Maiúscula<br> 1 Número<br> 6 Caracteres";
                                    } else if (v.match(/[~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<]{1,}/) && $('#senha').val().length == 6) {
                                        barra.style.backgroundColor = "yellow";
                                        document.getElementById("span").innerHTML = "Média:<br>Digite Pelo Menos<br> 1 Letra Maiúscula<br>1 Número";
                                    } else if ($('#senha').val().length < 6 && $('#senha').val().length > 0) {
                                        barra.style.backgroundColor = "red";
                                        document.getElementById("span").innerHTML = "fraca:<br>Digite Pelo menos<br> 1 Letra Maiúscula<br> 1 Número<br>1 Caracter Especial<br> 6 Caracteres";
                                    } else if (v.match(/[a-z]{1,}/) && $('#senha').val().length <= 6) {
                                        barra.style.backgroundColor = "red";
                                        document.getElementById("span").innerHTML = "fraca:<br>Digite Pelo menos<br> 1 Letra Maiúscula<br> 1 Número<br>1 Caracter Especial<br> 6 Caracteres";
                                    } else {
                                        barra.style.backgroundColor = "#fff";
                                        document.getElementById("span").innerHTML = "";
                                    }
                                }
                            </script>
        <button type="submit">Confirmar</button><a href="RecSenha.php"><button type="button">Voltar</button></a>
    </form>
</div>

</body>

</html>