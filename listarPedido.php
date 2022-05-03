<?php
    echo "Venda: $v_IdVenda Cliente: $c_nome <br>
    ============================================= <br>
    <table>
        <tr>
            <td>Id |</td>
            <td>Título |</td>
            <td>Qtd |</td>
            <td>Valor Unitário |</td>
            <td>Valor Total |</td>
        </tr>
        
        "./*while*/"
        
        <tr>
            <td>$linha[l_idLivro] |</td>
            <td>$linha[l_titulo] |</td>
            <td>$linha[iv_quantidade] |</td>
            <td>$linha[l_preco] |</td>
            <td>$linha[iv_valor_total_item] |</td>
        </tr>
        ----------------------------------------- <br>
        <tr>
            <td>Total:</td>
            <td>$v_valor_total_venda</td>
        </tr>
        <tr>
            <td>Desconto:</td>
            <td>$v_desconto</td>
        </tr>
        <tr>
            <td>Total Venda:</td>
            <td>$valor_total_menos_desconto</td>
        </tr>
    </table>";
?>