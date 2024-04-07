<?php
require_once "php_action/db_connect.php";
session_start();
$id = $_SESSION['id_user'];
$nome = $_SESSION['nome'];
$senha = $_SESSION['senha'];
$tipo = $_SESSION['tipo'];

if ((isset($_SESSION['nome']) != true) && (isset($_SESSION['senha']) != true) && (isset($_SESSION['tipo']) != true)) {

    header("location:Login.php");
} elseif ($tipo == 1) {
} elseif ($tipo == 0) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Pathway+Extreme:wght@500&display=swap" rel="stylesheet">
    <script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>
    <script type='text/javascript' src='cep.js'></script>
    <!-- <title>Qual o nome do site?</title> -->
    <style>
        body {
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            background-image: radial-gradient(#00FFFF, #00008b);
            margin: 0px;
            padding: 0px;
        }

        button {
            font-size: 20px;
            padding: 5px;
            margin: 5px;
            box-shadow: 1px 1px 10px black;
            border: none;
            border-radius: 5px 5px;
        }

        input[type=text] {
            font-size: 20px;
            padding: 5px;
            width: 300px;
            margin: 5px;
            border: none;
            border-radius: 5px 5px;
            box-shadow: 1px 1px 10px black;
        }

        input[type=password] {
            font-size: 20px;
            padding: 5px;
            margin: 5px;
            border: none;
            border-radius: 5px 5px;
            box-shadow: 1px 1px 10px black;
        }

        input[type=radio] {
            width: 20px;
            height: 20px;
        }

        .box_form {
            margin-top: 50px;
            transform: translate(20%, 20%);
            margin-left: 400px;
            margin-right: 400px;
            margin-bottom: 200px;
            border: solid none;
            border-radius: 20px;
            width: 800px;
            background-color: #fff;
            color: #406d96;
            font-family: sans-serif;
            padding: 30px;
            display: flex;
            justify-content: center;

        }

        label {
            font-size: 20px;
            font-weight: bolder;
        }

        h1 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: center;
            background-color: #406d96;
            color: #fff;
            transform: translate(50%, 10%);

        }


        .back {
            color: #fff;
            background-color: #406d96;
            font-weight: bolder;
            border: #406d96 none;
            padding: 10px;
            border-radius: 10px;
        }



        .back:hover {
            background-color: #00008b;
        }

        a {
            color: #406d96;
        }

        .nav1 {
            padding: 0px;
            background-color: #fff;
            width: 100%;
            height: 40px;
        }

        .box_logo {
            font-family: sans-serif;
            font-size: 20px;
            color: white;
            display: flex;
            background-color: #406d96;

        }

        #h1 {
            font-size: 20px;
            margin-left: 9px;
            font-family: sans-serif;
            color: #fff;
            transform: translate(50%, 45%);


        }

        h2 {
            font-size: 50px;
            transform: translate(20%, 10%);
        }

        a {
            margin-left: 9px;
            color: #fff;
            font-size: 20px;
            font-weight: bold;

        }
    </style>
    </style>
</head>

