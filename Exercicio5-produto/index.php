<?php
require_once 'Produto.php';
session_start();

if (!isset($_SESSION['produto'])) {
    $_SESSION['produto'] = null;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Controle de Estoque</h2>
        
        <form method="post">
            <div class="form-group">
                <label>Nome do Produto:</label>
                <input type="text" name="nome" required>
            </div>
            <div class="form-group">
                <label>Quantidade Inicial:</label>
                <input type="number" name="quantidade" min="0" required>
            </div>
            <div class="form-group">
                <label>Valor Unitário (R$):</label>
                <input type="number" step="0.01" name="valor" required>
            </div>
            <button type="submit" name="criar">Criar Produto</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['criar'])) {
            $_SESSION['produto'] = new Produto(
                $_POST['nome'],
                (int)$_POST['quantidade'],
                (float)$_POST['valor']
            );
        }
        ?>

        <?php if ($_SESSION['produto'] !== null && $_SESSION['produto']->getNome() !== ''): ?>
        <div class="movimentacao">
            <h3>Movimentação de Estoque</h3>
            <form method="post" class="inline-form">
                <input type="number" name="entrada" placeholder="Quantidade entrada" min="1">
                <button type="submit" name="entrar">Entrada</button>
            </form>
            
            <form method="post" class="inline-form">
                <input type="number" name="saida" placeholder="Quantidade saída" min="1">
                <button type="submit" name="sair">Saída</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['entrar']) && $_POST['entrada'] > 0) {
                    $_SESSION['produto']->entradaEstoque((int)$_POST['entrada']);
                    echo "<p class='sucesso'>✅ Entrada de {$_POST['entrada']} unidades realizada!</p>";
                }
                
                if (isset($_POST['sair']) && $_POST['saida'] > 0) {
                    $sucesso = $_SESSION['produto']->saidaEstoque((int)$_POST['saida']);
                    if ($sucesso) {
                        echo "<p class='sucesso'>✅ Saída de {$_POST['saida']} unidades realizada!</p>";
                    } else {
                        echo "<p class='erro'>❌ Estoque insuficiente!</p>";
                    }
                }
            }
            ?>
        </div>

        <?php echo $_SESSION['produto']->exibirEstoque(); ?>
        <?php endif; ?>
    </div>
</body>
</html>