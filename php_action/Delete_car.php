<?php

session_start();
$id = $_SESSION['id_user'];

$carrinho = [null => ["nome" => null, "valor" => null, "qtd" => null]];
$_SESSION['carrinho'] = $carrinho;

$_SESSION['msg'] = "Pronto! Carrinho Apagado!";
header("location:../index.php");
