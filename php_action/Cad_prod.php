<?php
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
</head>

<body>
    <?php
    if ($_POST) {
        require_once "db_connect.php";
        session_start();

        $nome = $_POST['nome'];
        $img = $_POST['img'];
        $qtd = $_POST['qtd'];
        $valor = $_POST['valor'];


        if ($nome == null || $qtd == null || $valor == null || $img == null) {
            $_SESSION['msg'] = "Complete Todos os Campos";
            header("location:../Cad_prod.php");
        } else {


            $sql = "select * from produto where nome_prod='$nome' ";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $nome1 = $row['nome_prod'];
                }

                $_SESSION['msg'] = "O Produto " . $nome1 . " já está Cadastrado";
                header("location:../Cad_prod.php");
            } else {

                $result = "INSERT INTO produto values (null,'$nome','$qtd','$valor','$img',1)";

                if ($connect->query($result)) {
                    $_SESSION['msg'] = "Produto Cadastrado com sucesso";
                    header("Location: ../index.php");
                } else {
                    $_SESSION['msg'] = "Erro ao Cadastrar Usuário";
                    header("Location: ../index.php");
                }
            }
        }
    } else {
        session_destroy();
        header("location:../Login.php");
    }

    ?>
</body>

</html>