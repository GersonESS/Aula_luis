<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <h1>Pesquisar Clientes</h1>
    <form action="pesquisar.php" method="post">
        <label for="">Digite a pesquisa</label>
        <input type="text" name="pesquisar" id="">
        <input type="submit" value="Pesquisar">
    </form>


</body>
</html>

<?php
include("conexao.php");
$pesquisar=$_POST['pesquisar'];
$sql="SELECT * FROM regcli WHERE nome LIKE '%$pesquisar%'";

$resultado=mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado)){
    echo"<table class='table'><tr><th>Codigo</th><th>Nome</th><th>Idade</th></tr>";
    while($row=mysqli_fetch_assoc($resultado)){
        echo"<tr><td>".$row['id']."</td>
                 <td>".$row['nome']."</td>
                 <td>".$row['data_nasc']."</td>
            </tr>";
    }
echo"</table>";
}
else{
    echo"Zero Resultados";

}
mysqli_close($conexao);
?>