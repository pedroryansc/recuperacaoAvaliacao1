<?php

    require_once("class/Livro.php");
    require_once("class/Venda.php");

    function exibir_como_select($chave, $dados){
        $str = "<option value=0>Escolha</option>";
        foreach($dados as $linha){
            $str .= "<option value='{$linha[$chave[0]]}'>{$linha[$chave[1]]}</option>";
        }
        return $str;
    }

    function lista_livro($id){
        $livro = new Livro("", "", "", "", "");
        $lista = $livro->buscar($id);
        foreach($lista as $vetor)
            return $vetor;
    }

    function lista_venda($id){

    }
    function lista_cliente($id){
        $venda = new Venda("", "", "", "");
        $lista = $venda->buscarCliente();
        return exibir_como_select(array("c_idCliente", "c_nome"), $lista);
    }
?>