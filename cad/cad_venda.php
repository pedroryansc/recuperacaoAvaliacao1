<!DOCTYPE html>
<?php
    require_once("../utils.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    if($id != ""){
        $vetor = lista_venda($id);
    }

    $title = "Cadastro de Venda";
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
    <form action="../ctrl/ctrl_venda.php?id=<?php echo $id; ?>" method="post">
        Valor: R$<input type="text" name="valor" value="<?php if($acao == "editar") echo $vetor[1]; ?>"><br>
        <br>
        Desconto: R$<input type="text" name="desconto" value="<?php if($acao == "editar") echo $vetor[2]; ?>"><br>
        <br>
        Cliente: <select name="cliente">
                    <?php
                        if($acao == "editar"){
                            $pdo = Conexao::getInstance(); 
                            $consulta = $pdo->query("SELECT * FROM Cliente");
                            while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
                    ?>
                    <option value="<?php echo $linha["c_idCliente"]; ?>" <?php if($vetor[3] == $linha["c_idCliente"]) echo "selected"; ?>>
                        <?php echo $linha["c_nome"]; ?>
                    </option>
                    <?php
                            }
                        } else
                            echo lista_cliente(0);
                    ?>
                </select><br>
        <br>
        Data da venda: <input type="text" name="data_venda" value="<?php if($acao == "editar") echo $vetor[4]; ?>"><br>
        <br>
        <button type="submit" name="acao" value="salvar">Salvar</button>
    </form>
</body>
</html>