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

    $id = $_SESSION['id_user'];
    $nome = $_SESSION['nome'];
    $senha = $_SESSION['senha'];
    $tipo = $_SESSION['tipo'];

    $admin = "";
    $user = "none";
} else {
    $admin = "none";
    $user = "";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abel&family=Pathway+Extreme:wght@500&display=swap" rel="stylesheet">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>


<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Produto', 'Quantidade','Valor Total'],

            <?php
            $sql = "SELECT p.nome_prod,sum(c.qtd_compra) as qtd,p.valor_prod,SUM(c.valor_compra) as sum_t 
            FROM produto as p, user as u, compra as c
            WHERE c.id_prod = p.id_prod and c.id_user = u.id_user group by c.id_prod order by qtd desc";
            $result = mysqli_query($connect, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $nome_graf = $row['nome_prod'];
                $qtd_graf = $row['qtd'];
                $valor_graf = $row['sum_t'];
            ?>['<?php echo $nome_graf;  ?>', <?php echo $qtd_graf; ?>,'<?php echo "R$".number_format($valor_graf,2,',','.');?>'],
            <?php
            }
            ?>
        ]);

        var options = {
            title: 'Produtos Mais Comprados'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

<head>
    <meta charset="UTF-8">

    <!-- <title>Qual o nome do site?</title> -->
    <style>
        body {
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            background-color: #BFDDF3;
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
        div.user button:hover{
            transition: all 0.3s;
            background-color:#0576dd;
            color: white;
            box-shadow: 1px 1px 10px black;
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

        div.admin {
            display: <?php echo $admin; ?>;
        }

        div.admin table {
            margin: 20px;
        }

        div.user {
            display: <?php echo $user; ?>;
        }

        div.user button {
            margin: 10px;
            font-size: 20px;
            padding: 10px;
            background-color: #fff;
            color: #406d96;
            font-family: sans-serif;
            font-weight: bold;
        }

        button.close {

            background-color: skyblue;
            color: #fff;
            font-weight: bold;
            display: inline-block;
            border-radius: 4px;
            text-align: center;
            font-size: 28px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
            margin-top: 40px;
            width: 100px;
            height: 40px;
        }

        button.close span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
            font-size: 20px;
        }

        button.close span:hover {

            color: white;
        }

        button.close span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            color: white;
            transition: 0.5s;
        }

        button.close:hover span {
            padding-right: 25px;
        }

        button.close:hover {
            transition: 0.5s;
            background-color: blue;
        }

        button.close:hover span:after {
            opacity: 1;
            right: 0;
        }

        a.search {
            padding: 5px;
        }

        button.search box-icon {

            justify-content: center;
            align-content: center;
        }

        button.search:hover {
            transition: all 0.5s;
            background-color: blue;
        }
        button:hover{
            transition: all 0.3s;
            background-color:#0576dd;
        }

        a.close {
            position: absolute;
            top: 10%;
            right: 0%;
            transform: translate(-20%, -202%);
            margin-top: 50px;

        }

        a.close button {
            font-size: 15px;
        }

        div.buttons {
            height: 30px;
            margin: 10px;
        }


        div.admin div.buttons {
            display: inline-block;
            justify-content: flex-start;

        }

        div.admin div.buttons a {
            color: black;
            float: left;
            padding: 5px;
            margin-left: 10px;
            text-decoration: none;
        }

        div.admin div.buttons form {
            color: black;
            float: left;
        }

        div.user button.button_comp {
            position: absolute;
            top: 15%;
            left: 8%;
            transform: translate(-50%, -50%);
        }

        div.nav {
            position: static;
            display: flex;
            justify-content: space-between;
            margin: 0;
            background-color: #406d96;

        }

        div.admin div.pq1 {
            position: absolute;
            top: 18%;
            left: 36%;
            transform: translate(120%, 30%);
            border-radius: 20px;
            color: #406d96;
            font-weight: bold;
            font-family: sans-serif;
        }

        h4.msg {
            position: absolute;
            color: #fff;
            top: 8%;
            left: 8%;
            transform: translate(320%, -200%);
        }

        div.box_form {
            align-items: center;
            padding: 10px;
            width: 90vw;
            margin: 20px;
            margin-top: 100px;
            height: 85vh;

        }

        div.grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 5px;
        }

        div.box_form div.produtos {
            box-shadow: 1px 1px 10px;
            flex-direction: column;
            padding: 10px;
            margin: 20px;
            display: flex;
            justify-content: space-evenly;
            border-radius: 10px 10px;
            width: 300px;
            height: 350px;
            border: #406d96;
            background-color: #406d96;
            color: white;

            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        div.produtos div.img img {

            border-radius: 10px 10px;
            padding: 5px;
            width: 200px;
            height: 200px;
            display: flex;
        }

        div.produtos div.box_prod_title {
            display: flex;
            align-content: center;
            justify-content: space-evenly;
        }


        div.produtos input.radio {
            margin-top: 0px;
            width: 20px;
            height: 20px;
            transition: all 0.5s;
        }

        div.produtos:hover {
            background-color: white;
        }

        div.box_table {
            margin: 200px;
            display: grid;
            transform: translate(-10%, 5%);
            grid-template-columns: 1fr 1fr 1fr;
            gap: 5px;
        }

        div.box_table div.table3 table {
            width: 800px;
        }

        div.box_table table {
            padding: 10px;
            margin: 20px;
            border: double 5px;
            border-radius: 10px 10px;
        }

        div.box_table table th {
            padding: 10px;


        }

        .box_logo {
            font-family: sans-serif;
            font-size: 20px;
            color: white;
            display: flex;

        }

        .container {
            margin-top: 100px;
            margin-left: 500px;
        }

        .graf {
            transform: translate(-3%, -5%);
        }

        #h1 {
            font-size: 12px;
            margin-left: 9px;
            font-family: sans-serif;
            color: #fff;
            transform: translate(60%, 35%);

        }

        h2 {
            font-size: 50px;
            transform: translate(20%, 10%);
        }
    </style>
