<?php
class Carro {
    private string $modelo;
    private string $combustivel;
    private float $tanqueCheio;
    private float $consumo;
    private float $kmRodados;

    public function __construct($modelo, $combustivel, $tanqueCheio, $consumo, $kmRodados = 0) {
        $this->modelo = $modelo;
        $this->combustivel = $combustivel;
        $this->tanqueCheio = $tanqueCheio;
        $this->consumo = $consumo;
        $this->kmRodados = $kmRodados;
    }

    public function calcularAutonomia(): float {
        return $this->tanqueCheio * $this->consumo;
    }

    public function calcularCustoPorKm(): float {
        $precos = [
            'etanol' => 3.50,
            'gasolina' => 5.80
        ];
        
        $precoLitro = $precos[$this->combustivel] ?? 5.00;
        return $precoLitro / $this->consumo;
    }

    public function verificarRevisao(): string {
        if ($this->kmRodados >= 10000) {
            return "⚠️ Hora da revisão! (" . number_format($this->kmRodados, 0, ',', '.') . " km rodados)";
        } else {
            $faltam = 10000 - $this->kmRodados;
            return "✅ OK - Faltam " . number_format($faltam, 0, ',', '.') . " km para a revisão";
        }
    }

    public function exibirRelatorio(): string {
        return "
        <div class='relatorio-carro'>
            <h3>Relatório do Veículo</h3>
            <p><strong>Modelo:</strong> {$this->modelo}</p>
            <p><strong>Combustível:</strong> " . ucfirst($this->combustivel) . "</p>
            <p><strong>Tanque Cheio:</strong> {$this->tanqueCheio} litros</p>
            <p><strong>Consumo:</strong> {$this->consumo} km/l</p>
            <p><strong>Km Rodados:</strong> " . number_format($this->kmRodados, 0, ',', '.') . " km</p>
            <hr>
            <p><strong>Autonomia:</strong> " . number_format($this->calcularAutonomia(), 1, ',', '.') . " km</p>
            <p><strong>Custo por Km:</strong> R$ " . number_format($this->calcularCustoPorKm(), 2, ',', '.') . "</p>
            <p><strong>Status Revisão:</strong> {$this->verificarRevisao()}</p>
        </div>
        ";
    }
}
?>