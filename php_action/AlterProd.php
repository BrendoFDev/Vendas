<?php
require_once "db_connect.php";

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

if ($_POST) {
    $id = $_POST['id_prod'];
    $nome = $_POST['nome_prod'];
    $valor = $_POST['valor_prod'];
    $qtd = $_POST['qtd_prod'];
    $img = $_POST['img_prod'];

    $sql = "UPDATE produto set nome_prod='$nome', valor_prod=$valor, qtd_prod=$qtd, img_prod='$img' 
        where id_prod=$id";

    if ($connect->query($sql)) {
        $_SESSION['msg'] = "Alteração Feita";
        header("location:../AllProd.php");
    } else {
        echo "Erro Ao alterar";
    }
}
