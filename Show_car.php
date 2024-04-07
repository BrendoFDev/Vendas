<?php
require_once "php_action/db_connect.php";
session_start();

$id = $_SESSION['id_user'];
$nome = $_SESSION['nome'];
$senha = $_SESSION['senha'];
$tipo = $_SESSION['tipo'];

if ((isset($_SESSION['nome']) != true) && (isset($_SESSION['senha']) != true) && (isset($_SESSION['tipo']) != true)) {

    header("location:Login.php");
} elseif ($tipo == 0) {
} elseif ($tipo == 1) {
    header("location:index.php");
}

$carrinho = $_SESSION['carrinho'];



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

    <!-- <title>Qual o nome do site?</title> -->
    <style>
        body {
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            background: rgb(0, 0, 139);
            background: linear-gradient(90deg, rgba(0, 0, 139, 1) 0%, rgba(0, 212, 255, 1) 0%, rgba(0, 212, 255, 1) 69%);
            padding: 0%;
            margin: 0%;
        }

        button {
            font-size: 20px;
            padding: 10px;
            margin: 0px;
            box-shadow: 1px 1px 10px #406d96;
            border: none;
            border-radius: 5px 5px;
            background-color: #406d96;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            transition: all 0.3s;
            background-color: #0576dd;
            color: white;
            box-shadow: 1px 1px 10px black;
        }

        table {
            width: 500px;

        }

        div.nav {
            position: static;
            display: flex;
            justify-content: space-between;
            margin: 0;
            background-color: #406d96;

        }

        .box_logo {
            font-family: sans-serif;
            font-size: 20px;
            color: white;
            display: flex;

        }

        .valor {
            font-size: 20px;
            margin-top: 200px;
            margin-left: 940px;
            transform: translate(-710px, 50px);
        }

        .box_table {
            background-color: #fff;
            box-shadow: 1px 1px 10px black;
            transform: translate(100%, 50%);
            width: 550px;
            border: none;
            border-radius: 5px 5px;
            height: 300px;
            padding: 50px;
            color: black;

        }

        .box_site,
        a {
            color: #fff;
            transform: translate(40%, 50%);
        }
    </style>
</head>

<body>
    <div class="nav">
        <div class="box_logo">
            <h1>Tech For US</h1>
            <div class="box_site">
                <a href="index.php">Página Inicial</a>>Carrinho
            </div>
        </div>
    </div>
    <div class="box_table">
        <h1>Carrinho
            <a href="index.php"><button type="button" class="back">Voltar</button></a>
            <a href="php_action/Delete_car.php"><button>Apagar Carrinho</button></a>
            <a href="php_action/comp.php"><button>Comprar</button></a>
        </h1>

        <table>
            <tr>
                <th>
                    Produto
                </th>
                <th>
                    Quantidade
                </th>
                <th>
                    Valor Unidade
                </th>
            </tr>


            <?php
            $total = 0;
            foreach ($carrinho as $key => $values) {
            ?>
                <tr>
                    <td>
                        <center><?php echo $values["nome"]; ?></center>
                    </td>
                    <td>
                        <center><?php echo $values["qtd"]; ?></center>
                    </td>
                    <td>
                        <center><?php echo $values["valor"]; ?></center>
                    </td>
                </tr>
            <?php

                $total += $values['qtd'] * $values['valor'];
            }
            ?>



        </table>

        <div class="valor">
            <h2><span> Total: R$<?php echo $total; ?></span></h2>
        </div>
    </div>

</body>

</html>