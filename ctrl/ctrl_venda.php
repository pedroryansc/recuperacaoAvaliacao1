<?php
    require_once("../class/Venda.php");

    //$acao = isset($_GET["acao"]) ? $_GET["acao"] : "";

    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    /*if($acao == "excluir"){
        $livro = new Livro("", "", "", "", "");
        $livro->excluir($id);
        header("location:../index.php");
        
        try{
            $contaCorrente = new ContaCorrente(1, 1, 1, 1);
            $contaCorrente->excluir($id);
            header("location:../../index.php");
        } catch(Exception $e){
            echo "<h1>Erro ao excluir conta.</h1>
            <br>
            Erro:".$e->getMessage();
        }
    }*/

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $valor_total = isset($_POST["valor_total"]) ? $_POST["valor_total"] : 0;
        $desconto = isset($_POST["desconto"]) ? $_POST["desconto"] : 0;
        $cliente = isset($_POST["cliente"]) ? $_POST["cliente"] : 0;

        $venda = new Venda(0, $valor_total, $desconto, $cliente);
        if($id == 0){
            $venda->insere();
            header("location:../index.php");
        } else{
            $venda->editar($id);
            header("location:../index.php");
        }
    }
?>