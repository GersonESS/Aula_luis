<?php
    include("conexao.php");
    $id=$_POST["id"];
    $nome=$_POST["nome"];
    $data_nasc=$_POST["data_nasc"];
    $sql="INSERT INTO regcli (id, nome, data_nasc) VALUE ($id, '$nome', '$data_nasc')";
if(mysqli_query($conexao, $sql)){
    echo("<h1>Cadastrado com sucesso</h1>");
}else{
    echo ("Error:".$sql."<br>".mysqli_error($conexao));
}
mysqli_close($conexao);
?>