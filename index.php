<?php
session_start();
include 'db_connect.php';


$usuario_logado = isset($_SESSION['cliente_id']);


$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Online</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <!-- Barra de Navegação -->
    <nav>
        <div class="logo">Loja Online</div>
        <div class="search-bar">
            <form method="GET" action="pesquisa.php" onsubmit="return verificarLogin(<?= $usuario_logado ? 'true' : 'false' ?>);">
                <input type="text" name="q" placeholder="Pesquisar produtos...">
                <button type="submit">Pesquisar</button>
            </form>
        </div>
        <div class="nav-buttons">
            <?php if ($usuario_logado): ?>
                <span>Bem-vindo, <?= htmlspecialchars($_SESSION['cliente_nome']) ?>!</span>
                <a href="logout.php" class="button">Sair</a>
            <?php else: ?>
                <button onclick="mostrarLogin()">Entrar/Registrar</button>
            <?php endif; ?>
            <a href="cadastrar_produto.php" class="button">Cadastrar Produto</a>
        </div>
    </nav>

    <!-- Lista de Produtos -->
    <section class="produtos">
        <h1>Produtos Disponíveis</h1>
        <div class="produtos-lista">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="produto">
                        <img src="uploads/<?= htmlspecialchars($row['imagem']) ?>" alt="<?= htmlspecialchars($row['nome']) ?>">
                        <h2><?= htmlspecialchars($row['nome']) ?></h2>
                        <p><?= htmlspecialchars($row['descricao']) ?></p>
                        <p>R$ <?= number_format($row['preco'], 2, ',', '.') ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Nenhum produto disponível.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Pop-up de Login -->
    <div id="login-popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="fecharLogin()">&times;</span>
            <h2>Entrar ou Registrar</h2>
            <form method="POST" action="login.php">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" required>
                <button type="submit">Entrar</button>
            </form>
            <p>Não tem conta? <a href="registro.php">Registre-se aqui</a></p>
        </div>
    </div>
</body>
</html>
