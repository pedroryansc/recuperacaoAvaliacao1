<?php
    class Venda{
        private $v_idVenda;
        private $v_valor_total_venda;
        private $v_desconto;
        private $v_c_idCliente;
        private $iv_data_venda;
        public function __construct($idVenda, $valor_total, $desconto, $idCliente, $data_venda){
            $this->setId($idVenda);
            $this->setValorTotal($valor_total);
            $this->setDesconto($desconto);
            $this->setCliente($idCliente);
            $this->setDataVenda($data_venda);
        }

        public function getId(){ return $this->v_idVenda; }
        public function getValorTotal(){ return $this->v_valor_total_venda; }
        public function getDesconto(){ return $this->v_desconto; }
        public function getCliente(){ return $this->v_c_idCliente; }
        public function getDataVenda(){ return $this->iv_data_venda; }

        public function setId($idVenda){
            $this->v_idVenda = $idVenda;
        }
        public function setValorTotal($valor_total){
            if($valor_total >= 0)
                $this->v_valor_total_venda = $valor_total;
            else
                throw new Exception("Valor total inválido: $valor_total");
        }
        public function setDesconto($desconto){
            if($desconto >= 1)
                $this->v_desconto = $desconto;
            else
                throw new Exception("Desconto inválido: $desconto");
        }
        public function setCliente($idCliente){
            if($idCliente > 0)
                $this->v_c_idCliente = $idCliente;
            else
                throw new Exception("Cliente inválido: $idCliente");
        }
        public function setDataVenda($data_venda){
            if($data_venda <> "")
                $this->iv_data_venda = $data_venda;
            else
                throw new Exception("Data da venda inválida: $data_venda");
        }

        public function insere(){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO Venda VALUES(:id, :valor_total, :desconto, :cliente, :data_venda)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $this->v_idVenda);
            $stmt->bindParam(":valor_total", $this->v_valor_total_venda);
            $stmt->bindParam(":desconto", $this->v_desconto);
            $stmt->bindParam(":cliente", $this->v_c_idCliente);
            $stmt->bindParam(":data_venda", $this->iv_data_venda);
            return $stmt->execute();
        }
        public function buscar($id){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM Venda WHERE v_idVenda = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        public function editar($id){
            require_once("../conf/Conexao.php");
            $query = "UPDATE Venda
                    SET v_valor_total_venda = :valor_total, v_desconto = :desconto, v_c_idCliente = :cliente, iv_data_venda = :data_venda
                    WHERE v_idVenda = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":valor_total", $this->v_valor_total_venda);
            $stmt->bindParam(":desconto", $this->v_desconto);
            $stmt->bindParam(":cliente", $this->v_c_idCliente);
            $stmt->bindParam(":data_venda", $this->iv_data_venda);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
        public function excluir($id){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM Venda WHERE v_idVenda = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }

        public function buscarCliente(){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM Cliente";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
    }
?>