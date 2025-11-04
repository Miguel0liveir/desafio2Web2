<?php
// Inicializar variáveis para todos os exercícios
$resultado = "";
$erros = [];
$exercicio_atual = $_GET['exercicio'] ?? 'home';

// Dados para repopulação dos formulários
$dados_form = [
    'reais' => '', 'cotacao' => '',
    'base' => '', 'altura' => '',
    'distancia' => '', 'combustivel' => '',
    'n1' => '', 'n2' => '',
    'ano_nascimento' => '',
    'numero' => '',
    'numero_dia' => '',
    'calc_n1' => '', 'calc_n2' => '', 'operacao' => '',
    'numero_mes' => '',
    'fatorial_num' => '',
    'somatorio_num' => '',
    'inicio' => '', 'fim' => '',
    'notas' => ['', '', '', '', ''],
    'itens_selecionados' => [],
    'numeros_array' => ['', '', '', '', '']
];

// Processar formulários baseado no exercício atual
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercicio_atual = $_POST['exercicio'] ?? 'home';
    
    switch ($exercicio_atual) {
        
        // BLOCO 1: ALGORITMOS SEQUENCIAIS
        case '1_conversor_moedas':
            processarConversorMoedas();
            break;
            
        case '2_area_perimetro':
            processarAreaPerimetro();
            break;
            
        case '3_consumo_combustivel':
            processarConsumoCombustivel();
            break;
            
        // BLOCO 2: CONDICIONAIS IF/ELSE
        case '4_situacao_aluno':
            processarSituacaoAluno();
            break;
            
        case '5_verificador_idade':
            processarVerificadorIdade();
            break;
            
        case '6_par_impar':
            processarParImpar();
            break;
            
        // BLOCO 3: CONDICIONAIS SWITCH
        case '7_dia_semana':
            processarDiaSemana();
            break;
            
        case '8_calculadora_simples':
            processarCalculadora();
            break;
            
        case '9_mes_extenso':
            processarMesExtenso();
            break;
            
        // BLOCO 4: LAÇOS DE REPETIÇÃO
        case '10_fatorial':
            processarFatorial();
            break;
            
        case '11_somatorio':
            processarSomatorio();
            break;
            
        case '12_pares_intervalo':
            processarParesIntervalo();
            break;
            
        // BLOCO 5: ARRAYS
        case '13_media_valores':
            processarMediaValores();
            break;
            
        case '14_lista_compras':
            processarListaCompras();
            break;
            
        case '15_maior_valor':
            processarMaiorValor();
            break;
    }
}

// FUNÇÕES DE PROCESSAMENTO
function processarConversorMoedas() {
    global $dados_form, $resultado, $erros;
    
    $dados_form['reais'] = $_POST['reais'] ?? '';
    $dados_form['cotacao'] = $_POST['cotacao'] ?? '';
    
    if (validarFloat($dados_form['reais'], 'Reais') && validarFloat($dados_form['cotacao'], 'Cotação')) {
        $reais = floatval(str_replace(',', '.', $dados_form['reais']));
        $cotacao = floatval(str_replace(',', '.', $dados_form['cotacao']));
        $dolares = $reais / $cotacao;
        $resultado = "💰 <strong>R$ " . number_format($reais, 2, ',', '.') . " equivalem a US$ " . number_format($dolares, 2, ',', '.') . "</strong>";
    }
}

function processarAreaPerimetro() {
    global $dados_form, $resultado, $erros;
    
    $dados_form['base'] = $_POST['base'] ?? '';
    $dados_form['altura'] = $_POST['altura'] ?? '';
    
    if (validarFloat($dados_form['base'], 'Base') && validarFloat($dados_form['altura'], 'Altura')) {
        $base = floatval(str_replace(',', '.', $dados_form['base']));
        $altura = floatval(str_replace(',', '.', $dados_form['altura']));
        $area = $base * $altura;
        $perimetro = 2 * ($base + $altura);
        $resultado = "📐 <strong>Área:</strong> " . number_format($area, 2, ',', '.') . " m² | <strong>Perímetro:</strong> " . number_format($perimetro, 2, ',', '.') . " m";
    }
}

