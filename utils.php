<?php

    require_once("class/Livro.php");
    require_once("class/Autor.php");
    require_once("class/LivroAutor.php");
    require_once("class/Venda.php");

    function exibir_como_select($chave, $dados){
        $str = "<option value=0>Escolha</option>";
        foreach($dados as $linha){
            $str .= "<option value='{$linha[$chave[0]]}'>{$linha[$chave[1]]}</option>";
        }
        return $str;
    }

    function lista_livro($id){
        $livro = new Livro(1, 1, 1, 1, 1);
        $lista = $livro->buscar($id);
        if($id != 0){
            foreach($lista as $vetor)
                return $vetor;
        } else
            return exibir_como_select(array("l_idLivro", "l_titulo"), $lista);
    }

    function lista_autor($id){
        $autor = new Autor(1, 1, 1);
        $lista = $autor->buscar($id);
        if($id != 0){
            foreach($lista as $vetor)
                return $vetor;
        } else
            return exibir_como_select(array("a_idAutor", "a_sobrenome"), $lista);
    }

    function lista_cliente($id){
        $venda = new Venda(1, 1, 1, 1, 1);
        $lista = $venda->buscarCliente();
        return exibir_como_select(array("c_idCliente", "c_nome"), $lista);
    }

    function lista_venda($id){
        $venda = new Venda(1, 1, 1, 1, 1);
        $lista = $venda->buscar($id);
        foreach($lista as $vetor)
            return $vetor;
    }
?>