<?php
    require_once("../class/Livro.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        try{
            $livro = new Livro(1, 1, 1, 1, 1);
            $livro->excluir($id);
            header("location:../index.php");
        } catch(Exception $e){
            echo "<h1>Erro ao excluir livro.</h1>
            <br>
            Erro:".$e->getMessage();
        }
    }

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
        $ano_publicacao = isset($_POST["ano_publicacao"]) ? $_POST["ano_publicacao"] : "";
        $isdn = isset($_POST["isdn"]) ? $_POST["isdn"] : "";
        $preco = isset($_POST["preco"]) ? $_POST["preco"] : 0;
        
        $livro = new Livro($id, $titulo, $ano_publicacao, $isdn, $preco);
        if($id == 0){
            try{
                $livro->insere();
                header("location:../index.php");
            } catch(Exception $e){
                echo "<h1>Erro ao cadastrar livro.</h1>
                <br>
                Erro:".$e->getMessage();
            }
        } else{
            try{
                $livro->editar($id);
                header("location:../index.php");
            } catch(Exception $e){
                echo "<h1>Erro ao editar livro.</h1>
                <br>
                Erro:".$e->getMessage();
            }
        }
    }
?>