function processarConsumoCombustivel() {
    global $dados_form, $resultado, $erros;
    
    $dados_form['distancia'] = $_POST['distancia'] ?? '';
    $dados_form['combustivel'] = $_POST['combustivel'] ?? '';
    
    if (validarFloat($dados_form['distancia'], 'Distância') && validarFloat($dados_form['combustivel'], 'Combustível')) {
        $distancia = floatval(str_replace(',', '.', $dados_form['distancia']));
        $combustivel = floatval(str_replace(',', '.', $dados_form['combustivel']));
        $consumo = $distancia / $combustivel;
        $resultado = "⛽ <strong>Consumo médio:</strong> " . number_format($consumo, 2, ',', '.') . " Km/L";
    }
}

function processarSituacaoAluno() {
    global $dados_form, $resultado, $erros;
    
    $dados_form['n1'] = $_POST['n1'] ?? '';
    $dados_form['n2'] = $_POST['n2'] ?? '';
    
    if (validarNota($dados_form['n1'], 'Nota 1') && validarNota($dados_form['n2'], 'Nota 2')) {
        $n1 = floatval(str_replace(',', '.', $dados_form['n1']));
        $n2 = floatval(str_replace(',', '.', $dados_form['n2']));
        $media = ($n1 + $n2) / 2;
        
        if ($media >= 7) $situacao = "🎉 Aprovado";
        elseif ($media >= 4) $situacao = "⚠️ Em Recuperação";
        else $situacao = "❌ Reprovado";
        
        $resultado = "📊 <strong>Média:</strong> " . number_format($media, 1, ',', '.') . " - $situacao";
    }
}

function processarVerificadorIdade() {
    global $dados_form, $resultado, $erros;
    
    $dados_form['ano_nascimento'] = $_POST['ano_nascimento'] ?? '';
    
    if (validarInteiro($dados_form['ano_nascimento'], 'Ano de Nascimento', 1900, date('Y'))) {
        $ano = intval($dados_form['ano_nascimento']);
        $idade = date('Y') - $ano;
        
        if ($idade < 16) $situacao = "❌ Não pode votar";
        elseif ($idade < 18 || $idade >= 70) $situacao = "✅ Voto Facultativo";
        else $situacao = "✅ Voto Obrigatório";
        
        $resultado = "👤 <strong>Idade:</strong> $idade anos - $situacao";
    }
}

function processarParImpar() {
    global $dados_form, $resultado, $erros;
    
    $dados_form['numero'] = $_POST['numero'] ?? '';
    
    if (validarInteiro($dados_form['numero'], 'Número')) {
        $numero = intval($dados_form['numero']);
        $resultado = ($numero % 2 == 0) ? "🔵 <strong>$numero é PAR</strong>" : "🟣 <strong>$numero é ÍMPAR</strong>";
    }
}

function processarDiaSemana() {
    global $dados_form, $resultado, $erros;
    
    $dados_form['numero_dia'] = $_POST['numero_dia'] ?? '';
    
    if (validarInteiro($dados_form['numero_dia'], 'Número do dia', 1, 7)) {
        $numero = intval($dados_form['numero_dia']);
        $dias = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
        $resultado = "📅 <strong>$numero - {$dias[$numero-1]}</strong>";
    }
}

