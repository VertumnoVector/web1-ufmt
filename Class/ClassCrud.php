<?php
include("ClassConexao.php");

class ClassCrud extends ClassConexao{

    #atributos
    private $Crud;
    private $Contador;

    private function preparedStatements($Query, $Parametros){
        $this->CountParametros($Parametros);
        $this->Crud=$this->conectaDB()->prepare($Query);

        if($this->Contador > 0){
            for ($I=1; $I <= $this->Contador;$I++){
                $this->Crud->bindValue($I,$Parametros[$I-1]);
            }
        }

        $this->Crud->execute();
    }

    private function CountParametros($Parametros){
        $this->Contador=count($Parametros);

    }

    #insercao no banco
    public function insertDB($Tabela, $Condicao, $Parametros){
        $this->preparedStatements("insert into {$Tabela} values ({$Condicao})", $Parametros);
        return $this->Crud;
    }

    #consulta no banco
    public function selectDB($Campos, $Tabela, $Condicao, $Parametros){
        $this->preparedStatements("select {$Campos} from {$Tabela} {$Condicao}",$Parametros);
        return $this->Crud;
    }

    #Deletar dados no DB
    public function deleteDB($Tabela , $Condicao , $Parametros){
        $this->preparedStatements("delete from {$Tabela} where {$Condicao}" , $Parametros);
        return $this->Crud;
    }

    #Atualização no DB
    public function updateDB($Tabela , $Set , $Condicao , $Parametros)
    {
        $this->preparedStatements("update {$Tabela} set {$Set} where {$Condicao}",$Parametros);
        return $this->Crud;
    }

}
