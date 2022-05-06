<!DOCTYPE html>
<?php
    require_once("../utils.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    if($id != 0){
        $vetor = lista_livro($id, 0);
    }

    $title = "Cadastro de Livro";
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
    <form action="../ctrl/ctrl_livro.php?id=<?php echo $id; ?>" method="post">
        Título: <input type="text" name="titulo" value="<?php if($acao == "editar") echo $vetor[1]; ?>"><br>
        <br>
        Ano de publicação: <input type="text" name="ano_publicacao" value="<?php if($acao == "editar") echo $vetor[2]; ?>"><br>
        <br>
        ISDN: <input type="text" name="isdn" value="<?php if($acao == "editar") echo $vetor[3]; ?>"><br>
        <br>
        Preço: R$<input type="text" name="preco" value="<?php if($acao == "editar") echo $vetor[4]; ?>"><br>
        <br>
        <button type="submit" name="acao" value="salvar">Salvar</button>
    </form>
</body>
</html>