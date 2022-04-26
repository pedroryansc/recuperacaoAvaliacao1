<!DOCTYPE html>
<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal - Recuperação da Avaliação 1</title>
</head>
<body>
    <a href="cad/cad_livro.php">Cadastro de livro</a> | <a href="cad/cad_venda.php">Cadastro de venda</a> | 
    <a href="cad/cad_item_venda.php">Cadastro de livro</a><br>
    <br>
    Livro: <br>
    <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Ano de publicação</th>
            <th>ISDN</th>
            <th>Preço</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <?php
            $pdo = Conexao::getInstance();
            $consulta = $pdo->query("SELECT * FROM Livro
                                    ORDER BY l_titulo");
            while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
        ?>
        <tr>
            <td><?php echo $linha["l_idLivro"]; ?></td>
            <td><?php echo $linha["l_titulo"]; ?></td>
            <td><?php echo $linha["l_ano_publicacao"]; ?></td>
            <td><?php echo $linha["l_isdn"]; ?></td>
            <td><?php echo "R$ ".$linha["l_preco"]; ?></td>
            <td><a href="cad/cad_livro.php?acao=editar&id=<?php echo $linha['l_idLivro'];?>">Editar</a></td>
            <td><a href="javascript:excluirRegistro('ctrl/ctrl_livro.php?acao=excluir&id=<?php echo $linha['l_idLivro']; ?>')">Excluir</a><br></td>
        </tr>
        <?php 
            }
        ?>
    </table>
    <br>
    Venda: <br>
    <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Valor total</th>
            <th>Desconto</th>
            <th>Cliente (ID)</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <?php
            $pdo = Conexao::getInstance();
            $consulta = $pdo->query("SELECT * FROM Venda
                                    ORDER BY v_valor_total_venda");
            while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
        ?>
        <tr>
            <td><?php echo $linha["v_idVenda"]; ?></td>
            <td><?php echo "R$ ".$linha["v_valor_total_venda"]; ?></td>
            <td><?php echo $linha["v_desconto"]; ?></td>
            <td><?php echo $linha["v_c_idCliente"]; ?></td>
            <td><a href="cad/cad_venda.php?acao=editar&id=<?php echo $linha['v_idVenda'];?>">Editar</a></td>
            <td><a href="javascript:excluirRegistro('ctrl/ctrl_venda.php?acao=excluir&id=<?php echo $linha['v_idVenda']; ?>')">Excluir</a><br></td>
        </tr>
        <?php 
            }
        ?>
    </table>
</body>
</html>
<script>
    function excluirRegistro(url){
        if(confirm("Este registro será excluído. Tem certeza?"))
            location.href = url;
    }
</script>