function processarCalculadora() {
    global $dados_form, $resultado, $erros;
    
    $dados_form['calc_n1'] = $_POST['calc_n1'] ?? '';
    $dados_form['calc_n2'] = $_POST['calc_n2'] ?? '';
    $dados_form['operacao'] = $_POST['operacao'] ?? '';
    
    if (validarFloat($dados_form['calc_n1'], 'Número 1') && validarFloat($dados_form['calc_n2'], 'Número 2')) {
        $n1 = floatval(str_replace(',', '.', $dados_form['calc_n1']));
        $n2 = floatval(str_replace(',', '.', $dados_form['calc_n2']));
        $operacao = $dados_form['operacao'];
        
        switch ($operacao) {
            case 'somar':
                $resultado = "➕ $n1 + $n2 = <strong>" . ($n1 + $n2) . "</strong>";
                break;
            case 'subtrair':
                $resultado = "➖ $n1 - $n2 = <strong>" . ($n1 - $n2) . "</strong>";
                break;
            case 'multiplicar':
                $resultado = "✖️ $n1 × $n2 = <strong>" . ($n1 * $n2) . "</strong>";
                break;
            case 'dividir':
                if ($n2 != 0) {
                    $resultado = "➗ $n1 ÷ $n2 = <strong>" . number_format($n1 / $n2, 2, ',', '.') . "</strong>";
                } else {
                    $erros[] = "Não é possível dividir por zero.";
                }
                break;
            default:
                $erros[] = "Selecione uma operação válida.";
        }
    }
}

function processarMesExtenso() {
    global $dados_form, $resultado, $erros;
    
    $dados_form['numero_mes'] = $_POST['numero_mes'] ?? '';
    
    if (validarInteiro($dados_form['numero_mes'], 'Número do mês', 1, 12)) {
        $numero = intval($dados_form['numero_mes']);
        $meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        $resultado = "📆 <strong>$numero - {$meses[$numero-1]}</strong>";
    }
}

function processarFatorial() {
    global $dados_form, $resultado, $erros;
    
    $dados_form['fatorial_num'] = $_POST['fatorial_num'] ?? '';
    
    if (validarInteiro($dados_form['fatorial_num'], 'Número', 0, 20)) {
        $numero = intval($dados_form['fatorial_num']);
        $fatorial = 1;
        for ($i = 1; $i <= $numero; $i++) {
            $fatorial *= $i;
        }
        $resultado = "🔢 <strong>$numero! = $fatorial</strong>";
    }
}

function processarSomatorio() {
    global $dados_form, $resultado, $erros;
    
    $dados_form['somatorio_num'] = $_POST['somatorio_num'] ?? '';
    
    if (validarInteiro($dados_form['somatorio_num'], 'Número', 1)) {
        $numero = intval($dados_form['somatorio_num']);
        $soma = 0;
        for ($i = 1; $i <= $numero; $i++) {
            $soma += $i;
        }
        $resultado = "∑ <strong>Soma de 1 a $numero = $soma</strong>";
    }
}

function processarParesIntervalo() {
    global $dados_form, $resultado, $erros;
    
    $dados_form['inicio'] = $_POST['inicio'] ?? '';
    $dados_form['fim'] = $_POST['fim'] ?? '';
    
    if (validarInteiro($dados_form['inicio'], 'Início') && validarInteiro($dados_form['fim'], 'Fim')) {
        $inicio = intval($dados_form['inicio']);
        $fim = intval($dados_form['fim']);
        
        if ($inicio >= $fim) {
            $erros[] = "O início deve ser menor que o fim.";
        } else {
            $pares = [];
            for ($i = $inicio; $i <= $fim; $i++) {
                if ($i % 2 == 0) $pares[] = $i;
            }
            $resultado = "🔢 <strong>Pares entre $inicio e $fim:</strong> " . implode(', ', $pares);
        }
    }
}

function processarMediaValores() {
    global $dados_form, $resultado, $erros;
    
    $notas_validas = [];
    for ($i = 0; $i < 5; $i++) {
        $campo = "nota_" . ($i + 1);
        $dados_form['notas'][$i] = $_POST[$campo] ?? '';
        
        if (validarNota($dados_form['notas'][$i], "Nota " . ($i + 1))) {
            $notas_validas[] = floatval(str_replace(',', '.', $dados_form['notas'][$i]));
        }
    }
    
    if (count($notas_validas) == 5) {
        $media = array_sum($notas_validas) / count($notas_validas);
        $resultado = "📊 <strong>Média das 5 notas:</strong> " . number_format($media, 2, ',', '.');
    }
}

