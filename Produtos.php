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
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            display: absolute;
            background-color: #406d96;
            color: white;
        }

        div.box_logo {
            margin: 20px;
        }

        div.produto {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 50px;
        }

        div.text {
            width: 300px;
            height: 250px;
            margin: 50px;
            border: 1px solid white;
            border-radius: 10px;
            text-decoration: underline;
        }

        img {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="box_logo">
        <h1>Tech For US <a href="Login.php">Entre No nosso Site e Compre Já</a></h1>
    </div>
    <center>
        <h1>Nossos Produtos</h1>
    </center>
    <div class="produto">

        <?php
        require_once('post_qr_code/phpqrcode/qrlib.php');

        $sql = "SELECT * FROM produto WHERE qtd_prod>0 and tipo=1";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $qrCodeName = "imagem_qrcode_{$row['nome_prod']}.png";

                $code =
                    "Nome do Produto:" . $row['nome_prod'] . "\nValor Do Produto:R$" . number_format($row['valor_prod'], 2, ',', ',') . "\nQuantidade Do Produto:" . $row['qtd_prod'];
                QRcode::png($code, $qrCodeName);

        ?>
                <div class="text">
                    <center>
                        <h3><?php echo $row['nome_prod'] ?></h3>
                    </center>

                    <center><img src="<?php echo "$qrCodeName"; ?>"></center><br>
                </div>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>