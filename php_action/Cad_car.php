<?php
require_once "db_connect.php";

session_start();
$id = $_SESSION['id_user'];
$nome = $_SESSION['nome'];
$senha = $_SESSION['senha'];
$tipo = $_SESSION['tipo'];
$carrinho = $_SESSION['carrinho'];

if ((isset($_SESSION['nome']) != true) && (isset($_SESSION['senha']) != true) && (isset($_SESSION['tipo']) != true)) {

    header("location:Login.php");
} elseif ($tipo == 0) {
} elseif ($tipo == 1) {
    header("location:index.php");
}

if ($_POST) {
    $id_prod = $_POST['id_prod'];
    $nome_prod = $_POST['nome_prod'];
    $qtd_prod = $_POST['qtd_prod'];
    $valor_prod = $_POST['valor_prod'];

    if ($id_prod == null) {
        header("location:../index.php");
    } else {

        $carrinho += [$id_prod => ["nome" => $nome_prod, "valor" => $valor_prod, "qtd" => $qtd_prod]];


        $_SESSION["carrinho"] = $carrinho;
        header("location:../index.php");
        $_SESSION['msg'] = "Produto Adicionado Ao Carrinho";
    }
} else {
    header("location:index.php");
}