function processarListaCompras() {
    global $dados_form, $resultado;
    
    $dados_form['itens_selecionados'] = $_POST['itens'] ?? [];
    
    if (count($dados_form['itens_selecionados']) > 0) {
        $resultado = "🛒 <strong>Itens selecionados:</strong><br>• " . implode('<br>• ', $dados_form['itens_selecionados']);
    } else {
        $resultado = "🛒 Nenhum item selecionado.";
    }
}

function processarMaiorValor() {
    global $dados_form, $resultado, $erros;
    
    $numeros_validos = [];
    for ($i = 0; $i < 5; $i++) {
        $campo = "num_array_" . ($i + 1);
        $dados_form['numeros_array'][$i] = $_POST[$campo] ?? '';
        
        if (validarFloat($dados_form['numeros_array'][$i], "Número " . ($i + 1))) {
            $numeros_validos[] = floatval(str_replace(',', '.', $dados_form['numeros_array'][$i]));
        }
    }
    
    if (count($numeros_validos) == 5) {
        $maior = max($numeros_validos);
        $resultado = "🏆 <strong>Maior número:</strong> $maior";
    }
}

// FUNÇÕES AUXILIARES DE VALIDAÇÃO
function validarFloat($valor, $campo, $min = 0.01) {
    global $erros;
    
    if (empty(trim($valor))) {
        $erros[] = "$campo é obrigatório.";
        return false;
    }
    
    $valor_float = str_replace(',', '.', trim($valor));
    if (!is_numeric($valor_float) || floatval($valor_float) < $min) {
        $erros[] = "$campo inválido. Deve ser um número positivo.";
        return false;
    }
    
    return true;
}

function validarInteiro($valor, $campo, $min = null, $max = null) {
    global $erros;
    
    if (empty(trim($valor))) {
        $erros[] = "$campo é obrigatório.";
        return false;
    }
    
    if (!is_numeric(trim($valor)) || intval(trim($valor)) != trim($valor)) {
        $erros[] = "$campo deve ser um número inteiro.";
        return false;
    }
    
    $numero = intval(trim($valor));
    
    if ($min !== null && $numero < $min) {
        $erros[] = "$campo deve ser no mínimo $min.";
        return false;
    }
    
    if ($max !== null && $numero > $max) {
        $erros[] = "$campo deve ser no máximo $max.";
        return false;
    }
    
    return true;
}

