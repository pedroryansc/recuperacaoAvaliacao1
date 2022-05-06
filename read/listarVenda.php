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
    <a href="../index.php">Voltar à página principal</a> |
    <?php echo $title; ?><br>
    <br>
    <?php
        $venda = new Venda(1, 1, 1, 1, 1);
        echo $venda->listarVenda($vetorVenda, $vetorCliente, $vetorLivro, $vetorItemVenda);
    ?>
</body>
</html>