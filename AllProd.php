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

                background-image: radial-gradient(#00FFFF, #00008b);
                margin: 0px;
                padding: 0px;
            }

            button {
                font-size: 20px;
                padding: 5px;
                margin: 5px;
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


            .table1 {
                margin-top: 60px;
                transform: translate(20%, 5%);
                margin-left: 400px;
                margin-right: 400px;
                border: solid none;
                border-radius: 20px;
                width: 800px;
                background-color: #fff;
                color: #406d96;
                font-family: sans-serif;
                border-bottom: 1px solid #ddd;
                padding: 15px;
            }

            th,
            td {
                border-bottom: 1px solid #ddd;

            }

            label {
                font-size: 20px;
                font-weight: bolder;
            }

            h3 {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                text-align: center;
                background-color: #406d96;
                color: #fff;
                font-size: 30px;
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
                transform: translate(50%, 50%);


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
        <script>
            function del() {
                alert("O Produto será deletado");
            }
        </script>
    </head>

<body>

    <div class="nav">
        <div class="box_logo">
            <h2>Tech For US</h2>

            <div id="h1">
                <a href="index.php">Página Inicial</a> >Produtos

            </div>
        </div>


    </div>




</body>

</html>

<div class="table1">
    <center>
        <h3>Todos os Produtos <a href="index.php"><button type="button" class="back">Voltar</button></a></h3>
    </center>
    <?php
    if (isset($_SESSION['msg'])) {
    ?>
        <tr>
            <td>
                <center>
                    <h4 class='msg'> <?php echo $_SESSION['msg']; ?></h4>
                </center>
            </td>
        </tr>

    <?php
        unset($_SESSION['msg']);
    }

    ?>
    <center>
        <table>
            <tr>
                <th>Id Do Produto</th>
                <th>Produto</th>
                <th>Valor Unidade</th>
                <th>Quantidade</th>
                <th>Ações</th>

            </tr>
            <?php
            $sql = "SELECT * FROM produto where tipo=1 order by id_prod asc ";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>

                    <tr>
                        <td>
                            <center><?php echo $row['id_prod']; ?></center>
                        </td>
                        <td>
                            <center><?php echo $row['nome_prod']; ?></center>
                        </td>
                        <td>
                            <center>R$ <?php echo $row['valor_prod']; ?></center>
                        </td>
                        <td>
                            <center> <?php echo $row['qtd_prod']; ?></center>
                        </td>


                        <td>
                            <div class="alter">
                                <form action="AlterProd.php" method="post">

                                    <a href="AlterProd.php"><button name="id_prod" class="edit" value=<?php echo $row['id_prod']; ?>>Editar</button></a>

                                </form>
                                <form action="php_action/Delete_prod.php" method="post">
                                    <button onclick="del()" name="id_prod" class="delet" type="submit" value=<?php echo $row['id_prod']; ?>>Deletar</button>
                                </form>
                            </div>
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