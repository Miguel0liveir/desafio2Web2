<?php
class CalculadoraFinanceira {
    private float $valorCompra;
    private int $numeroParcelas;
    private float $taxaJuros;

    public function __construct($valorCompra, $numeroParcelas, $taxaJuros) {
        $this->valorCompra = $valorCompra;
        $this->numeroParcelas = $numeroParcelas;
        $this->taxaJuros = $taxaJuros / 100;
    }

    public function calcularValorParcela(): float {
        if ($this->taxaJuros == 0) {
            return $this->valorCompra / $this->numeroParcelas;
        }
        
        $fator = pow(1 + $this->taxaJuros, $this->numeroParcelas);
        return $this->valorCompra * $this->taxaJuros * $fator / ($fator - 1);
    }

    public function calcularTotalPagar(): float {
        return $this->calcularValorParcela() * $this->numeroParcelas;
    }

    public function calcularJurosPagos(): float {
        return $this->calcularTotalPagar() - $this->valorCompra;
    }

    public function exibirResultado(): string {
        $valorParcela = $this->calcularValorParcela();
        $totalPagar = $this->calcularTotalPagar();
        $jurosPagos = $this->calcularJurosPagos();

        return "
        <div class='resultado-financeiro'>
            <h3>Resultado do Parcelamento</h3>
            <p><strong>Valor da Compra:</strong> R$ " . number_format($this->valorCompra, 2, ',', '.') . "</p>
            <p><strong>Número de Parcelas:</strong> {$this->numeroParcelas}</p>
            <p><strong>Taxa de Juros Mensal:</strong> " . number_format($this->taxaJuros * 100, 1, ',', '.') . "%</p>
            <hr>
            <p><strong>Valor da Parcela:</strong> R$ " . number_format($valorParcela, 2, ',', '.') . "</p>
            <p><strong>Total a Pagar:</strong> R$ " . number_format($totalPagar, 2, ',', '.') . "</p>
            <p><strong>Juros Pagos:</strong> R$ " . number_format($jurosPagos, 2, ',', '.') . "</p>
        </div>
        ";
    }
}
?>