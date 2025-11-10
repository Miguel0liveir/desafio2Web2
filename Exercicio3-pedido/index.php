<?php require_once 'Pedido.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Pedidos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Sistema de Pedidos</h2>
        <form method="post">
            <div class="form-group">
                <label>Nome do Produto:</label>
                <input type="text" name="produto" required>
            </div>
            <div class="form-group">
                <label>Quantidade:</label>
                <input type="number" name="quantidade" min="1" required>
            </div>
            <div class="form-group">
                <label>Preço Unitário (R$):</label>
                <input type="number" step="0.01" name="preco" required>
            </div>
            <div class="form-group">
                <label>Tipo de Cliente:</label>
                <select name="tipoCliente" required>
                    <option value="normal">Normal</option>
                    <option value="premium">Premium</option>
                </select>
            </div>
            <button type="submit">Calcular Pedido</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pedido = new Pedido(
                $_POST['produto'],
                (int)$_POST['quantidade'],
                (float)$_POST['preco'],
                $_POST['tipoCliente']
            );

            echo $pedido->exibirResumo();
        }
        ?>
    </div>
</body>
</html>