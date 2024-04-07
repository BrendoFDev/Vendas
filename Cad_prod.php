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
    <?php
    session_start();
    $id = $_SESSION['id_user'];
    $nome = $_SESSION['nome'];
    $senha = $_SESSION['senha'];
    $tipo = $_SESSION['tipo'];

    if ((isset($_SESSION['nome']) != true) && (isset($_SESSION['senha']) != true) && (isset($_SESSION['tipo']) != true)) {

        header("location:Login.php");
    } else {
    }
    if ($tipo == 0) {
        header("location:index.php");
    }
    ?>
    <!-- <title>Qual o nome do site?</title> -->
    <style>
        body {
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            background: rgb(2, 0, 36);
            background-image: radial-gradient(#00FFFF, #00008b);
            margin: 0px;
        }

        form {
            background: white;
            display: flex;
            flex-direction: column;
            margin-left: 800px;
            margin-right: 800px;
            margin-top: 100px;
            border-radius: 20px;
            padding: 20px;
            font-family: 'Pathway Extreme', sans-serif;
            font-weight: bold;
            color: #406d96;
        }

        input {
            border-radius: 9px;
            border: #406d96 solid;
            font-size: 30px;
        }

        h1 {
            font-size: 40px;
            font-family: 'Pathway Extreme', sans-serif;
        }

        .back {

            background: darkblue;
            color: white;
            font-family: 'Pathway Extreme', sans-serif;
            border: darkblue;
            border-radius: 9px;
            padding: 10px;
            font-weight: bolder;
            transform: translate(307%, 5%);

        }

        button.button {
            background: #406d96;
            color: white;
            width: 200px;
            border-radius: 10px;
            font-family: 'Abel', sans-serif;
            font-weight: bold;
            font-size: 25px;
            border: #406d96;
            transform: translate(60%, -50%);

        }
        button {
            font-size: 20px;
            padding: 5px;
            margin: 5px;    
            border: none;
            border-radius: 5px 5px;
            font-size: 20px;
            padding: 10px;
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
        }

        #d {
            background: #406d96;
            color: white;
            width: 30%;
            font-size: 30px;
            border-radius: 10px;
            font-family: 'Pathway Extreme', sans-serif;
            font-weight: bold;
            border: #406d96;
            transform: translate(73%, -50%);
        }

        #a {
            margin-left: 16px;
            color: #406d96;
            font-weight: bold;
            font-size: 20px;
            font-family: sans-serif;
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
            transform: translate(50%, 50%);


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

<div class="nav">
    <div class="box_logo">
        <h1>Tech For US</h1>

        <div id="h1">
            <a href="index.php">Página Inicial</a> >Cadastrar Produtos

        </div>
    </div>


</div>


<form method="post" action="php_action/Cad_prod.php">




    <h1>Novo Produto</h1>
    <?php

    if (isset($_SESSION['msg'])) {
    ?> <h4 class='msg'><?php echo $_SESSION['msg']; ?> </h4>

    <?php
        unset($_SESSION['msg']);
    }

    ?>

    <label for="img">Imagem do Produto</label>

    <input type="text" name="img" id="img" placeholder="Link Da Imagem"><br><br>

    <label for="nome">Nome do Produto</label>

    <input type="text" name="nome" id="nome" placeholder="Nome"><br><br>

    <label for="qtd">Quantidade do Produto</label>

    <input type="text" name="qtd" id="qtd" placeholder="Quantidade"><br><br>

    <label for="valor">Valor Produto</label>

    <input type="text" name="valor" id="valor" placeholder="R$">

    <br><br><button class="button" type="submit">Cadastrar</button> 
    <a href="index.php"><button type="button" class="back">Voltar</button></a>

</form>



</body>

</html>