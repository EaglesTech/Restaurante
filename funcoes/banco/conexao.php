<?php
//FUNCAO DE CONEXAO
function conecta(){
    try{
        $conn = new PDO('mysql:host=localhost;dbname=restaurante', 'root', '');
        // $conn -> setAttribute(PDO::ATT_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }catch(PDOException $erro){
        echo $erro->getMessage();
    }
}