<?php
    class Cliente{
        private $c_idCliente;
        private $c_nome;
        private $c_cpf;
        private $c_dt_nascimento;
        public function __construct($idCliente, $nome, $cpf, $dt_nascimento){
            $this->setId($idCliente);
            $this->setNome($nome);
            $this->setCpf($cpf);
            $this->setDtNascimento($dt_nascimento);
        }
        
        public function getId(){ return $this->c_idCliente; }
        public function getNome(){ return $this->c_nome; }
        public function getCpf(){ return $this->c_cpf; }
        public function getDtNascimento(){ return $this->c_dt_nascimento; }
        
        public function setId($idCliente){
            $this->c_idCliente = $idCliente;
        }
        public function setNome($nome){
            if($nome <> "")
                $this->c_nome = $nome;
            else
                throw new Exception("Nome inválido: $nome");
        }
        public function setCpf($cpf){
            if($cpf <> "")
                $this->c_cpf = $cpf;
            else
                throw new Exception("CPF inválido: $cpf");
        }
        public function setDtNascimento($dt_nascimento){
            if($dt_nascimento <> "")
                $this->c_dt_nascimento = $dt_nascimento;
            else
                throw new Exception("Data de nascimento inválida: $dt_nascimento");
        }

        public function insere(){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO Cliente VALUES(:id, :nome, :cpf, :dt_nascimento)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $this->c_idCliente);
            $stmt->bindParam(":nome", $this->c_nome);
            $stmt->bindParam(":cpf", $this->c_cpf);
            $stmt->bindParam(":dt_nascimento", $this->c_dt_nascimento);
            return $stmt->execute();
        }
        public function buscar($id){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM Cliente";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            if($id != 0){
                $query .= " WHERE c_idCliente = :id";
                $stmt = $conexao->prepare($query);
                $stmt->bindParam(":id", $id);
            }
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        public function editar($id){
            require_once("../conf/Conexao.php");
            $query = "UPDATE Cliente
                    SET c_nome = :nome, c_cpf = :cpf, c_dt_nascimento = :dt_nascimento
                    WHERE c_idCliente = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":nome", $this->c_nome);
            $stmt->bindParam(":cpf", $this->c_cpf);
            $stmt->bindParam(":dt_nascimento", $this->c_dt_nascimento);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
        public function excluir($id){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM Cliente WHERE c_idCliente = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
    }
?>