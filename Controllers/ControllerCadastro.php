<script src="../Includes/zepto.min.js" type="module"></script>
<script src="../Javascript.js" type="module"></script>

<?php
    include("../Includes/Variaveis.php");
    include("../Class/ClassCrud.php");

    $Crud = new ClassCrud();
if($Acao=='Cadastrar'){
    $Crud->insertDB(
        "cadastro",
        "?,?,?,?",
        array(
            $Id,
            $Nome,
            $Sexo,
            $Cidade
        )
    );
    echo "cadastro realizado com sucesso";

}else{
    $Crud->updateDB(
            "cadastro",
        "Nome=?,Sexo=?,Cidade=?",
        "Id=?",
        array(
            $Nome,
            $Sexo,
            $Cidade,
            $Id
        )
    );
    echo "cadastro editado com sucesso";
}

