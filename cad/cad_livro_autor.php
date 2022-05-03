<!DOCTYPE html>
<?php
    require_once "../conf/Conexao.php";
    require_once("../utils.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    $oldLivro = isset($_GET["livro"]) ? $_GET["livro"] : 0;
    $oldAutor = isset($_GET["autor"]) ? $_GET["autor"] : 0;

    $title = "Cadastro de Relacionamento entre Livro e Autor";
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
    <form action="../ctrl/ctrl_livro_autor.php?id=<?php echo $id; ?>&livro=<?php echo $oldLivro; ?>&autor=<?php echo $oldAutor; ?>" method="post">
        Livro: <select name="newLivro">
                            <?php
                                if($acao == "editar"){
                                    $pdo = Conexao::getInstance(); 
                                    $consulta = $pdo->query("SELECT * FROM Livro");
                                    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
                            ?>
                                <option value="<?php echo $linha["l_idLivro"]; ?>" <?php if($oldLivro == $linha["l_idLivro"]) echo "selected"; ?>>
                                    <?php echo $linha["l_titulo"]; ?>
                                </option>
                            <?php
                                    }
                                } else
                                    echo lista_livro(0);
                            ?>
                        </select><br>
        <br>
        Autor: <select name="newAutor">
                            <?php
                                if($acao == "editar"){
                                    $pdo = Conexao::getInstance(); 
                                    $consulta = $pdo->query("SELECT * FROM Autor");
                                    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
                            ?>
                                <option value="<?php echo $linha["a_idAutor"]; ?>" <?php if($oldAutor == $linha["a_idAutor"]) echo "selected"; ?>>
                                    <?php echo $linha["a_sobrenome"]; ?>
                                </option>
                            <?php
                                    }
                                } else
                                    echo lista_autor(0);
                            ?>
                        </select><br>
        <br>
        <button type="submit" name="acao" value="salvar">Salvar</button>
    </form>
</body>
</html>