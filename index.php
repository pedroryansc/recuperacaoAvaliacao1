<!DOCTYPE html>
<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal - Recuperação da Avaliação 1</title>
</head>
<body>
    <?php
        include "menu.html";
        include "read/read_livro.php";
        include "read/read_autor.php";
        include "read/read_livro_autor.php";
        include "read/read_cliente.php";
        include "read/read_venda.php";
        include "read/read_item_venda.php";
    ?>
</body>
</html>
<script>
    function excluirRegistro(url){
        if(confirm("Este registro será excluído. Tem certeza?"))
            location.href = url;
    }
</script>