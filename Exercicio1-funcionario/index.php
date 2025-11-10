<?php require_once 'Funcionario.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Informações do Funcionário</h2>
        <form method="post">
            <div class="form-group">
                <label>Nome: <input type="text" name="nome" required></label>
            </div>
            <div class="form-group">
                <label>Cargo: <input type="text" name="cargo" required></label>
            </div>
            <div class="form-group">
                <label>Salário: <input type="number" step="0.01" name="salario" required></label>
            </div>
            <div class="form-group">
                <label>Carga Horária Semanal: <input type="number" name="carga" required></label>
            </div>
            <div class="form-group">
                <label>Bônus: <input type="number" step="0.01" name="bonus" required></label>
            </div>
            <div class="form-group">
                <label>Horas Extras: <input type="number" name="extras" required></label>
            </div>
            <button type="submit">Calcular</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $func = new Funcionario(
                $_POST['nome'],
                $_POST['cargo'],
                (float)$_POST['salario'],
                (int)$_POST['carga']
            );

            echo "<div class='resultado'>";
            echo "<h3>Resultado:</h3>";
            echo $func->exibirDetalhes((float)$_POST['bonus'], (int)$_POST['extras']);
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>