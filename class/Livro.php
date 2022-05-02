<?php
    class Livro{
        private $l_idLivro;
        private $l_titulo;
        private $l_ano_publicacao;
        private $l_isdn;
        private $l_preco;
        public function __construct($idLivro, $titulo, $ano_publicacao, $isdn, $preco){
            $this->setId($idLivro);
            $this->setTitulo($titulo);
            $this->setAnoPublicacao($ano_publicacao);
            $this->setIsdn($isdn);
            $this->setPreco($preco);
        }

        public function getId(){ return $this->l_idLivro; }
        public function getTitulo(){ return $this->l_titulo; }
        public function getAnoPublicacao(){ return $this->l_ano_publicacao; }
        public function getIsdn(){ return $this->l_isdn; }
        public function getPreco(){ return $this->l_preco; }

        public function setId($idLivro){
            $this->l_idLivro = $idLivro;
        }
        public function setTitulo($titulo){
            if($titulo <> "")
                $this->l_titulo = $titulo;
            else
                throw new Exception("Título inválido: $titulo");
        }
        public function setAnoPublicacao($ano_publicacao){
            if($ano_publicacao <> "")
                $this->l_ano_publicacao = $ano_publicacao;
            else
                throw new Exception("Ano de publicação inválido: $ano_publicacao");
        }
        public function setIsdn($isdn){
            if($isdn <> "")
                $this->l_isdn = $isdn;
            else
                throw new Exception("ISDN inválido: $isdn");
        }
        public function setPreco($preco){
            if($preco > 0)
                $this->l_preco = $preco;
            else
                throw new Exception("Preço inválido: $preco");
        }

        public function insere(){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO Livro VALUES(:id, :titulo, :ano_publicacao, :isdn, :preco)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $this->l_idLivro);
            $stmt->bindParam(":titulo", $this->l_titulo);
            $stmt->bindParam(":ano_publicacao", $this->l_ano_publicacao);
            $stmt->bindParam(":isdn", $this->l_isdn);
            $stmt->bindParam(":preco", $this->l_preco);
            return $stmt->execute();
        }
        public function buscar($id){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM Livro WHERE l_idLivro = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        public function editar($id){
            require_once("../conf/Conexao.php");
            $query = "UPDATE Livro
                    SET l_titulo = :titulo, l_ano_publicacao = :ano_publicacao, l_isdn = :isdn, l_preco = :preco
                    WHERE l_idLivro = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":titulo", $this->l_titulo);
            $stmt->bindParam(":ano_publicacao", $this->l_ano_publicacao);
            $stmt->bindParam(":isdn", $this->l_isdn);
            $stmt->bindParam(":preco", $this->l_preco);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
        public function excluir($id){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM Livro WHERE l_idLivro = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
    }
?>