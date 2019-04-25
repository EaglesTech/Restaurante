<?php
//FUNCAO DE CADASTRO
function cadastro($nome, $login, $email, $senha, $nivel){
    $pdo=conecta();
    try{
        $cadastro = $pdo->prepare("INSERT INTO tbusuarios (nome, login, email, senha, nivel) VALUES(?,?,?,?,?)");
        $cadastro->bindValue(1, $nome, PDO::PARAM_STR);
        $cadastro->bindValue(2, $login, PDO::PARAM_STR);
        $cadastro->bindValue(3, $email, PDO::PARAM_STR);
        $cadastro->bindValue(4, md5(strrev($senha)), PDO::PARAM_STR);
        $cadastro->bindValue(5, $nivel, PDO::PARAM_STR);
        $cadastro->execute();
        if ($cadastro->rowCount() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
//FUNCAO DE LISTAR
function listarAdmin(){
    $pdo=conecta();
    try{
        $listar = $pdo->query("SELECT * FROM tbusuarios");
        if ($listar->rowCount() > 0) {
            return $listar->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
//FUNCAO de PEGA ID
function pegaId($id){
    $pdo=conecta();
    try{
        $pegaid = $pdo->prepare("SELECT * FROM tbusuarios WHERE id = ?");
        $pegaid->bindValue(1, $id, PDO::PARAM_INT);
        $pegaid->execute();
        
        if ($pegaid->rowCount() > 0) {
            return $pegaid->fetch(PDO::FETCH_OBJ);
            return TRUE;
        } else {
            return FALSE;
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
//FUNÇÃO DE ATUALIZAR
function atualizar($nome, $login, $email, $id){
    $pdo=conecta();
    try{
        $atualiza = $pdo->prepare("UPDATE tbusuarios SET nome = ?, 
                                login = ?, email = ? WHERE id = ?");
        $atualiza->bindValue(1, $nome, PDO::PARAM_STR);
        $atualiza->bindValue(2, $login, PDO::PARAM_STR);
        $atualiza->bindValue(3, $email, PDO::PARAM_STR);
        $atualiza->bindValue(4, $id, PDO::PARAM_INT);
        $atualiza->execute();
        
        if ($atualiza->rowCount() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
//FUNCAO DE DELETAR
function delete($id){
    $pdo=conecta();
    
    try{
        $delete = $pdo->prepare("UPDATE tbusuarios SET deleted='1' WHERE id = ? ");
        $delete->bindValue(1, $id, PDO::PARAM_INT);
        $delete->execute();
        
        if ($delete->rowCount() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}