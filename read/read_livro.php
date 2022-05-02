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
        <td><?php echo "R$ ".number_format($linha["l_preco"], 2, ",", "."); ?></td>
        <td><a href="cad/cad_livro.php?acao=editar&id=<?php echo $linha['l_idLivro'];?>">Editar</a></td>
        <td><a href="javascript:excluirRegistro('ctrl/ctrl_livro.php?acao=excluir&id=<?php echo $linha['l_idLivro']; ?>')">Excluir</a><br></td>
    </tr>
    <?php 
        }
    ?>
</table>