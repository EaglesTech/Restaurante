<?php
//FUNCAO DE CADASTRO
function cadastro($nome, $quantidade, $custo, $valor){
    $pdo=conecta();
    try{
        $cadastro = $pdo->prepare("INSERT INTO tbprodutos (PRO_NOME, PRO_QTD, PRO_VAL_CUSTO, PRO_VAL_VENDA) VALUES(?,?,?,?)");
        $cadastro->bindValue(1, $nome, PDO::PARAM_STR);
        $cadastro->bindValue(2, $quantidade, PDO::PARAM_STR);
       // $cadastro->bindValue(3, $data, PDO::PARAM_STR);
        $cadastro->bindValue(3, $custo, PDO::PARAM_STR);
        $cadastro->bindValue(4, $valor, PDO::PARAM_STR);
        
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
function listarProduto(){
    $pdo=conecta();
    try{
        $listar = $pdo->query("SELECT * FROM tbprodutos");
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
        $pegaid = $pdo->prepare("SELECT * FROM tbprodutos WHERE PRO_ID = ?");
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
function atualizar($nome, $quantidade, $custo, $venda, $id){
    $pdo=conecta();
    try{
        $atualiza = $pdo->prepare("UPDATE tbprodutos SET PRO_NOME = ?, 
                                PRO_QTD = ?, PRO_VAL_CUSTO = ?, PRO_VAL_VENDA = ? WHERE PRO_ID = ?");
        $atualiza->bindValue(1, $nome, PDO::PARAM_STR);
        $atualiza->bindValue(2, $quantidade, PDO::PARAM_STR);
        $atualiza->bindValue(3, $custo, PDO::PARAM_STR);
        $atualiza->bindValue(4, $venda, PDO::PARAM_STR);
        $atualiza->bindValue(5, $id, PDO::PARAM_INT);
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
        $delete = $pdo->prepare("UPDATE tbprodutos SET PRO_ATIVO='1' WHERE PRO_ID = ? ");
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