<body>



        <div class="box_logo">
            <h2>Tech For US</h2>

            <div id="h1">
                <a href="index.php">Página Inicial</a> >Cadastrar Usuário

            </div>
        </div>
        <div class="box_form">
            <table>
                <form method="post" action="php_action/Cad_user.php">
                    <tr>
                        <td>
                            <center>
                                <h1>Dados do Usuário</h1>
                            </center>
                        </td>
                    </tr>
                    <?php

                    if (isset($_SESSION['msg'])) {
                    ?>
                        <tr>
                            <td>
                                <center>
                                    <h4 class='msg'><?php echo $_SESSION['msg']; ?> </h4>
                                </center><br>
                            </td>
                        </tr>

                    <?php
                        unset($_SESSION['msg']);
                    }

                    ?>
                    <tr>
                        <th><label for="nome">Nome: </label></th>

                        <td>
                            <input type="text" name="nome" id="nome" placeholder="Nome" onkeyup="this.value = this.value.toUpperCase();">
                        </td>
                    <tr>
                    <tr>
                        <th><label for="cpf">Cpf:</label></th>
                        <td>
                            <input type="text" id="cpf" name="cpf" onkeyup="cpfCheck(this)" maxlength="14" placeholder="CPF" id="cpf" class="input" onkeydown="javascript: fMasc( this, mCPF );" required>
                            <span id="cpfResponse"></span>
                        </td>
                        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js'></script>
                        <script>
                            function is_cpf(c) {

                                if ((c = c.replace(/[^\d]/g, "")).length != 11)
                                    return false

                                if (c == "00000000000")
                                    return false;
                                if (c == "11111111111")
                                    return false;
                                if (c == "22222222222")
                                    return false;
                                if (c == "33333333333")
                                    return false;
                                if (c == "44444444444")
                                    return false;
                                if (c == "55555555555")
                                    return false;
                                if (c == "66666666666")
                                    return false;
                                if (c == "77777777777")
                                    return false;
                                if (c == "88888888888")
                                    return false;
                                if (c == "99999999999")
                                    return false;
                                var r;
                                var s = 0;

                                for (i = 1; i <= 9; i++)
                                    s = s + parseInt(c[i - 1]) * (11 - i);

                                r = (s * 10) % 11;

                                if ((r == 10) || (r == 11))
                                    r =0;

                                if (r != parseInt(c[9]))
                                    return false;

                                s = 0;
                                
                                for (i = 1; i <= 10; i++)
                                    s = s + parseInt(c[i - 1]) * (12 - i);

                                r = (s * 10) % 11;

                                if ((r == 10) || (r == 11))
                                    r = 0;

                                  

                                if (0 != parseInt(c[10]))
                                    return false;

                                return true;
                            }


                            function fMasc(objeto, mascara) {
                                obj = objeto
                                masc = mascara
                                setTimeout("fMascEx()", 1)
                            }

                            function fMascEx() {
                                obj.value = masc(obj.value)
                            }

                            function mCPF(cpf) {
                                cpf = cpf.replace(/\D/g, "")
                                cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
                                cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
                                cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
                                return cpf
                            }

                            cpfCheck = function(el) {
                                document.getElementById('cpfResponse').innerHTML = is_cpf(el.value) ? '<span style="color:green">válido</span>' : '<span style="color:red">inválido</span>';
                                if (el.value == '') document.getElementById('cpfResponse').innerHTML = '';
                            }
                        </script>

                    </tr>
                    <tr>
                        <th><label for="senha">Senha:</label></th>

                        <td>
                            <input type="password" id="senha" name="senha" minlength="6" maxlength="6" onkeyup="verificaForcaSenha();" placeholder="Senha" />
                            <div id="barra" style="border:1px solid black; width:50px; height:5px;padding:5px; border-radius:10px 10px;">
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
                        </td>

                    </tr>
                    <tr>
                        <th><label for="email">Email:</label></th>
                        <td><input type="text" name="email" id="email" placeholder="Email"></td>
                    </tr>
                    <tr>
                        <th><label>CEP (Somente números):</label></th>
                        <td><input type="text" name="cep" id="cep" maxlength="8" placeholder="CEP" /></td>
                    </tr>
                    <tr>
                        <th> <label>Rua:</label< /th>
                        <td><input type="text" name="rua" id="rua" size="45" maxlength="45" placeholder="Rua" /></td>
                    </tr>
                    <tr>
                        <th><label>Número:</label></th>
                        <td><input type="text" name="numero" id="numero" size="5" maxlength="5" placeholder="Número" /></td>
                    </tr>

                    <tr>
                        <th><label>Bairro:</label></th>
                        <td><input type="text" name="bairro" id="bairro" size="25" maxlength="25" placeholder="Bairro" /></td>
                    </tr>

                    <th> <label>Cidade:</label></th>
                    <td><input type="text" name="cidade" id="cidade" size="25" maxlength="25" placeholder="Cidade" /></td>
                    </tr>

                    <tr>
                        <th><label>Estado:</label></th>
                        <td><input type="text" name="estado" id="estado" size="2" maxlength="2" placeholder="Estado" /></td>

                    </tr>
                    <tr>
                        <td>
                            <center><button class="back" type="submit">Cadastrar</button> <a href="index.php"><button type="button" class="back">Voltar</button></a></center>
                        </td>
                    </tr>
                </form>
            </table>
  

</body>

</html>