<?php
    class Autor{
        private $a_idAutor;
        private $a_nome;
        private $a_sobrenome;
        public function __construct($idAutor, $nome, $sobrenome){
            $this->setId($idAutor);
            $this->setNome($nome);
            $this->setSobrenome($sobrenome);
        }
        
        public function getId(){ return $this->a_idAutor; }
        public function getNome(){ return $this->a_nome; }
        public function getSobrenome(){ return $this->a_sobrenome; }
        
        public function setId($idAutor){
            $this->a_idAutor = $idAutor;
        }
        public function setNome($nome){
            if($nome <> "")
                $this->a_nome = $nome;
            else
                throw new Exception("Nome inválido: $nome");
        }
        public function setSobrenome($sobrenome){
            if($sobrenome <> "")
                $this->a_sobrenome = $sobrenome;
            else
                throw new Exception("Sobrenome inválido: $sobrenome");
        }

        public function insere(){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO Autor VALUES(:id, :nome, :sobrenome)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $this->a_idAutor);
            $stmt->bindParam(":nome", $this->a_nome);
            $stmt->bindParam(":sobrenome", $this->a_sobrenome);
            return $stmt->execute();
        }
        public function buscar($id){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM Autor";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            if($id != ""){
                $query .= " WHERE a_idAutor = :id";
                $stmt = $conexao->prepare($query);
                $stmt->bindParam(":id", $id);
            }
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        public function editar($id){
            require_once("../conf/Conexao.php");
            $query = "UPDATE Autor
                    SET a_nome = :nome, a_sobrenome = :sobrenome
                    WHERE a_idAutor = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":nome", $this->a_nome);
            $stmt->bindParam(":sobrenome", $this->a_sobrenome);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
        public function excluir($id){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM Autor WHERE a_idAutor = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
    }
?>