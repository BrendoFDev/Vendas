<?php
require_once "db_connect.php";

session_start();

if (isset($nome) === TRUE and isset($senha) === TRUE) {
    session_destroy();
    header("location:../Login.php");
} else {
    session_destroy();
    header("location:../Login.php");
}
