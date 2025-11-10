<?php require_once 'Pessoa.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de IMC</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Calculadora de IMC</h2>
        <form method="post">
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" required>
            </div>
            <div class="form-group">
                <label>Peso (kg):</label>
                <input type="number" step="0.1" name="peso" required>
            </div>
            <div class="form-group">
                <label>Altura (metros):</label>
                <input type="number" step="0.01" name="altura" required>
            </div>
            <button type="submit">Calcular IMC</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pessoa = new Pessoa(
                $_POST['nome'],
                (float)$_POST['peso'],
                (float)$_POST['altura']
            );

            echo $pessoa->exibirResultado();
        }
        ?>
    </div>
</body>
</html>