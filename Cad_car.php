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

?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Pathway+Extreme:wght@500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            background-image: linear-gradient(100deg, #00FFFF, #00008b);
        }

        button {
            font-size: 20px;
            padding: 5px;
            margin: 5px;
            box-shadow: 1px 1px 10px black;
            border: none;
            border-radius: 5px 5px;
            width: auto;
        }

        button.less {
            width: 40px;
        }

        button.more {
            width: 40px;
        }

        div.box_form {
            background-color: skyblue;
            padding: 50px;
            margin: 20px;
            border: none;
            width: 400px;
            border-radius: 10px;
            transform: translate(150%, 30%);
            box-shadow: 1px 1px 10px black;
        }

        img {
            width: 300px;
            height: 300px;
        }

        label {
            color: #406d96;
        }

        input {
            width: 100%;
            font-size: 25px;
            border-radius: 10px;
        }

        .a {
            width: 10%;
        }
    </style>
</head>

<body>
    <?php
    if ($_POST) {
        $id_prod = $_POST['id_prod'];

        $sql = "select * from produto where id_prod=$id_prod and qtd_prod>0";

        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nome = $row['nome_prod'];
                $valor = $row['valor_prod'];
                $qtd = $row['qtd_prod'];
                $img = $row['img_prod'];
    ?>

            <?php
            }
            ?>
            <div class="box_form">
                <form action="php_action/Cad_car.php" method="post">
                    <center> <img src="<?php echo $img; ?>"></center><br>
                    <br>
                    <label for="nome">Nome do Produto</label></br>
                    <input type="text" name="nome_prod" id="nome" value="<?php echo $nome; ?>" disabled><br>
                    <label for="valor">Valor do Produto R$</label>
                    <input type="text" name="valor_prod" id="valor" value="<?php echo $valor; ?>" disabled><br>
                    <label for="qtd">Quantidade</label>
                    <button type="button" id="less" class="less">-</button>
                    <input type="number" name="qtd_prod" id="qtd" class="a" value="1" min="1" max="<?php echo $qtd; ?>"></input>
                    <button type="button" id="more" class="more">+</button><br>

                    <input type="hidden" name="id_prod" value=<?php echo $id_prod; ?>>
                    <input type="hidden" name="nome_prod" value="<?php echo $nome; ?>">
                    <input type="hidden" name="valor_prod" id="valor" value="<?php echo $valor; ?>"><br>

                    <center>
                        <button type="submit">Carrinho</button>
                        <a href="index.php"><button type="button">Voltar</button></a>
                    </center>

                </form>

                <script>
                    const less = document.querySelector("#less");
                    const more = document.querySelector("#more");
                    const counter = document.querySelector("#qtd");

                    let qtd = counter.value;

                    less.addEventListener('click', () => {
                        qtd = qtd != 1 ? --qtd : 1;
                        counter.value = qtd;
                    });

                    more.addEventListener('click', () => {
                        qtd = qtd != <?php echo $qtd; ?> ? ++qtd : <?php echo $qtd; ?>;
                        counter.value = qtd;
                    });
                </script>
            </div>
    <?php
        }
    }
    ?>


</body>

</html>