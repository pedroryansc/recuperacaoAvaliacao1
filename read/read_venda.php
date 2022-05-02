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
        <td><?php echo "R$ ".number_format($linha["v_valor_total_venda"], 2, ",", "."); ?></td>
        <td><?php echo number_format($linha["v_desconto"], 2, ",", ".")."%"; ?></td>
        <td><?php echo $linha["v_c_idCliente"]; ?></td>
        <td><a href="cad/cad_venda.php?acao=editar&id=<?php echo $linha['v_idVenda'];?>">Editar</a></td>
        <td><a href="javascript:excluirRegistro('ctrl/ctrl_venda.php?acao=excluir&id=<?php echo $linha['v_idVenda']; ?>')">Excluir</a><br></td>
    </tr>
    <?php 
        }
    ?>
</table>