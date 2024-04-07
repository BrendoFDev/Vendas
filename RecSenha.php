<?php
require_once "php_action/db_connect.php";
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
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js'></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>
    <style>
        body {
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            background-color: skyblue;
            padding: 0%;
            margin: 0%;
        }

        button {
            font-size: 20px;
            padding: 5px;
            margin: 0px;
            box-shadow: 1px 1px 10px black;
            border: none;
            border-radius: 5px 5px;
            transform: translate(80%, -10%);
        }

        #c {
            transform: translate(150%, -10%);
        }


        input[type=text] {
            font-size: 20px;
            width: 250px;
            padding: 5px;
            margin-left: 10px;
            border: none;
            border-radius: 5px 5px;
            box-shadow: 1px 1px 10px black;

        }

        div.box_form {
            position: center;
            top: 5%;
            display: flex;
            flex-direction: column;
            background-color: white;
            border-radius: 10px;
            border: none;
            padding: 5%;
            width: 300px;
            box-shadow: 1px 1px 10px black;
            transform: translate(160%, 60%);


        }


        div.box_text {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h1 {
            font-family: 'Pathway Extreme', sans-serif;
            position: relative;
            transform: translate(10px, -10px);
            color: #406d96;
            font-size: 33px;
        }

        .back {
            color: #fff;
            background-color: #406d96;
            font-weight: bolder;
            border: #00008b none;
            padding: 10px;
            border-radius: 10px;
        }


        .back:hover {
            background-color: #00008b;
        }

        .a {
            margin-left: 9px;
            color: #406d96;
            font-size: 20px;
            font-weight: bold;

        }
    </style>
</head>

<body>
    <div class="a">
        <a href="login.php">Login </a> > Recuperação de Senha
        </a>
        <div class="box_text">
            <label for="email">

            </label>
        </div>
        <div class="box_form">
            <h1>Recuperar Senha</h1>
            <form action="EnvRec.php" method="post">

                <br><input type="text" onkeyup="CPF();" name="cpf" id="cpf" placeholder="CPF" data-mask="000.000.000-00" maxlength="14"></br>
                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js'></script>
                <br><input type="text" id="email" name="email" placeholder="Insira seu email"></br>

                <br> <button id="but" type="submit" class="back">Recuperar</button></br>
                <br>
                <a href="Login.php"><button type="button" class="back" name="enviar" id="c">Voltar</button></a>
                </br>

            </form>
            </section>
        </div>
</body>

</html>