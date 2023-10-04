<?php

$con = mysqli_connect("localhost", "root", "", "banco_cadastro");

if (!$con) {
    die('Connection Failed' . mysqli_connect_error());
}

?>