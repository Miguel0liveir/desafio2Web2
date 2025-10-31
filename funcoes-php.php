<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções Essenciais do PHP - Exemplos Práticos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            line-height: 1.6;
            padding: 20px;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        header {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            color: white;
            padding: 40px 20px;
            text-align: center;
        }
        
        header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        
        header p {
            font-size: 1.2em;
            opacity: 0.9;
        }
        
        .categorias {
            padding: 30px;
        }
        
        .categoria {
            margin-bottom: 40px;
            padding: 25px;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 5px solid #3498db;
        }
        
        .categoria h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 1.8em;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        
        .funcao {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .funcao:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-color: #3498db;
        }
        
        .funcao h3 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 1.3em;
        }
        
        .descricao {
            background: #e9f5ff;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
            border-left: 4px solid #3498db;
            font-style: italic;
        }
        
        .codigo {
            background: #2d3748;
            color: #e2e8f0;
            padding: 15px;
            border-radius: 6px;
            font-family: 'Courier New', monospace;
            margin: 10px 0;
            overflow-x: auto;
            font-size: 0.9em;
        }
        
        .resultado {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 15px;
            border-radius: 6px;
            margin-top: 10px;
            font-family: 'Courier New', monospace;
        }
        
        .resultado strong {
            color: #155724;
        }
        
        .exemplo-real {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 25px;
            border-radius: 8px;
            margin-top: 30px;
        }
        
        .exemplo-real h3 {
            color: #856404;
            margin-bottom: 15px;
        }
        
        footer {
            text-align: center;
            padding: 20px;
            background: #2c3e50;
            color: white;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>🧩 Funções Essenciais do PHP</h1>
            <p>Exemplos Práticos e Completos</p>
        </header>

        <div class="categorias">
            <!-- FUNÇÕES DE STRING -->
            <div class="categoria">
                <h2>📝 Funções Essenciais de Strings</h2>
                
                <div class="funcao">
                    <h3>1. strlen() - Contar caracteres</h3>
                    <div class="descricao">Conta o número de caracteres em uma string</div>
                    <div class="codigo">
                        $texto = "Olá, mundo!";<br>
                        echo strlen($texto);
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $texto = "Olá, mundo!";
                        echo "String: '$texto'<br>";
                        echo "Tamanho: " . strlen($texto) . " caracteres";
                        ?>
                    </div>
                </div>

                <div class="funcao">
                    <h3>2. str_replace() - Substituir texto</h3>
                    <div class="descricao">Substitui todas as ocorrências de uma string por outra</div>
                    <div class="codigo">
                        $frase = "Eu gosto de maçã.";<br>
                        $nova_frase = str_replace("maçã", "banana", $frase);<br>
                        echo $nova_frase;
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $frase = "Eu gosto de maçã.";
                        $nova_frase = str_replace("maçã", "banana", $frase);
                        echo $nova_frase;
                        ?>
                    </div>
                </div>

                <div class="funcao">
                    <h3>3. substr() - Extrair parte da string</h3>
                    <div class="descricao">Retorna uma parte (substring) de uma string</div>
                    <div class="codigo">
                        $email = "contato@exemplo.com";<br>
                        $usuario = substr($email, 0, 7);<br>
                        $dominio = substr($email, 8);<br>
                        echo "Usuário: $usuario, Domínio: $dominio";
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $email = "contato@exemplo.com";
                        $usuario = substr($email, 0, 7);
                        $dominio = substr($email, 8);
                        echo "Usuário: <strong>$usuario</strong>, Domínio: <strong>$dominio</strong>";
                        ?>
                    </div>
                </div>

                <div class="funcao">
                    <h3>4. strtolower() e strtoupper() - Converter case</h3>
                    <div class="descricao">Converte para minúsculas e maiúsculas</div>
                    <div class="codigo">
                        $texto = "Isso É Um TESTE";<br>
                        echo strtolower($texto) . "&lt;br&gt;";<br>
                        echo strtoupper($texto);
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $texto = "Isso É Um TESTE";
                        echo strtolower($texto) . "<br>";
                        echo strtoupper($texto);
                        ?>
                    </div>
                </div>

                <div class="funcao">
                    <h3>5. explode() e implode() - Dividir e juntar</h3>
                    <div class="descricao">Divide string em array e junta array em string</div>
                    <div class="codigo">
                        $data = "29-10-2025";<br>
                        $partes = explode("-", $data);<br>
                        $lista = implode(", ", ["Maçã", "Banana", "Laranja"]);<br>
                        echo "Dia: {$partes[0]}, Lista: $lista";
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $data = "29-10-2025";
                        $partes = explode("-", $data);
                        $lista = implode(", ", ["Maçã", "Banana", "Laranja"]);
                        echo "Dia: <strong>{$partes[0]}</strong>, Lista: <strong>$lista</strong>";
                        ?>
                    </div>
                </div>
            </div>

            <!-- FUNÇÕES NUMÉRICAS -->
            <div class="categoria">
                <h2>🔢 Funções Numéricas e Matemáticas</h2>
                
                <div class="funcao">
                    <h3>1. number_format() - Formatar números</h3>
                    <div class="descricao">Formata números com separadores de milhares e decimais</div>
                    <div class="codigo">
                        $preco = 1250.75;<br>
                        echo number_format($preco, 2, ',', '.');<br>
                        echo number_format($preco);
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $preco = 1250.75;
                        echo "Formato BR: <strong>" . number_format($preco, 2, ',', '.') . "</strong><br>";
                        echo "Formato simples: <strong>" . number_format($preco) . "</strong>";
                        ?>
                    </div>
                </div>

                <div class="funcao">
                    <h3>2. round(), ceil(), floor() - Arredondamentos</h3>
                    <div class="descricao">Diferentes tipos de arredondamento</div>
                    <div class="codigo">
                        $num = 4.7;<br>
                        echo "round: " . round($num) . "&lt;br&gt;";<br>
                        echo "ceil: " . ceil($num) . "&lt;br&gt;";<br>
                        echo "floor: " . floor($num);
                    </div>
                    <div class="resultado">
                        <strong>Resultado (para 4.7):</strong><br>
                        <?php
                        $num = 4.7;
                        echo "round: <strong>" . round($num) . "</strong><br>";
                        echo "ceil: <strong>" . ceil($num) . "</strong><br>";
                        echo "floor: <strong>" . floor($num) . "</strong>";
                        ?>
                    </div>
                </div>

                <div class="funcao">
                    <h3>3. rand() e mt_rand() - Números aleatórios</h3>
                    <div class="descricao">Gera números inteiros aleatórios</div>
                    <div class="codigo">
                        echo "Número entre 1-10: " . mt_rand(1, 10) . "&lt;br&gt;";<br>
                        echo "Número entre 1-100: " . mt_rand(1, 100);
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        echo "Número entre 1-10: <strong>" . mt_rand(1, 10) . "</strong><br>";
                        echo "Número entre 1-100: <strong>" . mt_rand(1, 100) . "</strong>";
                        ?>
                    </div>
                </div>

                <div class="funcao">
                    <h3>4. max() e min() - Maior e menor valor</h3>
                    <div class="descricao">Encontra o maior e menor valor em uma lista</div>
                    <div class="codigo">
                        $notas = [7.5, 9.0, 6.2];<br>
                        echo "Maior nota: " . max($notas) . "&lt;br&gt;";<br>
                        echo "Menor nota: " . min($notas);
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $notas = [7.5, 9.0, 6.2];
                        echo "Maior nota: <strong>" . max($notas) . "</strong><br>";
                        echo "Menor nota: <strong>" . min($notas) . "</strong>";
                        ?>
                    </div>
                </div>
            </div>

            <!-- FUNÇÕES DE ARRAY -->
            <div class="categoria">
                <h2>🗂️ Funções Essenciais de Array</h2>
                
                <div class="funcao">
                    <h3>1. count() - Contar elementos</h3>
                    <div class="descricao">Retorna o número de elementos em um array</div>
                    <div class="codigo">
                        $frutas = ["Maçã", "Banana", "Laranja"];<br>
                        echo count($frutas);
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $frutas = ["Maçã", "Banana", "Laranja"];
                        echo "Array: [" . implode(", ", $frutas) . "]<br>";
                        echo "Total de elementos: <strong>" . count($frutas) . "</strong>";
                        ?>
                    </div>
                </div>

                <div class="funcao">
                    <h3>2. array_push() e array_pop() - Adicionar/remover</h3>
                    <div class="descricao">Adiciona e remove elementos do final do array</div>
                    <div class="codigo">
                        $lista = ["Arroz", "Feijão"];<br>
                        array_push($lista, "Macarrão");<br>
                        $ultimo = array_pop($lista);<br>
                        echo "Último removido: $ultimo";
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $lista = ["Arroz", "Feijão"];
                        array_push($lista, "Macarrão");
                        $ultimo = array_pop($lista);
                        echo "Array final: [" . implode(", ", $lista) . "]<br>";
                        echo "Último removido: <strong>$ultimo</strong>";
                        ?>
                    </div>
                </div>

                <div class="funcao">
                    <h3>3. in_array() - Verificar existência</h3>
                    <div class="descricao">Verifica se um valor existe em um array</div>
                    <div class="codigo">
                        $permissoes = ['ler', 'escrever', 'executar'];<br>
                        if (in_array('escrever', $permissoes)) {<br>
                        &nbsp;&nbsp;echo "O usuário pode escrever.";<br>
                        }
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $permissoes = ['ler', 'escrever', 'executar'];
                        if (in_array('escrever', $permissoes)) {
                            echo "✅ O usuário pode escrever.";
                        } else {
                            echo "❌ O usuário não pode escrever.";
                        }
                        ?>
                    </div>
                </div>

                <div class="funcao">
                    <h3>4. array_merge() - Juntar arrays</h3>
                    <div class="descricao">Mescla dois ou mais arrays em um só</div>
                    <div class="codigo">
                        $array1 = ["a", "b"];<br>
                        $array2 = ["c", "d"];<br>
                        $resultado = array_merge($array1, $array2);<br>
                        print_r($resultado);
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $array1 = ["a", "b"];
                        $array2 = ["c", "d"];
                        $resultado = array_merge($array1, $array2);
                        echo "Array merged: ";
                        print_r($resultado);
                        ?>
                    </div>
                </div>
            </div>

            <!-- FUNÇÕES DE DATA -->
            <div class="categoria">
                <h2>📅 Funções de Data e Hora (DateTime)</h2>
                
                <div class="funcao">
                    <h3>1. DateTime e format() - Data atual</h3>
                    <div class="descricao">Obtém e formata a data e hora atual</div>
                    <div class="codigo">
                        $agora = new DateTime();<br>
                        echo $agora->format('d/m/Y H:i:s') . "&lt;br&gt;";<br>
                        echo $agora->format('Y-m-d');
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $agora = new DateTime();
                        echo "Formato BR: <strong>" . $agora->format('d/m/Y H:i:s') . "</strong><br>";
                        echo "Formato ISO: <strong>" . $agora->format('Y-m-d') . "</strong>";
                        ?>
                    </div>
                </div>

                <div class="funcao">
                    <h3>2. modify() - Modificar datas</h3>
                    <div class="descricao">Adiciona ou subtrai tempo de uma data</div>
                    <div class="codigo">
                        $hoje = new DateTime();<br>
                        $hoje->modify('+10 days');<br>
                        echo "Daqui a 10 dias: " . $hoje->format('d/m/Y');
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $hoje = new DateTime();
                        $hoje->modify('+10 days');
                        echo "Daqui a 10 dias será: <strong>" . $hoje->format('d/m/Y') . "</strong>";
                        ?>
                    </div>
                </div>

                <div class="funcao">
                    <h3>3. diff() - Diferença entre datas</h3>
                    <div class="descricao">Calcula a diferença entre duas datas</div>
                    <div class="codigo">
                        $nascimento = new DateTime('1990-05-15');<br>
                        $hoje = new DateTime();<br>
                        $idade = $hoje->diff($nascimento);<br>
                        echo "Idade: " . $idade->y . " anos";
                    </div>
                    <div class="resultado">
                        <strong>Resultado:</strong><br>
                        <?php
                        $nascimento = new DateTime('1990-05-15');
                        $hoje = new DateTime();
                        $idade = $hoje->diff($nascimento);
                        echo "Idade: <strong>" . $idade->y . " anos</strong><br>";
                        echo "Dias totais: <strong>" . $idade->days . " dias</strong>";
                        ?>
                    </div>
                </div>
            </div>

            <!-- EXEMPLO REAL -->
            <div class="exemplo-real">
                <h3>🎯 EXEMPLO REAL: Processamento de Dados de Cliente</h3>
                <div class="codigo">
                    // Dados brutos simulando um formulário<br>
                    $dados_brutos = [<br>
                    &nbsp;&nbsp;'nome' => '   josé da silva   ',<br>
                    &nbsp;&nbsp;'email' => 'JOSE.SILVA@EMAIL.COM',<br>
                    &nbsp;&nbsp;'nasc' => '15/05/1990',<br>
                    &nbsp;&nbsp;'compras' => '120.50, 80.00, 15.75, 250.00, 99.90'<br>
                    ];<br><br>
                    
                    // Processamento com várias funções...<br>
                    $nome_formatado = ucwords(strtolower(trim($dados_brutos['nome'])));<br>
                    $compras_array = explode(',', $dados_brutos['compras']);<br>
                    $total_compras = count($compras_array);<br>
                    $valor_total = array_sum($compras_array);
                </div>
                <div class="resultado">
                    <strong>Relatório do Cliente:</strong><br>
                    <?php
                    // --- EXEMPLO REAL ---
                    $dados_brutos = [
                        'nome' => '   josé da silva   ',
                        'email' => 'JOSE.SILVA@EMAIL.COM',
                        'nasc' => '15/05/1990',
                        'compras' => '120.50, 80.00, 15.75, 250.00, 99.90'
                    ];

                    // Processamento
                    $nome_formatado = ucwords(strtolower(trim($dados_brutos['nome'])));
                    $email_limpo = strtolower($dados_brutos['email']);
                    $compras_array = explode(',', $dados_brutos['compras']);
                    
                    // Datas
                    $nascimento = DateTime::createFromFormat('d/m/Y', $dados_brutos['nasc']);
                    $hoje = new DateTime();
                    $idade = $hoje->diff($nascimento)->y;
                    
                    // Estatísticas
                    $total_compras = count($compras_array);
                    $valor_total = array_sum($compras_array);
                    $media_gasto = round($valor_total / $total_compras, 2);
                    $maior_compra = max($compras_array);
                    $menor_compra = min($compras_array);

                    echo "Nome: <strong>$nome_formatado</strong><br>";
                    echo "Email: <strong>$email_limpo</strong><br>";
                    echo "Idade: <strong>$idade anos</strong><br>";
                    echo "Total de compras: <strong>$total_compras</strong><br>";
                    echo "Valor total: <strong>R$ " . number_format($valor_total, 2, ',', '.') . "</strong><br>";
                    echo "Média por compra: <strong>R$ " . number_format($media_gasto, 2, ',', '.') . "</strong><br>";
                    echo "Maior compra: <strong>R$ " . number_format($maior_compra, 2, ',', '.') . "</strong><br>";
                    echo "Menor compra: <strong>R$ " . number_format($menor_compra, 2, ',', '.') . "</strong>";
                    ?>
                </div>
            </div>
        </div>

        <footer>
            <p>🎓 Funções PHP Essenciais - Exemplos Práticos</p>
            <p><small>Desenvolvido para aprendizado e consulta</small></p>
        </footer>
    </div>
</body>
</html>