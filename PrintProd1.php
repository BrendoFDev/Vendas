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
            margin: 0px;
            padding: 0px;
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

        div.box_table {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        div.table1 {
            width: 900px;
            padding: 10px;
            margin: 20px;
            border: double 5px;
            border-radius: 10px 10px;
            font-size: 20px;
        }

        div.table1 th {
            margin: 10px;
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
        #h1 {
            font-size: 12px;
            margin-left: 9px;
            font-family: sans-serif;
            color: #fff;
            transform: translate(60%, 35%);

        }
    </style>

<body>
    <div class="nav">
        <div class="box_logo">
            <h1>Tech For US</h1>

            <div id="h1">
            <h2><a href="index.php">Página Inicial</a>>>Produtos Em Falta</h2>

            </div>
        </div>


    </div>
    <div class="box_table ">
        <center>
            <h3>Produtos Com Estoque Em Falta <button onclick="window.print();">Imprimir</button><a href="index.php"><button>Voltar</button></a></h3>
        </center>
        <div class="table1">

            <center>
                <table>
                    <tr>
                        <th>Produto</th>
                        <th>Valor Unidade</th>
                        <th>Quantidade</th>

                    </tr>
                    <?php
                    $sql = "SELECT * FROM produto where qtd_prod<3 and tipo=1 order by nome_prod asc ";
                    $result = $connect->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>

                            <tr>
                                <td>
                                    <center><?php echo $row['nome_prod']; ?></center>
                                </td>
                                <td>
                                    <center>R$ <?php echo number_format($row['valor_prod'],2,',','.'); ?></center>
                                </td>
                                <td>
                                    <center> <?php echo $row['qtd_prod']; ?></center>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td>
                                <center>Nenhum Produto Em Falta</center>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>
                </table>
            </center>
        </div>
    </div>
</body>