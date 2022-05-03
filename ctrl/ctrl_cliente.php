<?php
    require_once("../class/Cliente.php");
    
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        try{
            $cliente = new Cliente(1, 1, 1, 1);
            $cliente->excluir($id);
            header("location:../index.php");
        } catch(Exception $e){
            echo "<h1>Erro ao excluir cliente.</h1>
            <br>
            Erro:".$e->getMessage();
        }
    }

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : "";
        $dt_nascimento = isset($_POST["dt_nascimento"]) ? $_POST["dt_nascimento"] : "";
        $cliente = new Cliente($id, $nome, $cpf, $dt_nascimento);
        if($id == 0){
            try{
                $cliente->insere();
                header("location:../index.php");
            }catch(Exception $e){
                echo "<h1>Erro ao cadastrar cliente.</h1>
                <br>
                Erro:".$e->getMessage();
            }
        } else{
            try{
                $cliente->editar($id);
                header("location:../index.php");
            }catch(Exception $e){
                echo "<h1>Erro ao editar cliente.</h1>
                <br>
                Erro:".$e->getMessage();
            }
        }
    }
?>