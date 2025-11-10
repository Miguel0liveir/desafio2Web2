<?php require_once 'ReservaHotel.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Reserva de Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Reserva de Hotel</h2>
        <form method="post">
            <div class="form-group">
                <label>Nome do Hóspede:</label>
                <input type="text" name="hospede" required>
            </div>
            <div class="form-group">
                <label>Número de Noites:</label>
                <input type="number" name="noites" min="1" required>
            </div>
            <div class="form-group">
                <label>Tipo de Quarto:</label>
                <select name="quarto" required>
                    <option value="simples">Simples - R$ 120,00</option>
                    <option value="luxo">Luxo - R$ 200,00</option>
                    <option value="suite">Suíte - R$ 350,00</option>
                </select>
            </div>
            <button type="submit">Fazer Reserva</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reserva = new ReservaHotel(
                $_POST['hospede'],
                (int)$_POST['noites'],
                $_POST['quarto']
            );

            echo $reserva->exibirReserva();
        }
        ?>
    </div>
</body>
</html>