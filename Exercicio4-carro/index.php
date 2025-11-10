<?php require_once 'Carro.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Autonomia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Calculadora de Autonomia - Veículo</h2>
        <form method="post">
            <div class="form-group">
                <label>Modelo do Carro:</label>
                <input type="text" name="modelo" required>
            </div>
            <div class="form-group">
                <label>Tipo de Combustível:</label>
                <select name="combustivel" required>
                    <option value="etanol">Etanol</option>
                    <option value="gasolina">Gasolina</option>
                </select>
            </div>
            <div class="form-group">
                <label>Capacidade do Tanque (litros):</label>
                <input type="number" step="0.1" name="tanque" required>
            </div>
            <div class="form-group">
                <label>Consumo (km/l):</label>
                <input type="number" step="0.1" name="consumo" required>
            </div>
            <div class="form-group">
                <label>Quilometragem Rodada:</label>
                <input type="number" name="km" required>
            </div>
            <button type="submit">Calcular</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $carro = new Carro(
                $_POST['modelo'],
                $_POST['combustivel'],
                (float)$_POST['tanque'],
                (float)$_POST['consumo'],
                (float)$_POST['km']
            );

            echo $carro->exibirRelatorio();
        }
        ?>
    </div>
</body>
</html>