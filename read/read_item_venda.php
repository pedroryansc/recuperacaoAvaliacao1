<br>
Item e Venda: <br>
<br>
<table border="1">
    <tr>
        <th>Venda (ID)</th>
        <th>Venda (Valor total com desconto)</th>
        <th>Venda (Desconto)</th>
        <th>Livro (ID)</th>
        <th>Livro (Título)</th>
        <th>Quantidade</th>
        <th>Item (Valor total)</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT *
                                FROM Venda JOIN Item_venda ON iv_v_idVenda = v_idVenda JOIN
                                    Livro ON iv_l_idLivro = l_idLivro
                                ORDER BY v_valor_total_venda");
        while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
    ?>
    <tr>
        <td><?php echo $linha["v_idVenda"]; ?></td>
        <td><?php echo "R$ ".number_format($linha["v_valor_total_venda"], 2, ",", "."); ?></td>
        <td><?php echo number_format($linha["v_desconto"], 2, ",", ".")."%"; ?>
        <td><?php echo $linha["l_idLivro"]; ?></td>
        <td><?php echo $linha["l_titulo"]; ?></td>
        <td><?php echo $linha["iv_quantidade"]; ?></td>
        <td><?php echo "R$ ".number_format($linha["iv_valor_total_item"], 2, ",", "."); ?></td>
        <td><a href="cad/cad_item_venda.php?acao=editar&venda=<?php echo $linha['v_idVenda'];?>&livro=<?php echo $linha["l_idLivro"]; ?>">Editar</a></td>
        <td><a href="javascript:excluirRegistro('ctrl/ctrl_item_venda.php?acao=excluir&venda=<?php echo $linha['v_idVenda']; ?>&livro=<?php echo $linha['l_idLivro']; ?>')">Excluir</a><br></td>
    </tr>
    <?php 
        }
    ?>
</table>