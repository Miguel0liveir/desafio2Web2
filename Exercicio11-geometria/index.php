<?php require_once 'CalculadoraGeometrica.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Geométrica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Calculadora Geométrica</h2>
        <form method="post" id="form-geometria">
            <div class="form-group">
                <label>Selecione a Figura:</label>
                <select name="figura" id="figura" required onchange="atualizarCampos()">
                    <option value="">Selecione...</option>
                    <option value="quadrado">Quadrado</option>
                    <option value="retangulo">Retângulo</option>
                    <option value="circulo">Círculo</option>
                </select>
            </div>
            
            <div class="form-group" id="campo-medida1">
                <label id="label-medida1">Medida 1:</label>
                <input type="number" step="0.1" name="medida1" required>
            </div>
            
            <div class="form-group" id="campo-medida2" style="display: none;">
                <label id="label-medida2">Medida 2:</label>
                <input type="number" step="0.1" name="medida2">
            </div>
            
            <button type="submit">Calcular Área</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $figura = $_POST['figura'];
            $medida1 = (float)$_POST['medida1'];
            $medida2 = isset($_POST['medida2']) ? (float)$_POST['medida2'] : 0;

            $calculadora = new CalculadoraGeometrica($figura, $medida1, $medida2);
            echo $calculadora->exibirResultado();
        }
        ?>
    </div>

    <script>
        function atualizarCampos() {
            const figura = document.getElementById('figura').value;
            const campoMedida1 = document.getElementById('campo-medida1');
            const labelMedida1 = document.getElementById('label-medida1');
            const campoMedida2 = document.getElementById('campo-medida2');
            const labelMedida2 = document.getElementById('label-medida2');

            switch (figura) {
                case 'quadrado':
                    labelMedida1.textContent = 'Lado:';
                    campoMedida2.style.display = 'none';
                    break;
                case 'retangulo':
                    labelMedida1.textContent = 'Base:';
                    labelMedida2.textContent = 'Altura:';
                    campoMedida2.style.display = 'block';
                    break;
                case 'circulo':
                    labelMedida1.textContent = 'Raio:';
                    campoMedida2.style.display = 'none';
                    break;
                default:
                    campoMedida1.style.display = 'none';
                    campoMedida2.style.display = 'none';
            }
        }
    </script>
</body>
</html>