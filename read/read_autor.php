<br>
Autor: <br>
<br>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM Autor
                                ORDER BY a_nome");
        while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
    ?>
    <tr>
        <td><?php echo $linha["a_idAutor"]; ?></td>
        <td><?php echo $linha["a_nome"]; ?></td>
        <td><?php echo $linha["a_sobrenome"]; ?></td>
        <td><a href="cad/cad_autor.php?acao=editar&id=<?php echo $linha['a_idAutor'];?>">Editar</a></td>
        <td><a href="javascript:excluirRegistro('ctrl/ctrl_autor.php?acao=excluir&id=<?php echo $linha['a_idAutor']; ?>')">Excluir</a><br></td>
    </tr>
    <?php 
        }
    ?>
</table>