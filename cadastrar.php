<?php
    include("conexao.php");
    $salario=$_POST["salario"];
    $nome=$_POST["nome"];
    $cidade=$_POST["cidade"];
    $estado=$_POST["estado"];
    $data_nasc=$_POST["data_nasc"];
    $sexo=$_POST['sexo'];
    $sql="INSERT INTO regcli 
                (nome, salario, data_nasc, cidade ,estado ,sexo) 
    VALUE
                ('$nome', '$salario', '$data_nasc', '$cidade', '$estado', '$sexo')";

if(mysqli_query($conexao, $sql)){
    echo("<h1>Cadastrado com sucesso</h1>");
}else{
    echo ("Error:".$sql."<br>".mysqli_error($conexao));
}
mysqli_close($conexao);
?>
<!--,sexo ,peso ,altura ,nacionalidade ,hoby