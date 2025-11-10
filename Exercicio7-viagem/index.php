<?php require_once 'Viagem.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Planejamento de Viagem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Planejamento de Viagem</h2>
        <form method="post">
            <div class="form-group">
                <label>Cidade de Origem:</label>
                <input type="text" name="origem" required>
            </div>
            <div class="form-group">
                <label>Cidade de Destino:</label>
                <input type="text" name="destino" required>
            </div>
            <div class="form-group">
                <label>Distância (km):</label>
                <input type="number" step="0.1" name="distancia" required>
            </div>
            <div class="form-group">
                <label>Tempo Estimado (horas):</label>
                <input type="number" step="0.1" name="tempo" required>
            </div>
            <div class="form-group">
                <label>Tipo de Veículo:</label>
                <select name="veiculo" required>
                    <option value="carro_pequeno">Carro Pequeno</option>
                    <option value="carro_medio">Carro Médio</option>
                    <option value="carro_grande">Carro Grande</option>
                    <option value="moto">Moto</option>
                </select>
            </div>
            <button type="submit">Calcular Viagem</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $viagem = new Viagem(
                $_POST['origem'],
                $_POST['destino'],
                (float)$_POST['distancia'],
                (float)$_POST['tempo'],
                $_POST['veiculo']
            );

            echo $viagem->exibirPlanejamento();
        }
        ?>
    </div>
</body>
</html>