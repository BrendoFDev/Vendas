<?php
$local = "localhost";
$user = "root";
$pass = "";
$db = "proj";

$connect = new mysqli($local, $user, $pass, $db);

if ($connect->connect_error) {
    echo "!--Não Conectado ao Sistema--!";
}
