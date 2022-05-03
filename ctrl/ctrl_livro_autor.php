<?php
    require_once("../class/LivroAutor.php");
    
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    
    $oldLivro = isset($_GET["livro"]) ? $_GET["livro"] : 0;
    $oldAutor = isset($_GET["autor"]) ? $_GET["autor"] : 0;

    if($acao == "excluir"){
        try{
            $livro_autor = new LivroAutor(1, 1, 1, 1);
            $livro_autor->excluir($oldLivro, $oldAutor);
            header("location:../index.php");
        } catch(Exception $e){
            echo "<h1>Erro ao excluir o relacionamento entre livro e autor.</h1>
            <br>
            Erro:".$e->getMessage();
        }
    }

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $newLivro = isset($_POST["newLivro"]) ? $_POST["newLivro"] : 0;
        $newAutor = isset($_POST["newAutor"]) ? $_POST["newAutor"] : 0;
        $livro_autor = new LivroAutor($newLivro, $newAutor);
        if($id == 0){
            try{
                $livro_autor->insere();
                header("location:../index.php");
            }catch(Exception $e){
                echo "<h1>Erro ao cadastrar relacionamento entre livro e autor.</h1>
                <br>
                Erro:".$e->getMessage();
            }
        } else{
            try{
                $livro_autor->editar($oldLivro, $oldAutor);
                header("location:../index.php");
            }catch(Exception $e){
                echo "<h1>Erro ao editar relacionamento entre livro e autor.</h1>
                <br>
                Erro:".$e->getMessage();
            }
        }
    }
?>