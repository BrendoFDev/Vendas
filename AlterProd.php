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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Pathway+Extreme:wght@500&display=swap" rel="stylesheet">

    <head>
        <meta charset="UTF-8">

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
                padding: 5px;
                margin: 5px;
                box-shadow: 1px 1px 10px black;
                border: none;
                border-radius: 5px 5px;
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
                transform: translate(140%, 5%);
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

            div.box_link {
                color: #fff;
                transform: translate(40%, 30%)
            }

            a {
                color: #fff;
            }


            td {
                color: red;
            }

            th {
                color: #406d96;
                font-size: 20px;
            }

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
                color: #fff;
                font-size: 50px;
                transform: translate(42%, 10%);
            }
        </style>
    </head>

<body>

    <div class="box_logo">
        <h1 id="b">Tech For US</h1>
        <div class="box_link">

            <a href="index.php">Página Inicial</a>> <a href="Allprod.php">Produtos</a>>Alterar Produtos
        </div>
    </div>
    <div class="box_form">
        <form action="php_action/AlterProd.php" method="post">
            <table>
                <?php
                if ($_POST) {
                    $id = $_POST['id_prod'];

                    $sql = "SELECT * from produto where id_prod=$id and tipo=1";
                    $result = $connect->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                ?>
                            <input type="hidden" name="id_prod" value="<?php echo $row['id_prod']; ?>">
                            <tr>
                                <th>Nome</th>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        <input type="text" name="nome_prod" value="<?php echo $row['nome_prod']; ?>">
                                    </center>
                                <td>
                            </tr>
                            <tr>
                                <th>Valor Unitário</th>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        <input type="text" name="valor_prod" value="<?php echo $row['valor_prod']; ?>">
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th> Quantidade Disponível</th>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        <input type="text" name="qtd_prod" value="<?php echo $row['qtd_prod']; ?>">
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th> Imagem do Produto</th>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        <input type="text" name="img_prod" value="<?php echo $row['img_prod']; ?>">
                                    </center>
                                </td>
                            </tr>
                <?php
                        }
                    }
                }
                ?>
                <center>
                    <tr>
                        <td>
                            <button type="submit" class="back">Alterar</button>
                            <a href='AllProd.php'>
                                <button type="button" class="back">Voltar</button>
                            </a>
                        </td>
                    </tr>
                </center>
            </table>
        </form>
        </center>
    </div>
</body>

</html>