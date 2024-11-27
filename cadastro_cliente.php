<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Clientes</title>
</head>
<body>
    <h1>Cadastro de Clientes</h1>
    <form method="POST" action="">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Senha:</label>
        <input type="password" name="senha" required><br>
        <label>Endereço:</label>
        <textarea name="endereco" required></textarea><br>
        <label>CEP:</label>
        <input type="text" name="cep" required><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>



<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];

    $sql = "INSERT INTO clientes (nome, email, senha, endereco, cep) VALUES ('$nome', '$email', '$senha', '$endereco', '$cep')";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>
