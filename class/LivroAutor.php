<?php
    class LivroAutor{
        private $la_l_idLivro;
        private $la_a_idAutor;
        public function __construct($newLivro, $newAutor){
            $this->setNewLivro($newLivro);
            $this->setNewAutor($newAutor);
        }

        public function getNewLivro(){ return $this->la_l_idLivro; }
        public function getNewAutor(){ return $this->la_a_idAutor; }

        public function setNewLivro($newLivro){
            if($newLivro > 0)
                $this->la_l_idLivro = $newLivro;
            else
                throw new Exception("Livro inválido: $newLivro");
        }
        public function setNewAutor($newAutor){
            if($newAutor > 0)
                $this->la_a_idAutor = $newAutor;
            else
                throw new Exception("Autor inválido: $newAutor");
        }

        public function insere(){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO Livro_Autor VALUES(:newLivro, :newAutor)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":newLivro", $this->la_l_idLivro);
            $stmt->bindParam(":newAutor", $this->la_a_idAutor);
            return $stmt->execute();
        }
        public function editar($oldLivro, $oldAutor){
            require_once("../conf/Conexao.php");
            $query = "UPDATE Livro_Autor
                    SET la_l_idLivro = :newLivro, la_a_idAutor = :newAutor
                    WHERE la_l_idLivro = :oldLivro AND la_a_idAutor = :oldAutor";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":newLivro", $this->la_l_idLivro);
            $stmt->bindParam(":newAutor", $this->la_a_idAutor);
            $stmt->bindParam(":oldLivro", $oldLivro);
            $stmt->bindParam(":oldAutor", $oldAutor);
            return $stmt->execute();
        }
        public function excluir($oldLivro, $oldAutor){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM Livro_Autor WHERE la_l_idLivro = :oldLivro AND la_a_idAutor = :oldAutor";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":oldLivro", $oldLivro);
            $stmt->bindParam(":oldAutor", $oldAutor);
            return $stmt->execute();
        }
    }
?>