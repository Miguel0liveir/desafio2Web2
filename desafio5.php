<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades PHP - UI Moderna</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 50px;
            color: white;
        }

        h1 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .exercicio {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            margin-bottom: 40px;
            border: 1px solid rgba(255,255,255,0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .exercicio:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .exercicio-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e8f5e8;
        }

        .exercicio-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 1.3rem;
        }

        .exercicio h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .exercicio-description {
            color: #666;
            margin-bottom: 25px;
            font-size: 1rem;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e1e8ed;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #27ae60;
            box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1);
        }

        .btn {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(39, 174, 96, 0.3);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #2980b9, #3498db);
        }

        .btn-secondary:hover {
            box-shadow: 0 8px 20px rgba(52, 152, 219, 0.3);
        }

        .resultado {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-top: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border-left: 4px solid #27ae60;
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .resultado h4 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .bilhetes-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 12px;
            margin: 20px 0;
        }

        .bilhete {
            background: linear-gradient(135deg, #f8fff8, #e8f5e8);
            border: 2px solid #27ae60;
            border-radius: 12px;
            padding: 15px 10px;
            text-align: center;
            font-weight: 600;
            color: #27ae60;
            transition: all 0.3s;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }

        .bilhete:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
            background: linear-gradient(135deg, #e8f5e8, #d4edda);
        }

        .jogo-resultado {
            text-align: center;
        }

        .jogadas {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 25px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 15px;
        }

        .jogada {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .jogada-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .jogada.vs .jogada-icon {
            background: #95a5a6;
            font-size: 1.2rem;
        }

        .jogada-texto {
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.9rem;
        }

        .resultado-texto {
            font-size: 1.4rem;
            font-weight: 700;
            padding: 15px 30px;
            border-radius: 50px;
            margin: 20px 0;
            display: inline-block;
        }

        .vitoria {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border: 2px solid #c3e6cb;
        }

        .derrota {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border: 2px solid #f5c6cb;
        }

        .empate {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            color: #856404;
            border: 2px solid #ffeaa7;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .action-buttons .btn {
            width: auto;
            flex: 1;
        }

        .badge {
            display: inline-block;
            background: #e74c3c;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 10px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 10px;
            }
            
            h1 {
                font-size: 2.2rem;
            }
            
            .exercicio {
                padding: 20px;
            }
            
            .jogadas {
                flex-direction: column;
                gap: 20px;
            }
            
            .bilhetes-container {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }

        .campo-destaque {
            background: #f8fff8;
            border-left: 4px solid #27ae60;
            padding: 15px;
            border-radius: 8px;
            margin: 10px 0;
        }

        .campo-destaque strong {
            color: #27ae60;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>🎯 Atividades em PHP</h1>
            <p class="subtitle">Interface moderna e interativa para atividades práticas</p>
        </header>

        <!-- ======================== -->
        <!-- ATIVIDADE 1 - GERADOR DE RIFAS -->
        <!-- ======================== -->
        <div class="exercicio">
            <div class="exercicio-header">
                <div class="exercicio-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <h3>Gerador de Rifas <span class="badge">NOVO</span></h3>
            </div>
            
            <p class="exercicio-description">
                Crie rifas personalizadas para suas campanhas de forma rápida e prática. 
                Gere bilhetes numerados automaticamente com todas as informações necessárias.
            </p>

            <form method="post">
                <div class="form-group">
                    <label for="campanha"><i class="fas fa-bullhorn"></i> Nome da Campanha</label>
                    <input type="text" id="campanha" name="campanha" class="form-control" 
                           placeholder="Ex: Rifinha da Turma da Escola" required>
                </div>

                <div class="form-group">
                    <label for="premio"><i class="fas fa-gift"></i> Nome do Prêmio</label>
                    <input type="text" id="premio" name="premio" class="form-control" 
                           placeholder="Ex: Cesta de Chocolate Premium" required>
                </div>

                <div class="form-group">
                    <label for="valor"><i class="fas fa-dollar-sign"></i> Valor da Rifa (R$)</label>
                    <input type="number" id="valor" name="valor" step="0.01" class="form-control" 
                           placeholder="Ex: 5.00" min="0.01" required>
                </div>

                <div class="form-group">
                    <label for="quantidade"><i class="fas fa-hashtag"></i> Quantidade de Bilhetes</label>
                    <input type="number" id="quantidade" name="quantidade" class="form-control" 
                           placeholder="Ex: 100" min="1" max="1000" required>
                </div>

                <button type="submit" name="gerar_rifa" class="btn">
                    <i class="fas fa-magic"></i> Gerar Bilhetes
                </button>
            </form>

            <?php
            if (isset($_POST['gerar_rifa'])) {
                $campanha = htmlspecialchars($_POST['campanha']);
                $premio = htmlspecialchars($_POST['premio']);
                $valor = number_format($_POST['valor'], 2, ',', '.');
                $quantidade = intval($_POST['quantidade']);

                echo "<div class='resultado'>";
                echo "<h4><i class='fas fa-check-circle'></i> Rifas Geradas com Sucesso!</h4>";
                
                echo "<div class='campo-destaque'>";
                echo "<p><strong>Campanha:</strong> $campanha</p>";
                echo "<p><strong>Prêmio:</strong> $premio</p>";
                echo "<p><strong>Valor por bilhete:</strong> R$ $valor</p>";
                echo "<p><strong>Total de bilhetes:</strong> $quantidade</p>";
                echo "</div>";
                
                echo "<h4><i class='fas fa-tickets'></i> Bilhetes Gerados</h4>";
                echo "<div class='bilhetes-container'>";
                for ($i = 1; $i <= $quantidade; $i++) {
                    $numero = str_pad($i, 3, "0", STR_PAD_LEFT);
                    echo "<div class='bilhete'>Nº <strong>$numero</strong></div>";
                }
                echo "</div>";
                
                echo "<div class='action-buttons'>";
                echo "<button class='btn btn-secondary' onclick='window.print()'>";
                echo "<i class='fas fa-print'></i> Imprimir Bilhetes";
                echo "</button>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>

        <!-- ======================== -->
        <!-- ATIVIDADE 2 - JOGO DO JOKEMPÔ -->
        <!-- ======================== -->
        <div class="exercicio">
            <div class="exercicio-header">
                <div class="exercicio-icon">
                    <i class="fas fa-hand-rock"></i>
                </div>
                <h3>Jogo do Jo-Ken-Pô</h3>
            </div>
            
            <p class="exercicio-description">
                Desafie o computador no clássico jogo de Pedra, Papel e Tesoura. 
                Teste sua sorte e estratégia em partidas rápidas e divertidas!
            </p>

            <form method="post">
                <div class="form-group">
                    <label for="jogador"><i class="fas fa-gamepad"></i> Escolha sua jogada</label>
                    <select id="jogador" name="jogador" class="form-control" required>
                        <option value="">-- Selecione sua jogada --</option>
                        <option value="1">👊 Pedra</option>
                        <option value="2">✋ Papel</option>
                        <option value="3">✌️ Tesoura</option>
                    </select>
                </div>

                <button type="submit" name="jogar" class="btn">
                    <i class="fas fa-play"></i> Jogar Agora
                </button>
            </form>

            <?php
            function jogar($jogador, $computador) {
                if ($jogador == $computador) {
                    return ["resultado" => "Empate!", "classe" => "empate"];
                }
                if (
                    ($jogador == 1 && $computador == 3) ||
                    ($jogador == 2 && $computador == 1) ||
                    ($jogador == 3 && $computador == 2)
                ) {
                    return ["resultado" => "Você venceu! 🎉", "classe" => "vitoria"];
                }
                return ["resultado" => "Computador venceu! 🤖", "classe" => "derrota"];
            }

            if (isset($_POST['jogar'])) {
                $jogador = intval($_POST['jogador']);
                $computador = rand(1, 3);

                $opcoes = [
                    1 => ["nome" => "Pedra", "emoji" => "👊"],
                    2 => ["nome" => "Papel", "emoji" => "✋"], 
                    3 => ["nome" => "Tesoura", "emoji" => "✌️"]
                ];
                
                $resultado = jogar($jogador, $computador);

                echo "<div class='resultado'>";
                echo "<h4><i class='fas fa-trophy'></i> Resultado da Partida</h4>";
                
                echo "<div class='jogo-resultado'>";
                echo "<div class='jogadas'>";
                
                // Jogada do usuário
                echo "<div class='jogada'>";
                echo "<div class='jogada-icon'>{$opcoes[$jogador]['emoji']}</div>";
                echo "<div class='jogada-texto'><strong>Você</strong></div>";
                echo "<div class='jogada-texto'>{$opcoes[$jogador]['nome']}</div>";
                echo "</div>";
                
                // VS
                echo "<div class='jogada vs'>";
                echo "<div class='jogada-icon'><i class='fas fa-versus'></i></div>";
                echo "<div class='jogada-texto'><strong>VS</strong></div>";
                echo "</div>";
                
                // Jogada do computador
                echo "<div class='jogada'>";
                echo "<div class='jogada-icon'>{$opcoes[$computador]['emoji']}</div>";
                echo "<div class='jogada-texto'><strong>Computador</strong></div>";
                echo "<div class='jogada-texto'>{$opcoes[$computador]['nome']}</div>";
                echo "</div>";
                
                echo "</div>";
                
                // Resultado
                echo "<div class='resultado-texto {$resultado['classe']}'>";
                echo $resultado['resultado'];
                echo "</div>";
                
                // Botão para jogar novamente
                echo "<form method='post' class='action-buttons'>";
                echo "<button type='submit' class='btn'>";
                echo "<i class='fas fa-redo'></i> Jogar Novamente";
                echo "</button>";
                echo "</form>";
                
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <script>
        // Adicionar interações suaves
        document.addEventListener('DOMContentLoaded', function() {
            // Adicionar animação de entrada aos exercícios
            const exercicios = document.querySelectorAll('.exercicio');
            exercicios.forEach((exercicio, index) => {
                exercicio.style.opacity = '0';
                exercicio.style.transform = 'translateY(30px)';
                exercicio.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                
                setTimeout(() => {
                    exercicio.style.opacity = '1';
                    exercicio.style.transform = 'translateY(0)';
                }, 200 * index);
            });

            // Efeito de foco nos campos do formulário
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });
        });
    </script>
</body>
</html>