</head>

<body>

    <div class="nav">
        <div class="box_logo">
            <h2>Tech For US</h2>

            <div id="h1">
                <h1>Página Inicial</h1>

            </div>
        </div>


    </div>


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


    <!-- Visão do Admin -->
    <div class="admin">
        <div class="pq1">
            <h3>Produtos Comprados Por Pessoa</h3>
        </div>


        <div class="buttons">
            <div class="container">
                <a href="Cad_prod.php">
                    <button>Cadastrar Produtos</button>
                </a>
                <!-- Todos Os Produtos -->
                <a href="AllProd.php">
                    <button>Produtos</button>
                </a>
                <!-- Cadastrar Novo Usuário -->
                <a href="Cad_user.php">
                    <button type="button" class="cad">Novo Usuário</button>
                </a>
                <!-- Buscar Produtos Comprados Por Usuário Específico -->
                <form action="ListCompUser.php" method="post">
                <input type="text" name="cpf" placeholder="CPF do Usuário" data-mask="000.000.000-00" maxlength="14" required>
                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js'></script>
            
            
                    <button type="submit" class="search"><box-icon name='search'></box-icon></button>
                </form>

            </div>
        </div>
        <div class="box_table ">
            <div class="table1">
                <center>
                    <h3>Produtos Com Estoque Em Falta <a href="PrintProd1.php"><button>Imprimir</button></a></h3>
                </center>
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

            <div class="table3">
                <center>
                    <h3>Produtos Mais Comprados <a href="PrintProd2.php"><button >Imprimir</button></a></h3>
                </center>
                <center>
                    <table>

                        <tr>
                            <th>Produto</th>
                            <th>Quantidade Vendida</th>
                            <th>Valor Unidade</th>
                            <th>Total Vendido</th>
                        </tr>

                        <?php
                        $sql = "SELECT p.nome_prod,sum(c.qtd_compra) as qtd,p.valor_prod,SUM(c.valor_compra) as sum_t FROM produto as p, user as u, compra as c
                        WHERE c.id_prod = p.id_prod and c.id_user = u.id_user group by c.id_prod order by qtd desc";

                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>

                                <tr>
                                    <th><?php echo $row['nome_prod']; ?></th>
                                    <th><?php echo $row['qtd']; ?></th>
                                    <th>R$ <?php echo number_format($row['valor_prod'],2,',','.'); ?></th>
                                    <th>R$ <?php echo number_format($row['sum_t'],2,',','.'); ?></th>
                                </tr>
                            <?php
                            }
                        } else {


                            ?>
                            <tr>
                                <td>
                                    <center>
                                        <h1>Nenhum Produto Comprado</h1>
                                    </center>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </table>
                </center>
            </div>

            <div class="graf">
                <div id="piechart" style="width: 800px; height: 700px; background-color:none;"></div>
            </div>
        </div>

    </div>
    <!-- Visão do Usuário normal -->
    <div class="user">
        <a href="Show_car.php"><button>Carrinho</button></a>
        <?php
        if (isset($_SESSION['msg'])) {
        ?>
            <h4 class='msg'> <?php echo $_SESSION['msg']; ?></h4><br>
        <?php
            unset($_SESSION['msg']);
        }
        ?>
        <center>
            <div class="box_form">

                <?php
                // Faz a procura do banco por produtos com quantidade maior que zero
                $sql = "SELECT * FROM produto WHERE qtd_prod>0 and tipo=1";
                $result = $connect->query($sql);

                if ($result->num_rows > 0) {
                ?>
                    <div class="grid">
                        <?php
                        while ($row = $result->fetch_assoc()) {

                        ?>
                            <!-- Checkbox para Cada Produto -->
                            <label for="<?php echo $row['id_prod']; ?>">
                                <form action="Cad_car.php" method="post">
                                    <div class="produtos">
                                        <div class="box_prod_title">
                                            <center>
                                                <h3>
                                                    <?php echo $row['nome_prod']; ?>
                                                </h3>
                                            </center>

                                            </input>
                                        </div>
                                        <!-- Nome do produto -->

                                        <div class="img">
                                            <img src="<?php echo $row['img_prod']; ?>">
                                        </div>
                                        <h3>R$<?php echo number_format($row['valor_prod'],2,',','.'); ?>
                                            <button name="id_prod" value="<?php echo $row['id_prod']; ?>" type="submit">Comprar</button>
                                        </h3>
                                    </div>
                                </form>
                            </label>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </center>
    </div>
    <a href="php_action/close.php" class="close"><button class="close"><span>Sair</span></button></a>
</body>

</html>