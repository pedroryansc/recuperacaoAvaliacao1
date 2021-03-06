<?php

    require_once("class/Livro.php");
    require_once("class/Autor.php");
    require_once("class/LivroAutor.php");
    require_once("class/Cliente.php");
    require_once("class/Venda.php");
    require_once("class/ItemVenda.php");

    function exibir_como_select($chave, $dados){
        $str = "<option value=0>Escolha</option>";
        foreach($dados as $linha){
            $str .= "<option value='{$linha[$chave[0]]}'>{$linha[$chave[1]]}</option>";
        }
        return $str;
    }

    function lista_livro($id, $vetorLivro){
        $livro = new Livro(1, 1, 1, 1, 1);
        $lista = $livro->buscar($id);
        if($id != 0){
            foreach($lista as $vetor)
                return $vetor;
        } else if($vetorLivro == 1){
            return $lista;
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
        $cliente = new Cliente(1, 1, 1, 1);
        $lista = $cliente->buscar($id);
        if($id != 0){
            foreach($lista as $vetor)
                return $vetor;
        } else
            return exibir_como_select(array("c_idCliente", "c_nome"), $lista);
    }

    function lista_venda($id){
        $venda = new Venda(1, 1, 1, 1, 1);
        $lista = $venda->buscar($id);
        if($id != 0){
            foreach($lista as $vetor)
                return $vetor;
        } else
            return exibir_como_select(array("v_idVenda", "v_idVenda"), $lista);
    }

    function lista_item_venda($oldVenda, $oldItem){
        $item_venda = new ItemVenda(1, 1, 1, 1);
        $lista = $item_venda->buscar($oldVenda, $oldItem);
        if($oldItem != 0){
            foreach($lista as $vetor)
                return $vetor;
        }
        return $lista;
    }
?>