<?php require_once 'ConversorMoeda.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Conversor de Moedas</h2>
        <form method="post">
            <div class="form-group">
                <label>Valor em Reais (R$):</label>
                <input type="number" step="0.01" name="valor" required>
            </div>
            <div class="form-group">
                <label>Moeda de Destino:</label>
                <select name="moeda" required>
                    <option value="USD">Dólar Americano (USD)</option>
                    <option value="EUR">Euro (EUR)</option>
                    <option value="GBP">Libra Esterlina (GBP)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Cotação Atual (R$):</label>
                <input type="number" step="0.01" name="cotacao" required>
            </div>
            <button type="submit">Converter</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $conversor = new ConversorMoeda(
                (float)$_POST['valor'],
                $_POST['moeda'],
                (float)$_POST['cotacao']
            );

            echo $conversor->exibirResultado();
        }
        ?>
    </div>
</body>
</html>