<?php
class ConversorMoeda {
    private float $valorReal;
    private string $moedaDestino;
    private float $cotacao;

    public function __construct($valorReal, $moedaDestino, $cotacao) {
        $this->valorReal = $valorReal;
        $this->moedaDestino = $moedaDestino;
        $this->cotacao = $cotacao;
    }

    public function converter(): float {
        return $this->valorReal / $this->cotacao;
    }

    public function getSimboloMoeda(): string {
        $simbolos = [
            'USD' => 'US$',
            'EUR' => '€',
            'GBP' => '£'
        ];
        return $simbolos[$this->moedaDestino] ?? '$';
    }

    public function exibirResultado(): string {
        $valorConvertido = $this->converter();
        $simbolo = $this->getSimboloMoeda();
        
        return "
        <div class='resultado-conversao'>
            <h3>Resultado da Conversão</h3>
            <p><strong>Valor em Reais:</strong> R$ " . number_format($this->valorReal, 2, ',', '.') . "</p>
            <p><strong>Moeda Destino:</strong> {$this->moedaDestino}</p>
            <p><strong>Cotação:</strong> R$ " . number_format($this->cotacao, 2, ',', '.') . "</p>
            <hr>
            <p><strong>Valor Convertido:</strong> {$simbolo} " . number_format($valorConvertido, 2, ',', '.') . "</p>
        </div>
        ";
    }
}
?>