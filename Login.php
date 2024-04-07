<?php
require_once "php_action/db_connect.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Pathway+Extreme:wght@500&display=swap" rel="stylesheet">

    <!-- <title>Qual o nome do site?</title> -->
    <style>
        body {
            height: 100%;
            padding: 170px;
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            display: absolute;

            background-image: linear-gradient(100deg, #00FFFF, #00008b);

        }

        button {
            font-size: 20px;
            padding: 10px;
            margin: 5 px;
            box-shadow: 1px 1px 10px #406d96;
            border: none;
            border-radius: 5px 5px;
            background-color: #406d96;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover{
            transition: all 0.3s;
            background-color:#0576dd;
            color: white;
            box-shadow: 1px 1px 10px black;
        }

        input {
            font-size: 20px;
            background-color: white;
            box-shadow: 1px 1px 10px black;
            margin: 5px;
            border: none;
            padding: 5px;
            border-radius: 10px 10px;
            width: 280px;


        }

        .box_form {
            top: 20%;
            display: flex;
            flex-direction: column;
            background-color: white;
            border-radius: 10px;
            border: none;
            padding: 5%;
            width: 300px;
            box-shadow: 1px 1px 10px black;
            transform: translate(5%, 25%);
        }



        .box_form .submit {


            background-color: white;
            font-size: 20px;
            margin: 5px;
            border: none;
            border-radius: 5px 5px;
            box-shadow: 1px 1px 10px black;

        }

        div.nav {
            position: absolute;
            top: 3%;
            width: 182%;
            transform: translate(-50%, -50%);
            background-color: #56acde;
            font-size: 20px;
            padding: 50px;
            margin: 5px;
            border: none;
            justify-content: center;
            border-radius: 5px 5px;
            box-shadow: 1px 1px 10px black;
            left: 6%;

        }

        #a {
            font-family: 'Pathway Extreme', sans-serif;
            color: white;
            font-size: 60px;
            transform: translate(2%, 35%);

        }

        h4 {
            color: red;
            font-size: 20px;
        }

        td {
            color: #406d96;
            font-size: 30px;
        }

        th {
            color: #406d96;
        }

        .button,
        .back {
            color: #fff;
            background-color: #406d96;
            font-weight: bolder;
            border: #406d96 none;
            padding: 10px;
            border-radius: 10px;
        }

        .button:hover {
            background-color: #00008b;
        }

        .back:hover {
            background-color: #00008b;
        }

        #b {
            font-family: 'Pathway Extreme', sans-serif;
            color: #406d96;
            font-size: 50px;
            transform: translate(2%, 10%);
        }
    </style>
</head>

<body>

    <center>
        <div class="nav">
            <div class="box_logo">

                <header>
                    <h1 id="a">Tech For US</h1>
                </header>
            </div>
        </div>
        <div class="box_form">
            <table>
                <form method="post" action="php_action/Open.php">
                    <tr>
                        <td>
                            <center>
                                <h2 id="b">Entre Já</h2>
                            </center>
                        </td>
                    </tr>
                    <?php
                    if (isset($_SESSION['msg'])) {
                    ?>
                        <tr>
                            <td>
                                <h4 class='msg'> <?php echo $_SESSION['msg']; ?></h4><br>
                            </td>
                        </tr>

                    <?php
                        unset($_SESSION['msg']);
                    }

                    ?>
                    <tr>
                        <th><label for="nome">Nome</label></th>
                    </tr>
                    <tr>
                        <td>
                            <center><input type="text" name="nome" id="nome" onkeyup="this.value = this.value.toUpperCase();" placeholder="Nome"></center>
                        </td>
                    <tr>
                    <tr>
                        <th><label for="senha">Senha</label></th>
                    </tr>

                    <tr>
                        <td>
                            <center><input type="password" name="senha" id="senha" placeholder="Senha"></center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center><button type="submit">Entrar</button><a href="RecSenha.php"><button type="button">Recuperar Senha</button></a></center>
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </center>
</body>

</html>