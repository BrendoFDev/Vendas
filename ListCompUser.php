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


    <!-- <title>Qual o nome do site?</title> -->
    <style>
        body {
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            padding: 0%;
            margin: 0%;
        }

        button {
            font-size: 20px;
            padding: 5px;
            margin: 5px;
            box-shadow: 1px 1px 10px black;
            border: none;
            border-radius: 5px 5px;
        }

        div.box_logo {
            margin: 20px;
        }

        div.box_table table {
            margin: 20px;
            border: double;
            border-radius: 10px 10px;
        }

        div.box_table table th {
            padding: 10px;
        }

        h3.user {
            margin: 20px;
        }

        button.voltar {
            margin: 20px;
        }
    </style>
</head>

<body>
    <div class="nav">
        <div class="box_logo">
            <h1>Nome Da Empresa</h1>
        </div>
    </div>
    <a href="index.php"><button type="button" class="voltar">Voltar</button></a>
    <div class="box_table">
        <table>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor</th>

            </tr>

            <?php
            $cpf = $_POST['cpf'];

            if ($cpf == null) {
                $_SESSION['msg'] = "Complete Os Dois Campos Por Favor";
                header("location:index.php");
            } else {


                $sql = "SELECT * FROM user where  cpf_user='$cpf' ";
                $result = $connect->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $id_user = $row['id_user'];
                        $nome_user = $row['nome_user'];
                    }
            ?>
                    <h3 class="user">Usuário:<?php echo $nome_user; ?></h3>
                    <?php
                    $sql = "SELECT u.nome_user,c.qtd_compra,p.nome_prod,c.valor_compra,c.id_user
                FROM compra as c, user as u, produto as p 
                where c.id_prod=p.id_prod and c.id_user=u.id_user and c.id_user=$id_user ";

                    $result = $connect->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            $nome_prod = $row["nome_prod"];
                            $qtd = $row['qtd_compra'];
                            $valor = $row['valor_compra'];

                    ?>
                            <tr>
                                <td>
                                    <center><?php echo $nome_prod; ?></center>
                                </td>
                                <td>
                                    <center><?php echo $qtd;  ?></center>
                                </td>
                                <td>
                                    <center>R$<?php echo $valor; ?></center>
                                </td>

                            </tr>
            <?php
                        }
                    } else {

                        $_SESSION['msg'] = "Esse Usuário Não Fez Nenhuma Compra";
                        header("location:index.php");
                    }
                } else {
                    $_SESSION['msg'] = "Usuário Inexistente";
                    header("location:index.php");
                }
            }
            ?>


        </table>
    </div>
</body>

</html>