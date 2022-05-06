<!DOCTYPE html>
<?php
    require_once("../utils.php");
    
    $venda = isset($_GET["venda"]) ? $_GET["venda"] : 0;
    $cliente = isset($_GET["cliente"]) ? $_GET["cliente"] : 0;

    $vetorVenda = lista_venda($venda);
    $vetorCliente = lista_cliente($cliente);
    $vetorLivro = lista_livro(0, 1);
    $vetorItemVenda = lista_item_venda($venda, 0);

    $title = "Listagem de Venda";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <?php

    ?>
    <a href="../index.php">Voltar à página principal</a> |
    <?php echo $title; ?><br>
    <br>
    Venda: <?php echo $vetorVenda[0]; ?> Cliente: <?php echo $vetorCliente[1]; ?> <br>
    ================================ <br>
    <table>
        <tr>
            <td>Id</td>
            <td>| Título</td>
            <td>| Qtd</td>
            <td>| Valor Unitário</td>
            <td>| Valor Total</td>
        </tr>
        <?php
            $total = 0;
            for($x = 0; $x < count($vetorItemVenda); $x ++){
                for($y = 0; $y < count($vetorLivro); $y ++){
                    if($vetorLivro[$y][0] == $vetorItemVenda[$x][1])
                        break;
                }
        ?>
        <tr>
            <td><?php echo $vetorLivro[$y][0]; ?></td>
            <td>| <?php echo $vetorLivro[$y][1]; ?></td>
            <td>| <?php echo $vetorItemVenda[$x][2]; ?></td>
            <td>| <?php echo $vetorLivro[$y][4]; ?></td>
            <td>| <?php echo $vetorItemVenda[$x][3]; ?></td>
        </tr>
        <?php
                $total = $total + $vetorItemVenda[$x][3];
            }
        ?>
    </table>
    ------------------------------------------------------- <br>
    <table>
        <tr>
            <td>Total:</td>
            <td><?php echo number_format($total, 2); ?></td>
        </tr>
        <tr>
            <td>Desconto:</td>
            <td><?php echo $vetorVenda[2]; ?></td>
        </tr>
        <tr>
            <td>Total Venda:</td>
            <td><?php echo $vetorVenda[1]; ?></td>
        </tr>
    </table>
</body>
</html>