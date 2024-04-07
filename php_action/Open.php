<?php

session_start();

$nome = $_POST["nome"];
$senha = MD5($_POST["senha"]);



if ($nome == null || $senha == null) {
    $_SESSION['msg'] = "Complete Todos os Campos Corretamente";
    header("location:../Login.php");
} else {


    $con = new mysqli("localhost", "root", "", "proj");


    $result = $con->query("SELECT * FROM user WHERE nome_user = '$nome' and senha_user = '$senha' and tipo_user=1");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id_user'];
            $nome = $row['nome_user'];
            $senha = $ro['senha_user'];
            $tipo = $row['tipo_user'];
        }
        $_SESSION['id_user'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['senha'] = $senha;
        $_SESSION['tipo'] = $tipo;


        header('location:../index.php');
    } else {
        $result = $con->query("SELECT * FROM user WHERE nome_user = '$nome' and senha_user = '$senha' and tipo_user=0");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id_user'];
                $nome = $row['nome_user'];
                $senha = $row['senha_user'];
                $tipo = $row['tipo_user'];
                $carrinho = [null => ["nome" => null, "valor" => null, "qtd" => null]];
            }
            $_SESSION['id_user'] = $id;
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            $_SESSION['tipo'] = $tipo;
            $_SESSION['carrinho'] = $carrinho;
            header('location:../index.php');
        } else {
            unset($_SESSION['id']);
            unset($_SESSION['nome']);
            unset($_SESSION['senha']);
            unset($_SESSION['tipo']);
            header('location:../login.php');
        }
    }
}
