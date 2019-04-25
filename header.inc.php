<?php
session_start();
require 'funcoes/banco/conexao.php';
// print_r(md5(strrev('admin')));echo"<br><br>";

// if (isset($_SESSION['administrador']) ) {
    // echo"<pre>";
    // print_r($_SESSION['administrador']);
    // echo"</pre>";
// }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurante</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/960.css">
    <link rel="stylesheet" href="css/reset.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
</head>
<body>