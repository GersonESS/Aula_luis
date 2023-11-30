<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Registro</title>
</head>
<body>

<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados (substitua as credenciais conforme necessário)
    $servidor="localhost";
    $username = "root";
    $password = "";
    $dbname = "arqcli";

    $conn = new mysqli($servidor, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Prepara a declaração SQL para inserção de dados
    $sql = "INSERT INTO regcli (nome, salario, data_nasc, cidade, estado, sexo, peso, altura, nacionalidade, hoby)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Vincula os parâmetros com os valores do formulário
    $stmt->bind_param(
        "sdssssddss",
        $_POST["nome"],
        $_POST["salario"],
        $_POST["data_nasc"],
        $_POST["cidade"],
        $_POST["estado"],
        $_POST["sexo"],
        $_POST["peso"],
        $_POST["altura"],
        $_POST["nacionalidade"],
        $_POST["hoby"]
    );
    
    // Executa a declaração preparada e verifica se a inserção foi bem-sucedida
    if ($stmt->execute()) {
        echo "<p>Dados inseridos com sucesso!</p>";
    } else {
        echo "<p>Erro ao inserir dados: " . $stmt->error . "</p>";
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>

<!-- Formulário HTML -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nome: <input type="text" name="nome" required><br>
    Salário: <input type="number" name="salario" step="0.01"><br>
    Data de Nascimento: <input type="date" name="data_nasc"><br>
    Cidade: <input type="text" name="cidade"><br>
    Estado: <input type="text" name="estado" maxlength="2"><br>
    Sexo: <input type="radio" name="sexo" value="M" checked> Masculino
          <input type="radio" name="sexo" value="F"> Feminino<br>
    Peso: <input type="number" name="peso" step="0.01"><br>
    Altura: <input type="number" name="altura" step="0.01"><br>
    Nacionalidade: <input type="text" name="nacionalidade" value="Brasil"><br>
    Hoby: <textarea name="hoby"></textarea><br>
    <input type="submit" value="Enviar">
</form>

</body>
</html>
