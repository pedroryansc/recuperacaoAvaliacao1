<?php
    require_once("../class/Autor.php");
    
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        try{
            $autor = new Autor(1, 1, 1);
            $autor->excluir($id);
            header("location:../index.php");
        } catch(Exception $e){
            echo "<h1>Erro ao excluir autor.</h1>
            <br>
            Erro:".$e->getMessage();
        }
    }

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $sobrenome = isset($_POST["sobrenome"]) ? $_POST["sobrenome"] : "";
        $autor = new Autor($id, $nome, $sobrenome);
        if($id == 0){
            try{
                $autor->insere();
                header("location:../index.php");
            }catch(Exception $e){
                echo "<h1>Erro ao cadastrar autor.</h1>
                <br>
                Erro:".$e->getMessage();
            }
        } else{
            try{
                $autor->editar($id);
                header("location:../index.php");
            }catch(Exception $e){
                echo "<h1>Erro ao editar autor.</h1>
                <br>
                Erro:".$e->getMessage();
            }
        }
    }
?>