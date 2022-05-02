<!DOCTYPE html>
<?php
    require_once("../utils.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    if($id != 0){
        $vetor = lista_autor($id);
    }

    $title = "Cadastro de Autor";
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
    <form action="../ctrl/ctrl_autor.php?id=<?php echo $id; ?>" method="post">
        Nome: <input type="text" name="nome" value="<?php if($acao == "editar") echo $vetor[1]; ?>"><br>
        <br>
        Sobrenome: <input type="text" name="sobrenome" value="<?php if($acao == "editar") echo $vetor[2]; ?>"><br>
        <br>
        <button type="submit" name="acao" value="salvar">Salvar</button>
    </form>
</body>
</html>