<?php
require_once "db_connect.php";
session_start();
$id_user = $_SESSION['id_user'];
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
        }
    </style>
</head>

<body>
    <?php


    $carrinho = $_SESSION['carrinho'];
    foreach ($carrinho as $key => $value) {
        $id_prod = $key;
        $nome = $value['nome'];
        $valor = $value['valor'];
        $qtd = $value['qtd'];


        $sql = "SELECT * FROM produto where nome_prod='$nome' and valor_prod = '$valor' and id_prod = '$id_prod'";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $estoque = $row['qtd_prod'];
                $id_prod = $row['id_prod'];
            }
            $estoque = $estoque - $qtd;
            $valor_total = $qtd * $valor;
            $sql = "UPDATE produto set qtd_prod=$estoque where id_prod = $id_prod";

            if ($connect->query($sql)) {

                $sql = "INSERT INTO compra values(null,$id_user,$id_prod,$qtd,$valor_total)";

                if ($connect->query($sql)) {
                    $_SESSION['msg'] = " Pronto! Agora É Só Esperar Chegar";
                    $_SESSION['carrinho'] = [null => ["nome" => null, "valor" => null, "qtd" => null]];
                    header("location:../index.php");
                }
            }
        }
    }

    ?>

</body>

</html>