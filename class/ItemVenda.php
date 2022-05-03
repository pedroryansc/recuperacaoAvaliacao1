<?php
    class ItemVenda{
        private $iv_v_idVenda;
        private $iv_l_idLivro;
        private $iv_quantidade;
        private $iv_valor_total_item;
        public function __construct($newVenda, $newItem, $quantidade, $valor_total_item){
            $this->setNewVenda($newVenda);
            $this->setNewItem($newItem);
            $this->setQuantidade($quantidade);
            $this->setValorTotalItem($valor_total_item);
        }

        public function getNewVenda(){ return $this->iv_v_idVenda; }
        public function getNewItem(){ return $this->iv_l_idLivro; }
        public function getQuantidade(){ return $this->iv_quantidade; }
        public function getValorTotalItem(){ return $this->iv_valor_total_item; }

        public function setNewVenda($newVenda){
            if($newVenda > 0)
                $this->iv_v_idVenda = $newVenda;
            else
                throw new Exception("Venda inválida: $newVenda");
        }
        public function setNewItem($newItem){
            if($newItem > 0)
                $this->iv_l_idLivro = $newItem;
            else
                throw new Exception("Livro/Item inválido: $newItem");
        }
        public function setQuantidade($quantidade){
            if($quantidade > 0)
                $this->iv_quantidade = $quantidade;
            else
                throw new Exception("Quantidade inválida: $quantidade");
        }
        public function setValorTotalItem($valor_total_item){
            if($valor_total_item >= 0)
                $this->iv_valor_total_item = $valor_total_item;
            else
                throw new Exception("Quantidade inválida: $valor_total_item");
        }

        public function insere(){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO Item_venda VALUES(:newVenda, :newItem, :quantidade, :valor_total_item)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":newVenda", $this->iv_v_idVenda);
            $stmt->bindParam(":newItem", $this->iv_l_idLivro);
            $stmt->bindParam(":quantidade", $this->iv_quantidade);
            $stmt->bindParam(":valor_total_item", $this->iv_valor_total_item);
            return $stmt->execute();
        }
        public function buscar($oldVenda, $oldItem){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM Item_venda WHERE iv_v_idVenda = :oldVenda AND iv_l_idLivro = :oldItem";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":oldVenda", $oldVenda);
            $stmt->bindParam(":oldItem", $oldItem);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        public function editar($oldVenda, $oldItem){
            require_once("../conf/Conexao.php");
            $query = "UPDATE Item_venda
                    SET iv_v_idVenda = :newVenda, iv_l_idLivro = :newItem, iv_quantidade = :quantidade, iv_valor_total_item = :valor_total_item
                    WHERE iv_v_idVenda = :oldVenda AND iv_l_idLivro = :oldItem";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":newVenda", $this->iv_v_idVenda);
            $stmt->bindParam(":newItem", $this->iv_l_idLivro);
            $stmt->bindParam(":quantidade", $this->iv_quantidade);
            $stmt->bindParam(":valor_total_item", $this->iv_valor_total_item);
            $stmt->bindParam(":oldVenda", $oldVenda);
            $stmt->bindParam(":oldItem", $oldItem);
            return $stmt->execute();
        }
        public function excluir($oldVenda, $oldItem){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM Item_venda WHERE iv_v_idVenda = :oldVenda AND iv_l_idLivro = :oldItem";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":oldVenda", $oldVenda);
            $stmt->bindParam(":oldItem", $oldItem);
            return $stmt->execute();
        }
    }
?>