<br>
Cliente: <br>
<br>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Data de Nascimento</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM Cliente
                                ORDER BY c_nome");
        while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
    ?>
    <tr>
        <td><?php echo $linha["c_idCliente"]; ?></td>
        <td><?php echo $linha["c_nome"]; ?></td>
        <td><?php echo $linha["c_cpf"]; ?></td>
        <td><?php echo $linha["c_dt_nascimento"]; ?></td>
        <td><a href="cad/cad_cliente.php?acao=editar&id=<?php echo $linha['c_idCliente'];?>">Editar</a></td>
        <td><a href="javascript:excluirRegistro('ctrl/ctrl_cliente.php?acao=excluir&id=<?php echo $linha['c_idCliente']; ?>')">Excluir</a><br></td>
    </tr>
    <?php 
        }
    ?>
</table>