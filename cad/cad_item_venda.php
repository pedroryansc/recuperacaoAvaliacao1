<!DOCTYPE html>
<?php
    require_once "../conf/Conexao.php";
    require_once("../utils.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    $oldVenda = isset($_GET["venda"]) ? $_GET["venda"] : 0;
    $oldItem = isset($_GET["item"]) ? $_GET["item"] : 0;

    if($id != 0)
        $vetor = lista_item_venda($oldVenda, $oldItem);

    $title = "Cadastro de Relacionamento entre Item e Venda";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <a href="../index.php">Voltar à página principal</a> |
    <?php echo $title; ?><br>
    <br>
    <form action="../ctrl/ctrl_item_venda.php?id=<?php echo $id; ?>&item=<?php echo $oldItem; ?>&venda=<?php echo $oldVenda; ?>" method="post">
        Livro/Item: <select name="newItem">
                            <?php
                                if($acao == "editar"){
                                    $pdo = Conexao::getInstance(); 
                                    $consulta = $pdo->query("SELECT * FROM Livro");
                                    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
                            ?>
                                <option value="<?php echo $linha["l_idLivro"]; ?>" <?php if($oldItem == $linha["l_idLivro"]) echo "selected"; ?>>
                                    <?php echo $linha["l_titulo"]; ?>
                                </option>
                            <?php
                                    }
                                } else
                                    echo lista_livro(0, 0);
                            ?>
                        </select><br>
        <br>
        Venda: <select name="newVenda">
                            <?php
                                if($acao == "editar"){
                                    $pdo = Conexao::getInstance(); 
                                    $consulta = $pdo->query("SELECT * FROM Venda");
                                    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
                            ?>
                                <option value="<?php echo $linha["v_idVenda"]; ?>" <?php if($oldVenda == $linha["v_idVenda"]) echo "selected"; ?>>
                                    <?php echo $linha["v_idVenda"]; ?>
                                </option>
                            <?php
                                    }
                                } else
                                    echo lista_venda(0);
                            ?>
                        </select><br>
        <br>
        Quantidade: <input type="text" name="quantidade" value="<?php if($acao == "editar") echo $vetor[2]; ?>"><br>
        <br>
        Valor total (Item): <input type="text" name="valor_total_item" value="<?php if($acao == "editar") echo $vetor[3]; ?>"><br>
        <br>
        <button type="submit" name="acao" value="salvar">Salvar</button>
    </form>
</body>
</html>