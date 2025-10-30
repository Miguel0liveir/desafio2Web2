<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados dos Exercícios de PHP</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
            color: #212529;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            overflow: hidden; /* Para conter o box-shadow */
        }
        h1 {
            background-color: #007bff;
            color: white;
            padding: 20px;
            margin: 0;
            text-align: center;
        }
        .exercicio {
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
        }
        .exercicio:last-child {
            border-bottom: none;
        }
        .exercicio h3 {
            margin-top: 0;
            color: #0056b3;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }
        .resultado {
            background-color: #e9f5ff;
            border: 1px solid #b3d7ff;
            padding: 10px 15px;
            border-radius: 4px;
            margin-top: 10px;
        }
        .resultado strong {
            color: #004a99;
        }
        code {
            background-color: #e8e8e8;
            padding: 2px 5px;
            border-radius: 3px;
        }
        ul, ol {
            padding-left: 20px;
        }
        .categoria {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            margin: 20px -20px 10px -20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultados dos Exercícios de PHP</h1>

        <?php
        // =============================================
        // SEQUENCIAIS (VARIÁVEIS E OPERADORES)
        // =============================================
        echo "<div class='categoria'>SEQUENCIAIS (VARIÁVEIS E OPERADORES)</div>";
        
        // Exercício 1: Soma
        echo "<div class='exercicio'>";
        echo "<h3>1. Soma de Dois Números</h3>";
        $num1 = 15;
        $num2 = 25;
        $soma = $num1 + $num2;
        echo "<p>Valores: <code>$num1</code> e <code>$num2</code></p>";
        echo "<div class='resultado'>Resultado: <strong>$num1 + $num2 = $soma</strong></div>";
        echo "</div>";
        
        // Exercício 2: Média
        echo "<div class='exercicio'>";
        echo "<h3>2. Média Aritmética</h3>";
        $nota1 = 7.5;
        $nota2 = 8.0;
        $nota3 = 6.5;
        $media = ($nota1 + $nota2 + $nota3) / 3;
        echo "<p>Notas: <code>$nota1</code>, <code>$nota2</code>, <code>$nota3</code></p>";
        echo "<div class='resultado'>Média: <strong>" . number_format($media, 2) . "</strong></div>";
        echo "</div>";
        
        // Exercício 3: Metros para Centímetros
        echo "<div class='exercicio'>";
        echo "<h3>3. Conversão Metros → Centímetros</h3>";
        $metros = 2.5;
        $centimetros = $metros * 100;
        echo "<p>Metros: <code>$metros</code></p>";
        echo "<div class='resultado'>Resultado: <strong>$metros m = $centimetros cm</strong></div>";
        echo "</div>";
        
        // Exercício 4: Área do Retângulo
        echo "<div class='exercicio'>";
        echo "<h3>4. Área do Retângulo</h3>";
        $base = 10;
        $altura = 5;
        $area = $base * $altura;
        echo "<p>Base: <code>$base</code>, Altura: <code>$altura</code></p>";
        echo "<div class='resultado'>Área: <strong>$area cm²</strong></div>";
        echo "</div>";
        
        // =============================================
        // CONDICIONAIS (IF/ELSE)
        // =============================================
        echo "<div class='categoria'>CONDICIONAIS (IF/ELSE)</div>";
        
        // Exercício 5: Positivo ou Negativo
        echo "<div class='exercicio'>";
        echo "<h3>5. Positivo ou Negativo</h3>";
        $numero = -7;
        $resultado = "";
        if ($numero > 0) {
            $resultado = "POSITIVO";
        } elseif ($numero < 0) {
            $resultado = "NEGATIVO";
        } else {
            $resultado = "ZERO";
        }
        echo "<p>Número: <code>$numero</code></p>";
        echo "<div class='resultado'>Resultado: <strong>$resultado</strong></div>";
        echo "</div>";
        
        // Exercício 6: Maioridade
        echo "<div class='exercicio'>";
        echo "<h3>6. Verificação de Maioridade</h3>";
        $idade = 16;
        $situacao = ($idade >= 18) ? "MAIOR de idade" : "MENOR de idade";
        echo "<p>Idade: <code>$idade</code> anos</p>";
        echo "<div class='resultado'>Situação: <strong>$situacao</strong></div>";
        echo "</div>";
        
        // Exercício 7: Aprovação
        echo "<div class='exercicio'>";
        echo "<h3>7. Verificação de Aprovação</h3>";
        $media_final = 5.8;
        $status = ($media_final >= 6.0) ? "APROVADO" : "REPROVADO";
        echo "<p>Média: <code>" . number_format($media_final, 1) . "</code></p>";
        echo "<div class='resultado'>Status: <strong>$status</strong></div>";
        echo "</div>";
        
        // Exercício 8: Maior de Dois
        echo "<div class='exercicio'>";
        echo "<h3>8. Maior de Dois Números</h3>";
        $a = 15;
        $b = 22;
        $maior = ($a > $b) ? $a : $b;
        echo "<p>Números: <code>$a</code> e <code>$b</code></p>";
        echo "<div class='resultado'>Maior número: <strong>$maior</strong></div>";
        echo "</div>";
        
        // =============================================
        // CONDICIONAIS (SWITCH CASE)
        // =============================================
        echo "<div class='categoria'>CONDICIONAIS (SWITCH CASE)</div>";
        
        // Exercício 9: Dia da Semana
        echo "<div class='exercicio'>";
        echo "<h3>9. Dia da Semana</h3>";
        $dia_numero = 3;
        $dia_nome = "";
        switch ($dia_numero) {
            case 1: $dia_nome = "Domingo"; break;
            case 2: $dia_nome = "Segunda-feira"; break;
            case 3: $dia_nome = "Terça-feira"; break;
            case 4: $dia_nome = "Quarta-feira"; break;
            case 5: $dia_nome = "Quinta-feira"; break;
            case 6: $dia_nome = "Sexta-feira"; break;
            case 7: $dia_nome = "Sábado"; break;
            default: $dia_nome = "Número inválido";
        }
        echo "<p>Número: <code>$dia_numero</code></p>";
        echo "<div class='resultado'>Dia correspondente: <strong>$dia_nome</strong></div>";
        echo "</div>";
        
        // Exercício 10: Vogal ou Consoante
        echo "<div class='exercicio'>";
        echo "<h3>10. Vogal ou Consoante</h3>";
        $letra = "B";
        $letra_min = strtolower($letra);
        $tipo = "";
        switch ($letra_min) {
            case 'a': case 'e': case 'i': case 'o': case 'u':
                $tipo = "VOGAL";
                break;
            default:
                $tipo = "CONSOANTE";
        }
        echo "<p>Letra: <code>$letra</code></p>";
        echo "<div class='resultado'>Tipo: <strong>$tipo</strong></div>";
        echo "</div>";
        
        // Exercício 11: Status do Pedido
        echo "<div class='exercicio'>";
        echo "<h3>11. Status do Pedido</h3>";
        $status_pedido = "enviado";
        $mensagem = "";
        switch ($status_pedido) {
            case "aguardando":
                $mensagem = "⏳ Seu pedido está aguardando processamento";
                break;
            case "em_preparacao":
                $mensagem = "👨‍🍳 Seu pedido está sendo preparado";
                break;
            case "enviado":
                $mensagem = "🚚 Seu pedido foi enviado!";
                break;
            case "concluido":
                $mensagem = "✅ Pedido concluído! Obrigado pela compra!";
                break;
            default:
                $mensagem = "Status desconhecido";
        }
        echo "<p>Status: <code>$status_pedido</code></p>";
        echo "<div class='resultado'>Mensagem: <strong>$mensagem</strong></div>";
        echo "</div>";
        
        // =============================================
        // LAÇOS DE REPETIÇÃO (FOR)
        // =============================================
        echo "<div class='categoria'>LAÇOS DE REPETIÇÃO (FOR)</div>";
        
        // Exercício 12: Contagem 1-10
        echo "<div class='exercicio'>";
        echo "<h3>12. Contagem de 1 a 10</h3>";
        echo "<div class='resultado'>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<strong>$i </strong>";
        }
        echo "</div>";
        echo "</div>";
        
        // Exercício 13: Pares de 1 a 20
        echo "<div class='exercicio'>";
        echo "<h3>13. Números Pares (1-20)</h3>";
        echo "<div class='resultado'>";
        for ($i = 2; $i <= 20; $i += 2) {
            echo "<strong>$i </strong>";
        }
        echo "</div>";
        echo "</div>";
        
        // Exercício 14: Tabuada
        echo "<div class='exercicio'>";
        echo "<h3>14. Tabuada</h3>";
        $numero_tabuada = 7;
        echo "<p>Número: <code>$numero_tabuada</code></p>";
        echo "<div class='resultado'>";
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numero_tabuada * $i;
            echo "$numero_tabuada × $i = <strong>$resultado</strong><br>";
        }
        echo "</div>";
        echo "</div>";
        
        // =============================================
        // LAÇOS DE REPETIÇÃO (WHILE)
        // =============================================
        echo "<div class='categoria'>LAÇOS DE REPETIÇÃO (WHILE)</div>";
        
        // Exercício 15: Contagem Regressiva
        echo "<div class='exercicio'>";
        echo "<h3>15. Contagem Regressiva</h3>";
        echo "<div class='resultado'>";
        $contador = 10;
        while ($contador >= 1) {
            echo "<strong>$contador </strong>";
            $contador--;
        }
        echo "🎉 Fogo!";
        echo "</div>";
        echo "</div>";
        
        // Exercício 16: Soma até 100
        echo "<div class='exercicio'>";
        echo "<h3>16. Soma de 1 até 100</h3>";
        $soma_total = 0;
        $i = 1;
        while ($i <= 100) {
            $soma_total += $i;
            $i++;
        }
        echo "<div class='resultado'>Soma de 1 a 100 = <strong>$soma_total</strong></div>";
        echo "</div>";
        
        // =============================================
        // LAÇOS DE REPETIÇÃO (DO WHILE)
        // =============================================
        echo "<div class='categoria'>LAÇOS DE REPETIÇÃO (DO WHILE)</div>";
        
        // Exercício 17: Sorteio Simples
        echo "<div class='exercicio'>";
        echo "<h3>17. Sorteio até Sair 5</h3>";
        $tentativas = 0;
        $numero_sorteado = 0;
        echo "<div class='resultado'>";
        do {
            $numero_sorteado = rand(1, 10);
            $tentativas++;
            echo "Tentativa $tentativas: <strong>$numero_sorteado</strong><br>";
        } while ($numero_sorteado != 5);
        echo "🎯 Número 5 encontrado após <strong>$tentativas</strong> tentativas!</div>";
        echo "</div>";
        
        // =============================================
        // ARRAYS (VETORES)
        // =============================================
        echo "<div class='categoria'>ARRAYS (VETORES)</div>";
        
        // Exercício 18: Lista de Frutas
        echo "<div class='exercicio'>";
        echo "<h3>18. Lista de Frutas</h3>";
        $frutas = ["Maçã", "Banana", "Laranja", "Uva", "Morango"];
        echo "<div class='resultado'><strong>Lista de Frutas:</strong><ul>";
        foreach ($frutas as $fruta) {
            echo "<li>$fruta</li>";
        }
        echo "</ul></div>";
        echo "</div>";
        
        // Exercício 19: Soma de Array
        echo "<div class='exercicio'>";
        echo "<h3>19. Soma de Array</h3>";
        $numeros = [10, 20, 30, 40, 50];
        $soma_array = array_sum($numeros);
        echo "<p>Array: <code>[" . implode(", ", $numeros) . "]</code></p>";
        echo "<div class='resultado'>Soma total = <strong>$soma_array</strong></div>";
        echo "</div>";
        
        // Exercício 20: Array Associativo
        echo "<div class='exercicio'>";
        echo "<h3>20. Array Associativo - Aluno</h3>";
        $aluno = [
            "nome" => "Carlos Silva",
            "idade" => 20,
            "curso" => "Análise e Desenvolvimento de Sistemas"
        ];
        echo "<div class='resultado'>";
        echo "<strong>Dados do Aluno:</strong><br>";
        echo "Nome: <strong>{$aluno['nome']}</strong><br>";
        echo "Idade: <strong>{$aluno['idade']} anos</strong><br>";
        echo "Curso: <strong>{$aluno['curso']}</strong>";
        echo "</div>";
        echo "</div>";
        ?>
    </div>
</body>
</html>