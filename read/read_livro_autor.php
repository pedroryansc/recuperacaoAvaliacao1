<br>
Livro e Autor: <br>
<br>
<table border="1">
    <tr>
        <th>Livro (ID)</th>
        <th>Livro (Título)</th>
        <th>Autor (ID)</th>
        <th>Autor (Nome)</th>
        <th>Autor (Sobrenome)</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT *
                                FROM Livro JOIN Livro_Autor ON la_l_idLivro = l_idLivro JOIN
                                    Autor ON la_a_idAutor = a_idAutor
                                ORDER BY l_titulo");
        while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
    ?>
    <tr>
        <td><?php echo $linha["l_idLivro"]; ?></td>
        <td><?php echo $linha["l_titulo"]; ?></td>
        <td><?php echo $linha["a_idAutor"]; ?></td>
        <td><?php echo $linha["a_nome"]; ?></td>
        <td><?php echo $linha["a_sobrenome"]; ?></td>
        <td><a href="cad/cad_livro_autor.php?acao=editar&livro=<?php echo $linha['l_idLivro'];?>&autor=<?php echo $linha["a_idAutor"]; ?>">Editar</a></td>
        <td><a href="javascript:excluirRegistro('ctrl/ctrl_livro_autor.php?acao=excluir&livro=<?php echo $linha['l_idLivro'];?>&autor=<?php echo $linha["a_idAutor"]; ?>')">Excluir</a><br></td>
    </tr>
    <?php 
        }
    ?>
</table>