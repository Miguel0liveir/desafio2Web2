<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades PHP - UI Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #8B4513;
            --secondary: #D2691E;
            --accent: #FF6B35;
            --success: #27ae60;
            --dark: #2c3e50;
            --light: #f8f9fa;
            --gold: #FFD700;
            --silver: #C0C0C0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 30px 20px;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 50px;
            color: white;
        }

        h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 15px;
            text-shadow: 0 4px 15px rgba(0,0,0,0.3);
            background: linear-gradient(45deg, var(--gold), var(--silver));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            font-size: 1.3rem;
            opacity: 0.9;
            font-weight: 300;
            text-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .exercicios-grid {
            display: grid;
            gap: 40px;
        }

        .exercicio {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            padding: 35px;
            border-radius: 25px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
            border: 1px solid rgba(255,255,255,0.3);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .exercicio:hover {
            transform: translateY(-8px) scale(1.01);
            box-shadow: 0 30px 70px rgba(0,0,0,0.25);
        }

        .exercicio-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid var(--primary);
        }

        .exercicio-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
        }

        .exercicio h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
        }

        .exercicio-description {
            color: #666;
            margin-bottom: 30px;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 0;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--dark);
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 16px 18px;
            border: 2px solid #e1e8ed;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s;
            background: white;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(139, 69, 19, 0.1);
            transform: translateY(-2px);
        }

        .btn {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 18px 30px;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 5px 20px rgba(139, 69, 19, 0.3);
        }

        .btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 10px 30px rgba(139, 69, 19, 0.4);
        }

        .btn-print {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
        }

        .btn-print:hover {
            box-shadow: 0 10px 30px rgba(231, 76, 60, 0.4);
        }

        /* ESTILOS DA RIFA REAL - ATUALIZADO */
        .rifa-real {
            background: white;
            border: 1px solid #000;
            border-radius: 5px;
            padding: 20px;
            margin: 25px 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .rifa-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #000;
        }

        .rifa-title {
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .rifa-date {
            font-size: 1rem;
            text-align: right;
        }

        .rifa-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 20px;
        }

        .rifa-left {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .rifa-right {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .dados-pessoais {
            margin-bottom: 20px;
        }

        .dados-pessoais label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .dados-pessoais input {
            width: 100%;
            border: none;
            border-bottom: 1px solid #000;
            margin-bottom: 10px;
            padding: 5px 0;
            background: transparent;
        }

        .seu-logo {
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 20px;
        }

        .rifa-numero {
            text-align: center;
            margin: 20px 0;
        }

        .numero-label {
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .numero-value {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .rifa-premios {
            text-align: center;
            margin-bottom: 20px;
        }

        .premio-titulo {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .premio-descricao {
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .premio-tabua {
            font-size: 0.9rem;
            font-style: italic;
            margin-top: 10px;
        }

        .rifa-footer {
            text-align: center;
            font-size: 0.8rem;
            padding-top: 15px;
            border-top: 1px solid #000;
        }

        .rifa-divider {
            border-top: 1px dashed #000;
            margin: 20px 0;
        }

        /* ESTILOS DO JOKENPÔ */
        .jokenpo-container {
            text-align: center;
        }

        .jokenpo-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin: 30px 0;
        }

        .jokenpo-option {
            background: white;
            border: 3px solid #e1e8ed;
            border-radius: 20px;
            padding: 25px 15px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }

        .jokenpo-option:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .jokenpo-option.selected {
            border-color: var(--success);
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            transform: scale(1.05);
        }

        .option-emoji {
            font-size: 4rem;
            margin-bottom: 15px;
            display: block;
        }

        .option-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
        }

        .battle-field {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            gap: 30px;
            align-items: center;
            margin: 40px 0;
            padding: 30px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 20px;
        }

        .player-side, .computer-side {
            text-align: center;
        }

        .player-label {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .choice-display {
            font-size: 6rem;
            margin: 20px 0;
            filter: drop-shadow(0 5px 15px rgba(0,0,0,0.2));
        }

        .vs-section {
            text-align: center;
        }

        .vs-text {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--accent);
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .result-section {
            margin: 30px 0;
        }

        .result-badge {
            display: inline-block;
            padding: 20px 40px;
            border-radius: 50px;
            font-size: 1.8rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .result-win {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border: 3px solid #c3e6cb;
        }

        .result-lose {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border: 3px solid #f5c6cb;
        }

        .result-draw {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            color: #856404;
            border: 3px solid #ffeaa7;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            margin-top: 30px;
        }

        .action-buttons .btn {
            width: auto;
            flex: 1;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .rifa-body {
                grid-template-columns: 1fr;
            }
            
            .jokenpo-options {
                grid-template-columns: 1fr;
            }
            
            .battle-field {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }

        @media print {
            body * {
                visibility: hidden;
            }
            .rifa-real,
            .rifa-real * {
                visibility: visible;
            }
            .rifa-real {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                box-shadow: none;
                border: 2px solid #000;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>🎮 Atividades Interativas</h1>
            <p class="subtitle">Experiências práticas com PHP e interface moderna</p>
        </header>

        <div class="exercicios-grid">
            <!-- GERADOR DE RIFAS -->
            <div class="exercicio">
                <div class="exercicio-header">
                    <div class="exercicio-icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <h3>🎫 Gerador de Rifas Premium</h3>
                </div>
                
                <p class="exercicio-description">
                    Crie rifas profissionais com design realista. Gere bilhetes numerados 
                    automaticamente prontos para impressão e distribuição.
                </p>

                <form method="post">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="campanha"><i class="fas fa-bullhorn"></i> Nome da Campanha</label>
                            <input type="text" id="campanha" name="campanha" class="form-control" 
                                   placeholder="Ex: Rifinha Solidária" required>
                        </div>

                        <div class="form-group">
                            <label for="premio"><i class="fas fa-gift"></i> Prêmio Principal</label>
                            <input type="text" id="premio" name="premio" class="form-control" 
                                   placeholder="Ex: Cesta de Natal Premium" required>
                        </div>

                        <div class="form-group">
                            <label for="valor"><i class="fas fa-dollar-sign"></i> Valor (R$)</label>
                            <input type="number" id="valor" name="valor" step="0.01" class="form-control" 
                                   placeholder="5.00" min="0.01" required>
                        </div>

                        <div class="form-group">
                            <label for="quantidade"><i class="fas fa-hashtag"></i> Quantidade</label>
                            <input type="number" id="quantidade" name="quantidade" class="form-control" 
                                   placeholder="100" min="1" max="1000" required>
                        </div>
                    </div>

                    <button type="submit" name="gerar_rifa" class="btn">
                        <i class="fas fa-magic"></i> Gerar Rifa Premium
                    </button>
                </form>

                <?php
                if (isset($_POST['gerar_rifa'])) {
                    $campanha = htmlspecialchars($_POST['campanha']);
                    $premio = htmlspecialchars($_POST['premio']);
                    $valor = number_format($_POST['valor'], 2, ',', '.');
                    $quantidade = intval($_POST['quantidade']);
                    
                    // Gerar número aleatório para a rifa
                    $numero_rifa = str_pad(rand(1, 99999999), 8, '0', STR_PAD_LEFT);

                    echo "<div class='rifa-real'>";
                    
                    // Cabeçalho
                    echo "<div class='rifa-header'>";
                    echo "<div class='rifa-title'>BILHETE RIFA</div>";
                    echo "<div class='rifa-date'>R$ $valor<br>JANEIRO, 12 / 2049</div>";
                    echo "</div>";
                    
                    // Corpo da rifa
                    echo "<div class='rifa-body'>";
                    
                    // Coluna esquerda
                    echo "<div class='rifa-left'>";
                    echo "<div class='dados-pessoais'>";
                    echo "<label>NOME:</label>";
                    echo "<input type='text' placeholder='______'>";
                    echo "<label>TELEFONE:</label>";
                    echo "<input type='text' placeholder='______'>";
                    echo "<label>EMAIL:</label>";
                    echo "<input type='text' placeholder='______'>";
                    echo "</div>";
                    echo "<div class='seu-logo'>SEU<br>LOGO</div>";
                    echo "</div>";
                    
                    // Coluna direita
                    echo "<div class='rifa-right'>";
                    echo "<div class='rifa-numero'>";
                    echo "<div class='numero-label'>Nº</div>";
                    echo "<div class='numero-value'>$numero_rifa</div>";
                    echo "</div>";
                    
                    echo "<div class='rifa-premios'>";
                    echo "<div class='premio-titulo'>GRANDE RIFA</div>";
                    echo "<div class='premio-descricao'>R$50.000 DE GRANDE PRÉMIO<br>- E DOIS PRÉMIOS DE<br>R$25.000 DÓLARES</div>";
                    echo "<div class='premio-tabua'><strong>SORTEAMOS UMA TÁBUA</strong><br>AVALIADO EM R$5.000</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    
                    // Divisor
                    echo "<div class='rifa-divider'></div>";
                    
                    // Rodapé
                    echo "<div class='rifa-footer'>";
                    echo "<div>Endereço: Rua das Palmeiras, Nº88 RJ - Telefone: +55 246 338 936</div>";
                    echo "<div>YOURWEBNEBRE.COM</div>";
                    echo "<div class='numero-value'>$numero_rifa</div>";
                    echo "</div>";
                    
                    echo "</div>";
                    
                    echo "<div class='action-buttons'>";
                    echo "<button class='btn btn-print' onclick='window.print()'>";
                    echo "<i class='fas fa-print'></i> Imprimir Rifa";
                    echo "</button>";
                    echo "</div>";
                }
                ?>
            </div>

            <!-- JOGO DO JOKENPÔ -->
            <div class="exercicio">
                <div class="exercicio-header">
                    <div class="exercicio-icon">
                        <i class="fas fa-hand-rock"></i>
                    </div>
                    <h3>🎮 Jokenpô Battle</h3>
                </div>
                
                <p class="exercicio-description">
                    Enfrente a máquina em batalhas épicas de Pedra, Papel e Tesoura! 
                    Escolha sua arma e mostre quem manda no jogo.
                </p>

                <form method="post" id="jokenpoForm">
                    <div class="jokenpo-container">
                        <div class="jokenpo-options">
                            <label class="jokenpo-option <?= (isset($_POST['jogador']) && $_POST['jogador'] == 1) ? 'selected' : '' ?>">
                                <input type="radio" name="jogador" value="1" style="display: none;" 
                                       <?= (isset($_POST['jogador']) && $_POST['jogador'] == 1) ? 'checked' : '' ?>>
                                <span class="option-emoji">👊</span>
                                <span class="option-name">PEDRA</span>
                            </label>
                            
                            <label class="jokenpo-option <?= (isset($_POST['jogador']) && $_POST['jogador'] == 2) ? 'selected' : '' ?>">
                                <input type="radio" name="jogador" value="2" style="display: none;"
                                       <?= (isset($_POST['jogador']) && $_POST['jogador'] == 2) ? 'checked' : '' ?>>
                                <span class="option-emoji">✋</span>
                                <span class="option-name">PAPEL</span>
                            </label>
                            
                            <label class="jokenpo-option <?= (isset($_POST['jogador']) && $_POST['jogador'] == 3) ? 'selected' : '' ?>">
                                <input type="radio" name="jogador" value="3" style="display: none;"
                                       <?= (isset($_POST['jogador']) && $_POST['jogador'] == 3) ? 'checked' : '' ?>>
                                <span class="option-emoji">✌️</span>
                                <span class="option-name">TESOURA</span>
                            </label>
                        </div>

                        <button type="submit" name="jogar" class="btn">
                            <i class="fas fa-fist-raised"></i> Iniciar Batalha
                        </button>
                    </div>
                </form>

                <?php
                function determinarResultado($jogador, $computador) {
                    if ($jogador == $computador) {
                        return ["texto" => "EMPATE!", "classe" => "result-draw"];
                    }
                    if (
                        ($jogador == 1 && $computador == 3) ||
                        ($jogador == 2 && $computador == 1) ||
                        ($jogador == 3 && $computador == 2)
                    ) {
                        return ["texto" => "VOCÊ VENCEU! 🏆", "classe" => "result-win"];
                    }
                    return ["texto" => "COMPUTADOR VENCEU! 🤖", "classe" => "result-lose"];
                }

                if (isset($_POST['jogar'])) {
                    $jogador = intval($_POST['jogador']);
                    $computador = rand(1, 3);

                    $opcoes = [
                        1 => ["nome" => "PEDRA", "emoji" => "👊"],
                        2 => ["nome" => "PAPEL", "emoji" => "✋"], 
                        3 => ["nome" => "TESOURA", "emoji" => "✌️"]
                    ];
                    
                    $resultado = determinarResultado($jogador, $computador);

                    echo "<div class='battle-field'>";
                    
                    // Jogador
                    echo "<div class='player-side'>";
                    echo "<div class='player-label'>VOCÊ</div>";
                    echo "<div class='choice-display'>{$opcoes[$jogador]['emoji']}</div>";
                    echo "<div class='option-name'>{$opcoes[$jogador]['nome']}</div>";
                    echo "</div>";
                    
                    // VS
                    echo "<div class='vs-section'>";
                    echo "<div class='vs-text'>VS</div>";
                    echo "</div>";
                    
                    // Computador
                    echo "<div class='computer-side'>";
                    echo "<div class='player-label'>COMPUTADOR</div>";
                    echo "<div class='choice-display'>{$opcoes[$computador]['emoji']}</div>";
                    echo "<div class='option-name'>{$opcoes[$computador]['nome']}</div>";
                    echo "</div>";
                    
                    echo "</div>";
                    
                    // Resultado
                    echo "<div class='result-section'>";
                    echo "<div class='result-badge {$resultado['classe']}'>";
                    echo $resultado['texto'];
                    echo "</div>";
                    echo "</div>";
                    
                    // Botão para jogar novamente
                    echo "<form method='post' class='action-buttons'>";
                    echo "<button type='submit' class='btn'>";
                    echo "<i class='fas fa-redo'></i> Jogar Novamente";
                    echo "</button>";
                    echo "</form>";
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        // Interatividade para o Jokenpô
        document.addEventListener('DOMContentLoaded', function() {
            // Seleção visual das opções do Jokenpô
            const options = document.querySelectorAll('.jokenpo-option');
            options.forEach(option => {
                option.addEventListener('click', function() {
                    options.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                    this.querySelector('input').checked = true;
                });
            });

            // Animação de entrada
            const exercicios = document.querySelectorAll('.exercicio');
            exercicios.forEach((exercicio, index) => {
                exercicio.style.opacity = '0';
                exercicio.style.transform = 'translateY(50px)';
                exercicio.style.transition = 'all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                
                setTimeout(() => {
                    exercicio.style.opacity = '1';
                    exercicio.style.transform = 'translateY(0)';
                }, 300 * index);
            });

            // Efeito de impressão melhorado
            const printButtons = document.querySelectorAll('.btn-print');
            printButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    setTimeout(() => {
                        alert('Configure a impressão para "Layout Paisagem" e margens mínimas para melhor resultado!');
                    }, 100);
                });
            });
        });
    </script>
</body>
</html>