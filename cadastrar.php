<?php
include("conexao.php");
$nome=$_POST["nome"];
//$idade=$_POST["data_nasc"];
$sql="INSERT INTO clientes (nome, ) VALUE ('$nome')";
if(mysqli_query($conexao, $sql)){
    echo("<h1>Cadastrado com sucesso</h1>");
}else{
    echo ("Error:".$sql."<br>".mysqli_error($conexao));
}
mysqli_close($conexao);
?>