function validarNota($valor, $campo) {
    global $erros;
    
    if (empty(trim($valor))) {
        $erros[] = "$campo é obrigatória.";
        return false;
    }
    
    $valor_float = str_replace(',', '.', trim($valor));
    if (!is_numeric($valor_float) || floatval($valor_float) < 0 || floatval($valor_float) > 10) {
        $erros[] = "$campo inválida. Deve ser entre 0 e 10.";
        return false;
    }
    
    return true;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Portal de Exercícios PHP</title>
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
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        
        .header p {
            font-size: 1.2em;
            opacity: 0.9;
        }
        
        .content {
            display: flex;
            min-height: 600px;
        }
        
        .sidebar {
            width: 300px;
            background: #f8f9fa;
            padding: 20px;
            border-right: 1px solid #e9ecef;
        }
        
        .bloco {
            margin-bottom: 25px;
        }
        
        .bloco h3 {
            color: #2c3e50;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
            font-size: 1.1em;
        }
        
        .exercicio-link {
            display: block;
            padding: 12px 15px;
            margin: 8px 0;
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            text-decoration: none;
            color: #495057;
            transition: all 0.3s ease;
            font-size: 0.95em;
        }
        
        .exercicio-link:hover, .exercicio-link.active {
            background: #3498db;
            color: white;
            border-color: #3498db;
            transform: translateX(5px);
        }
        
        .main-content {
            flex: 1;
            padding: 30px;
            background: white;
        }
        
        .exercicio-container {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .exercicio-title {
            color: #2c3e50;
            margin-bottom: 25px;
            font-size: 1.8em;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #495057;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #3498db;
        }
        
        .btn {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }
        
        .resultado {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
            font-size: 1.1em;
        }
        
        .erro {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
        
        .checkbox-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin: 15px 0;
        }
        
        .checkbox-item {
            display: flex;
            align-items: center;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 6px;
        }
        
        .checkbox-item input {
            margin-right: 10px;
        }
        
        .home-content {
            text-align: center;
            padding: 50px 20px;
        }
        
        .home-icon {
            font-size: 4em;
            margin-bottom: 20px;
            color: #3498db;
        }
        
        .home-content h2 {
            color: #2c3e50;
            margin-bottom: 15px;
        }
        
        .home-content p {
            color: #6c757d;
            font-size: 1.1em;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚀 Portal de Exercícios PHP</h1>
            <p>15 exercícios práticos de lógica de programação</p>
        </div>
        
        <div class="content">
            <!-- Sidebar de Navegação -->
            <div class="sidebar">
                <a href="?exercicio=home" class="exercicio-link <?= $exercicio_atual == 'home' ? 'active' : '' ?>">
                    🏠 Página Inicial
                </a>
                
                <div class="bloco">
                    <h3>📊 Algoritmos Sequenciais</h3>
                    <a href="?exercicio=1_conversor_moedas" class="exercicio-link <?= $exercicio_atual == '1_conversor_moedas' ? 'active' : '' ?>">1. Conversor de Moedas</a>
                    <a href="?exercicio=2_area_perimetro" class="exercicio-link <?= $exercicio_atual == '2_area_perimetro' ? 'active' : '' ?>">2. Área e Perímetro</a>
                    <a href="?exercicio=3_consumo_combustivel" class="exercicio-link <?= $exercicio_atual == '3_consumo_combustivel' ? 'active' : '' ?>">3. Consumo de Combustível</a>
                </div>
                
                <div class="bloco">
                    <h3>🔀 Condicionais (if/else)</h3>
                    <a href="?exercicio=4_situacao_aluno" class="exercicio-link <?= $exercicio_atual == '4_situacao_aluno' ? 'active' : '' ?>">4. Situação do Aluno</a>
                    <a href="?exercicio=5_verificador_idade" class="exercicio-link <?= $exercicio_atual == '5_verificador_idade' ? 'active' : '' ?>">5. Verificador de Idade</a>
                    <a href="?exercicio=6_par_impar" class="exercicio-link <?= $exercicio_atual == '6_par_impar' ? 'active' : '' ?>">6. Par ou Ímpar</a>
                </div>
                
                <div class="bloco">
                    <h3>🔄 Condicionais (switch)</h3>
                    <a href="?exercicio=7_dia_semana" class="exercicio-link <?= $exercicio_atual == '7_dia_semana' ? 'active' : '' ?>">7. Dia da Semana</a>
                    <a href="?exercicio=8_calculadora_simples" class="exercicio-link <?= $exercicio_atual == '8_calculadora_simples' ? 'active' : '' ?>">8. Calculadora Simples</a>
                    <a href="?exercicio=9_mes_extenso" class="exercicio-link <?= $exercicio_atual == '9_mes_extenso' ? 'active' : '' ?>">9. Mês por Extenso</a>
                </div>
                
                <div class="bloco">
                    <h3>🔄 Laços de Repetição</h3>
                    <a href="?exercicio=10_fatorial" class="exercicio-link <?= $exercicio_atual == '10_fatorial' ? 'active' : '' ?>">10. Fatorial</a>
                    <a href="?exercicio=11_somatorio" class="exercicio-link <?= $exercicio_atual == '11_somatorio' ? 'active' : '' ?>">11. Somatório</a>
                    <a href="?exercicio=12_pares_intervalo" class="exercicio-link <?= $exercicio_atual == '12_pares_intervalo' ? 'active' : '' ?>">12. Pares no Intervalo</a>
                </div>
                
                <div class="bloco">
                    <h3>📊 Arrays</h3>
                    <a href="?exercicio=13_media_valores" class="exercicio-link <?= $exercicio_atual == '13_media_valores' ? 'active' : '' ?>">13. Média de Valores</a>
                    <a href="?exercicio=14_lista_compras" class="exercicio-link <?= $exercicio_atual == '14_lista_compras' ? 'active' : '' ?>">14. Lista de Compras</a>
                    <a href="?exercicio=15_maior_valor" class="exercicio-link <?= $exercicio_atual == '15_maior_valor' ? 'active' : '' ?>">15. Maior Valor</a>
                </div>
            </div>
            
            <!-- Conteúdo Principal -->
            <div class="main-content">
                <div class="exercicio-container">
                    <?php if ($exercicio_atual == 'home'): ?>
                        <div class="home-content">
                            <div class="home-icon">🚀</div>
                            <h2>Bem-vindo ao Portal de Exercícios PHP!</h2>
                            <p>Selecione um exercício no menu lateral para começar.</p>
                            <p>Este portal contém 15 exercícios práticos organizados por nível de complexidade.</p>
                        </div>
                    
                    <?php else: ?>
                        <!-- Formulários dos Exercícios -->
                        <form method="post" class="exercicio-form">
                            <input type="hidden" name="exercicio" value="<?= $exercicio_atual ?>">
                            
                            <?php switch($exercicio_atual): 
                                
                                case '1_conversor_moedas': ?>
                                    <h2 class="exercicio-title">💰 Conversor de Moedas</h2>
                                    <div class="form-group">
                                        <label for="reais">Valor em Reais (R$):</label>
                                        <input type="text" id="reais" name="reais" class="form-control" 
                                               placeholder="Ex: 100,00" value="<?= htmlspecialchars($dados_form['reais']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="cotacao">Cotação do Dólar:</label>
                                        <input type="text" id="cotacao" name="cotacao" class="form-control" 
                                               placeholder="Ex: 5,12" value="<?= htmlspecialchars($dados_form['cotacao']) ?>">
                                    </div>
                                    <button type="submit" class="btn">Converter</button>
                                    <?php break; ?>
                                
                                <?php case '2_area_perimetro': ?>
                                    <h2 class="exercicio-title">📐 Área e Perímetro</h2>
                                    <div class="form-group">
                                        <label for="base">Base (m):</label>
                                        <input type="text" id="base" name="base" class="form-control" 
                                               placeholder="Ex: 5,0" value="<?= htmlspecialchars($dados_form['base']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="altura">Altura (m):</label>
                                        <input type="text" id="altura" name="altura" class="form-control" 
                                               placeholder="Ex: 3,0" value="<?= htmlspecialchars($dados_form['altura']) ?>">
                                    </div>
                                    <button type="submit" class="btn">Calcular</button>
                                    <?php break; ?>
                                
                                <!-- CONTINUAÇÃO DOS OUTROS CASES -->
                                <?php case '3_consumo_combustivel': ?>
                                    <h2 class="exercicio-title">⛽ Consumo de Combustível</h2>
                                    <div class="form-group">
                                        <label for="distancia">Distância (Km):</label>
                                        <input type="text" id="distancia" name="distancia" class="form-control" 
                                               placeholder="Ex: 350,5" value="<?= htmlspecialchars($dados_form['distancia']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="combustivel">Combustível (L):</label>
                                        <input type="text" id="combustivel" name="combustivel" class="form-control" 
                                               placeholder="Ex: 42,3" value="<?= htmlspecialchars($dados_form['combustivel']) ?>">
                                    </div>
                                    <button type="submit" class="btn">Calcular Consumo</button>
                                    <?php break; ?>
                                
                                <?php case '4_situacao_aluno': ?>
                                    <h2 class="exercicio-title">📊 Situação do Aluno</h2>
                                    <div class="form-group">
                                        <label for="n1">Nota 1:</label>
                                        <input type="text" id="n1" name="n1" class="form-control" 
                                               placeholder="0 a 10" value="<?= htmlspecialchars($dados_form['n1']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="n2">Nota 2:</label>
                                        <input type="text" id="n2" name="n2" class="form-control" 
                                               placeholder="0 a 10" value="<?= htmlspecialchars($dados_form['n2']) ?>">
                                    </div>
                                    <button type="submit" class="btn">Verificar Situação</button>
                                    <?php break; ?>
                                
                                <?php case '5_verificador_idade': ?>
                                    <h2 class="exercicio-title">👤 Verificador de Idade</h2>
                                    <div class="form-group">
                                        <label for="ano_nascimento">Ano de Nascimento:</label>
                                        <input type="text" id="ano_nascimento" name="ano_nascimento" class="form-control" 
                                               placeholder="Ex: 1990" value="<?= htmlspecialchars($dados_form['ano_nascimento']) ?>">
                                    </div>
                                    <button type="submit" class="btn">Verificar Situação</button>
                                    <?php break; ?>
                                
                                <?php case '6_par_impar': ?>
                                    <h2 class="exercicio-title">🔢 Par ou Ímpar</h2>
                                    <div class="form-group">
                                        <label for="numero">Número:</label>
                                        <input type="text" id="numero" name="numero" class="form-control" 
                                               placeholder="Digite um número" value="<?= htmlspecialchars($dados_form['numero']) ?>">
                                    </div>
                                    <button type="submit" class="btn">Verificar</button>
                                    <?php break; ?>
                                
                                <?php case '7_dia_semana': ?>
                                    <h2 class="exercicio-title">📅 Dia da Semana</h2>
                                    <div class="form-group">
                                        <label for="numero_dia">Número (1-7):</label>
                                        <input type="number" id="numero_dia" name="numero_dia" class="form-control" 
                                               min="1" max="7" placeholder="1 a 7" value="<?= htmlspecialchars($dados_form['numero_dia']) ?>">
                                    </div>
                                    <button type="submit" class="btn">Descobrir Dia</button>
                                    <?php break; ?>
                                
                                <?php case '8_calculadora_simples': ?>
                                    <h2 class="exercicio-title">🧮 Calculadora Simples</h2>
                                    <div class="form-group">
                                        <label for="calc_n1">Número 1:</label>
                                        <input type="text" id="calc_n1" name="calc_n1" class="form-control" 
                                               value="<?= htmlspecialchars($dados_form['calc_n1']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="calc_n2">Número 2:</label>
                                        <input type="text" id="calc_n2" name="calc_n2" class="form-control" 
                                               value="<?= htmlspecialchars($dados_form['calc_n2']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="operacao">Operação:</label>
                                        <select id="operacao" name="operacao" class="form-control">
                                            <option value="">Selecione...</option>
                                            <option value="somar" <?= $dados_form['operacao'] == 'somar' ? 'selected' : '' ?>>Somar</option>
                                            <option value="subtrair" <?= $dados_form['operacao'] == 'subtrair' ? 'selected' : '' ?>>Subtrair</option>
                                            <option value="multiplicar" <?= $dados_form['operacao'] == 'multiplicar' ? 'selected' : '' ?>>Multiplicar</option>
                                            <option value="dividir" <?= $dados_form['operacao'] == 'dividir' ? 'selected' : '' ?>>Dividir</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn">Calcular</button>
                                    <?php break; ?>
                                
                                <?php case '9_mes_extenso': ?>
                                    <h2 class="exercicio-title">📆 Mês por Extenso</h2>
                                    <div class="form-group">
                                        <label for="numero_mes">Número do Mês:</label>
                                        <input type="number" id="numero_mes" name="numero_mes" class="form-control" 
                                               min="1" max="12" placeholder="1 a 12" value="<?= htmlspecialchars($dados_form['numero_mes']) ?>">
                                    </div>
                                    <button type="submit" class="btn">Descobrir Mês</button>
                                    <?php break; ?>
                                
                                <?php case '10_fatorial': ?>
                                    <h2 class="exercicio-title">🔢 Fatorial</h2>
                                    <div class="form-group">
                                        <label for="fatorial_num">Número:</label>
                                        <input type="number" id="fatorial_num" name="fatorial_num" class="form-control" 
                                               min="0" max="20" placeholder="0 a 20" value="<?= htmlspecialchars($dados_form['fatorial_num']) ?>">
                                    </div>
                                    <button type="submit" class="btn">Calcular Fatorial</button>
                                    <?php break; ?>
                                
                                <?php case '11_somatorio': ?>
                                    <h2 class="exercicio-title">∑ Somatório</h2>
                                    <div class="form-group">
                                        <label for="somatorio_num">Número (N):</label>
                                        <input type="number" id="somatorio_num" name="somatorio_num" class="form-control" 
                                               min="1" placeholder="Digite um número" value="<?= htmlspecialchars($dados_form['somatorio_num']) ?>">
                                    </div>
                                    <button type="submit" class="btn">Calcular Somatório</button>
                                    <?php break; ?>
                                
                                <?php case '12_pares_intervalo': ?>
                                    <h2 class="exercicio-title">🔢 Pares no Intervalo</h2>
                                    <div class="form-group">
                                        <label for="inicio">Início:</label>
                                        <input type="number" id="inicio" name="inicio" class="form-control" 
                                               placeholder="Número inicial" value="<?= htmlspecialchars($dados_form['inicio']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="fim">Fim:</label>
                                        <input type="number" id="fim" name="fim" class="form-control" 
                                               placeholder="Número final" value="<?= htmlspecialchars($dados_form['fim']) ?>">
                                    </div>
                                    <button type="submit" class="btn">Encontrar Pares</button>
                                    <?php break; ?>
                                
                                <?php case '13_media_valores': ?>
                                    <h2 class="exercicio-title">📊 Média de 5 Valores</h2>
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <div class="form-group">
                                            <label for="nota_<?= $i + 1 ?>">Nota <?= $i + 1 ?>:</label>
                                            <input type="text" id="nota_<?= $i + 1 ?>" name="nota_<?= $i + 1 ?>" class="form-control" 
                                                   placeholder="0 a 10" value="<?= htmlspecialchars($dados_form['notas'][$i]) ?>">
                                        </div>
                                    <?php endfor; ?>
                                    <button type="submit" class="btn">Calcular Média</button>
                                    <?php break; ?>
                                
                                <?php case '14_lista_compras': ?>
                                    <h2 class="exercicio-title">🛒 Lista de Compras</h2>
                                    <div class="checkbox-group">
                                        <?php 
                                        $itens = ['Arroz', 'Feijão', 'Leite', 'Ovos', 'Pão', 'Carne', 'Frutas', 'Verduras'];
                                        foreach ($itens as $item): ?>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="item_<?= $item ?>" name="itens[]" value="<?= $item ?>"
                                                       <?= in_array($item, $dados_form['itens_selecionados']) ? 'checked' : '' ?>>
                                                <label for="item_<?= $item ?>"><?= $item ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <button type="submit" class="btn">Salvar Lista</button>
                                    <?php break; ?>
                                
                                <?php case '15_maior_valor': ?>
                                    <h2 class="exercicio-title">🏆 Maior Valor</h2>
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <div class="form-group">
                                            <label for="num_array_<?= $i + 1 ?>">Número <?= $i + 1 ?>:</label>
                                            <input type="text" id="num_array_<?= $i + 1 ?>" name="num_array_<?= $i + 1 ?>" class="form-control" 
                                                   value="<?= htmlspecialchars($dados_form['numeros_array'][$i]) ?>">
                                        </div>
                                    <?php endfor; ?>
                                    <button type="submit" class="btn">Encontrar Maior</button>
                                    <?php break; ?>
                                
                            <?php endswitch; ?>
                        </form>
                        
                        <!-- Exibir Resultados e Erros -->
                        <?php if (!empty($resultado)): ?>
                            <div class="resultado"><?= $resultado ?></div>
                        <?php endif; ?>
                        
                        <?php if (count($erros) > 0): ?>
                           <div class="erro">
                                <strong>Erros encontrados:</strong><br>
                                <?php foreach ($erros as $erro): ?>
                                    • <?= $erro ?><br>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>