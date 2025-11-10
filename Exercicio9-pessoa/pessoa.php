 <?php
class Pessoa {
    private string $nome;
    private float $peso;
    private float $altura;

    public function __construct($nome, $peso, $altura) {
        $this->nome = $nome;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function calcularIMC(): float {
        return $this->peso / ($this->altura * $this->altura);
    }

    public function classificarIMC(): string {
        $imc = $this->calcularIMC();

        if ($imc < 18.5) {
            return "Abaixo do peso";
        } elseif ($imc < 25) {
            return "Peso normal";
        } elseif ($imc < 30) {
            return "Sobrepeso";
        } elseif ($imc < 35) {
            return "Obesidade Grau I";
        } elseif ($imc < 40) {
            return "Obesidade Grau II";
        } else {
            return "Obesidade Grau III";
        }
    }

    public function getCorClassificacao(): string {
        $imc = $this->calcularIMC();

        if ($imc < 18.5) {
            return "azul";
        } elseif ($imc < 25) {
            return "verde";
        } elseif ($imc < 30) {
            return "amarelo";
        } else {
            return "vermelho";
        }
    }

    public function exibirResultado(): string {
        $imc = $this->calcularIMC();
        $classificacao = $this->classificarIMC();
        $cor = $this->getCorClassificacao();

        return "
        <div class='resultado-imc'>
            <h3>Resultado do IMC</h3>
            <p><strong>Nome:</strong> {$this->nome}</p>
            <p><strong>Peso:</strong> {$this->peso} kg</p>
            <p><strong>Altura:</strong> {$this->altura} m</p>
            <hr>
            <p><strong>IMC:</strong> " . number_format($imc, 1, ',', '.') . "</p>
            <p><strong>Classificação:</strong> <span class='classificacao {$cor}'>{$classificacao}</span></p>
        </div>
        ";
    }
}
?>