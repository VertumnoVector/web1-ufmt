<?php
abstract class ClassConexao {
    #conexao ao banco
	protected function conectaDB() {
        try {
            $Con=new PDO("mysql:host=localhost;dbname=crud","root","");
            return $Con;
        }catch (PDOException $Erro){
            return $Erro->getMessage();
        }
    }
}
