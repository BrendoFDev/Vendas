<!DOCTYPE html>
<html lang="en">
<?php
require_once "db_connect.php";
session_start();
$id_user = $_SESSION['id_user'];
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

<head>
    <meta charset="UTF-8">

</head>

<body>
    <?php
    if ($_POST) {
        $id_prod = $_POST['id_prod'];
        $sql = "UPDATE produto set tipo=0 where id_prod=$id_prod and tipo=1";
        if ($connect->query($sql)) {
            $_SESSION['msg'] = "Apagado Com Sucesso";
            header("location:../AllProd.php");
        }
    }

    ?>

</body>

</html>