<?php
    include("conexao.php");
    $salario=$_POST["salario"];
    $nome=$_POST["nome"];
    $cidade=$_POST["cidade"];
    $estado=$_POST["estado"];
    $data_nasc=$_POST["data_nasc"];

    $sql="INSERT INTO regcli 
                (nome, salario, data_nasc, cidade ,estado) 
    VALUE
                ('$nome', '$salario', '$data_nasc', '$cidade', '$estado')";

if(mysqli_query($conexao, $sql)){
    echo("<h1>Cadastrado com sucesso</h1>");
}else{
    echo ("Error:".$sql."<br>".mysqli_error($conexao));
}
mysqli_close($conexao);
?>
<!--,sexo ,peso ,altura ,nacionalidade ,hoby