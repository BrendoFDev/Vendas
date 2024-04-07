<?php

require_once "db_connect.php";
session_start();
if ($_SESSION['code'] == null) {
    header("location:../RecSenha.php");
} elseif ((isset($_SESSION['nome']) == true) && (isset($_SESSION['senha']) == true) && (isset($_SESSION['tipo']) == true)) {

    header("location:../RecSenha.php");
}

if($_POST){
    $cpf = $_SESSION['cpf'];
  $code1 = $_POST['code'];
  $code2 = $_SESSION['code'];
  $senha =  MD5($_POST['senha']);

  if($code1==$code2){
     $sql = "update user set senha_user='$senha' WHERE cpf_user ='$cpf'";

     if($connect->query($sql)){
        $_SESSION['msg'] = "Senha Alterada Com Sucesso";
        unset($_SESSION['code']);
        unset($_SESSION['cpf']);
        header("location:../Login.php");
     }
  }else if($code1 != $code2){
    $_SESSION['msg'] = "Código Inválido -- Reenvie o Formulário";
    header("location:../AlterSenha.php");
  }
}