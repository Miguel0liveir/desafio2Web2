<?php require_once 'Aluno.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema Acadêmico</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Sistema de Notas - Aluno</h2>
        <form method="post">
            <div class="form-group">
                <label>Nome do Aluno:</label>
                <input type="text" name="nome" required>
            </div>
            <div class="form-group">
                <label>Disciplina:</label>
                <input type="text" name="disciplina" required>
            </div>
            <div class="form-group">
                <label>Nota 1:</label>
                <input type="number" step="0.1" min="0" max="10" name="nota1" required>
            </div>
            <div class="form-group">
                <label>Nota 2:</label>
                <input type="number" step="0.1" min="0" max="10" name="nota2" required>
            </div>
            <div class="form-group">
                <label>Nota 3:</label>
                <input type="number" step="0.1" min="0" max="10" name="nota3" required>
            </div>
            <button type="submit">Calcular Média</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $aluno = new Aluno(
                $_POST['nome'],
                $_POST['disciplina'],
                (float)$_POST['nota1'],
                (float)$_POST['nota2'],
                (float)$_POST['nota3']
            );

            echo $aluno->exibirResultado();
        }
        ?>
    </div>
</body>
</html>