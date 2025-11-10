<?php require_once 'CalculadoraFinanceira.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Financeira</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Calculadora Financeira - Parcelamento</h2>
        <form method="post">
            <div class="form-group">
                <label>Valor da Compra (R$):</label>
                <input type="number" step="0.01" name="valor" required>
            </div>
            <div class="form-group">
                <label>Número de Parcelas:</label>
                <input type="number" name="parcelas" min="1" max="60" required>
            </div>
            <div class="form-group">
                <label>Taxa de Juros Mensal (%):</label>
                <input type="number" step="0.1" name="juros" required>
            </div>
            <button type="submit">Calcular</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $calculadora = new CalculadoraFinanceira(
                (float)$_POST['valor'],
                (int)$_POST['parcelas'],
                (float)$_POST['juros']
            );

            echo $calculadora->exibirResultado();
        }
        ?>
    </div>
</body>
</html>