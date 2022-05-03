<?php
    require_once("../utils.php");

    require_once("../class/ItemVenda.php");
    
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    
    $oldVenda = isset($_GET["venda"]) ? $_GET["venda"] : 0;
    $oldItem = isset($_GET["item"]) ? $_GET["item"] : 0;

    if($acao == "excluir"){
        try{
            $item_venda = new ItemVenda(1, 1, 1, 1);
            $item_venda->excluir($oldVenda, $oldItem);
            header("location:../index.php");
        } catch(Exception $e){
            echo "<h1>Erro ao excluir o relacionamento entre item e venda.</h1>
            <br>
            Erro:".$e->getMessage();
        }
    }

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $newVenda = isset($_POST["newVenda"]) ? $_POST["newVenda"] : 0;
        $newItem = isset($_POST["newItem"]) ? $_POST["newItem"] : 0;
        $quantidade = isset($_POST["quantidade"]) ? $_POST["quantidade"] : 0;
        $valor_total_item = isset($_POST["valor_total_item"]) ? $_POST["valor_total_item"] : 0;
        $item_venda = new ItemVenda($newVenda, $newItem, $quantidade, $valor_total_item);
        if($id == 0){
            try{
                $item_venda->insere();
                $vetor = lista_venda($newVenda);
                $item_venda->adicionarItem($vetor);
                header("location:../index.php");
            }catch(Exception $e){
                echo "<h1>Erro ao cadastrar relacionamento entre item e venda.</h1>
                <br>
                Erro:".$e->getMessage();
            }
        } else{
            try{
                $item_venda->editar($oldVenda, $oldItem);
                header("location:../index.php");
            }catch(Exception $e){
                echo "<h1>Erro ao editar relacionamento entre item e venda.</h1>
                <br>
                Erro:".$e->getMessage();
            }
        }
    }
?>