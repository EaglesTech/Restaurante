<?php
//FUNCAO DE CADASTRO
function cadastro($nome, $cpf, $telefone, $bairro, $cidade, $endereco){
    $pdo=conecta();
    try{
        $cadastro = $pdo->prepare("INSERT INTO tbclientes (CLI_NOME, CLI_CPF, CLI_TEL, CLI_BAIRRO, CLI_CIDADE, CLI_ENDERECO) VALUES(?,?,?,?,?,?)");
        $cadastro->bindValue(1, $nome, PDO::PARAM_STR);
        $cadastro->bindValue(2, $cpf, PDO::PARAM_STR);
        $cadastro->bindValue(3, $telefone, PDO::PARAM_STR);
        $cadastro->bindValue(4, $bairro, PDO::PARAM_STR);
        $cadastro->bindValue(5, $cidade, PDO::PARAM_STR);
        $cadastro->bindValue(6, $endereco, PDO::PARAM_STR);

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
function listarCliente(){
    $pdo=conecta();
    try{
        $listar = $pdo->query("SELECT * FROM tbclientes");
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
        $pegaid = $pdo->prepare("SELECT * FROM tbclientes WHERE CLI_ID = ?");
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
function atualizar($nome, $cpf, $telefone, $bairro, $cidade, $endereco, $id){
    $pdo=conecta();
    try{
        $atualiza = $pdo->prepare("UPDATE tbclientes SET CLI_NOME = ?, 
                                CLI_CPF = ?, CLI_TEL = ?, CLI_BAIRRO = ?, CLI_CIDADE = ?, CLI_ENDERECO = ? WHERE CLI_ID = ?");
        $atualiza->bindValue(1, $nome, PDO::PARAM_STR);
        $atualiza->bindValue(2, $cpf, PDO::PARAM_STR);
        $atualiza->bindValue(3, $telefone, PDO::PARAM_STR);
        $atualiza->bindValue(4, $bairro, PDO::PARAM_STR);
        $atualiza->bindValue(5, $cidade, PDO::PARAM_STR);
        $atualiza->bindValue(6, $endereco, PDO::PARAM_STR);
        $atualiza->bindValue(7, $id, PDO::PARAM_INT);
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
        $delete = $pdo->prepare("UPDATE tbclientes SET CLI_ATIVO='1' WHERE CLI_ID = ? ");
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