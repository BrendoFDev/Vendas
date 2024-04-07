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
    session_start();
    require_once "db_connect.php";


    if ($_POST) {

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $cpf_normal = $_POST['cpf'];
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $estado = $_POST['estado'];



        // Verifica a resposta da função e exibe na tela

        if (
            $nome == null ||
            $senha == null ||
            $email == null ||
            $cpf_normal == null ||
            $cep == null ||
            $rua == null ||
            $numero == null ||
            $cidade == null ||
            $bairro == null ||
            $estado == null
        ) {
            $_SESSION['msg'] = "Complete Todos Os Campos";
            header("location:../Cad_user.php");
        } else {

            $sql = "select * from user where cpf_user ='$cpf_normal' ";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cpf = $row['cpf'];
                }
                $_SESSION['msg'] = "O cpf " . $cpf . " já está Cadastrado";
                header("location:../Cad_user.php");
            } else {

                $result_avaliacos = "INSERT INTO user values (null,'$cpf_normal','$email','$nome',md5('$senha'),0,$cep,$numero,'$rua','$bairro','$cidade','$estado') ";


                if ($connect->query($result_avaliacos)) {
                    $_SESSION['msg'] = "Usuário Cadastrado com sucesso";
                    header("Location: ../Cad_user.php");
                } else {
                    $_SESSION['msg'] = "Erro ao Cadastrar Usuário";
                    header("Location: ../Cad_user.php");
                }
            }
        }
    } else {
        session_destroy();
        header("location:../index.php");
    }


    ?>
</body>

</html>