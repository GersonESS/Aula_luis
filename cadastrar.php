<?php
include("conexao.php");
$nome=$_POST["nome"];
//$idade=$_POST["data_nasc"];
//$sql="INSERT INTO cli (nome, ) VALUE ('$nome')";
$sql="INSERT INTO clientes (codigo, nome, idade) VALUE ('$codigo', '$nome', '$idade')";
if(mysqli_query($conexao, $sql)){
    echo("<h1>Cadastrado com sucesso</h1>");
}else{
    echo ("Error:".$sql."<br>".mysqli_error($conexao));
}
mysqli_close($conexao);
?>