<?php
class Viagem {
    private string $origem;
    private string $destino;
    private float $distancia;
    private float $tempo;
    private string $tipoVeiculo;

    public function __construct($origem, $destino, $distancia, $tempo, $tipoVeiculo) {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->distancia = $distancia;
        $this->tempo = $tempo;
        $this->tipoVeiculo = $tipoVeiculo;
    }

    public function calcularVelocidadeMedia(): float {
        return $this->distancia / $this->tempo;
    }

    public function getConsumoVeiculo(): float {
        $consumos = [
            'carro_pequeno' => 12.0,
            'carro_medio' => 10.0,
            'carro_grande' => 8.0,
            'moto' => 30.0
        ];
        return $consumos[$this->tipoVeiculo] ?? 10.0;
    }

    public function calcularConsumoCombustivel(): float {
        return $this->distancia / $this->getConsumoVeiculo();
    }

    public function calcularCustoViagem(): float {
        $precoGasolina = 5.80;
        $consumoTotal = $this->calcularConsumoCombustivel();
        return $consumoTotal * $precoGasolina;
    }

    public function exibirPlanejamento(): string {
        return "
        <div class='planejamento-viagem'>
            <h3>Planejamento de Viagem</h3>
            <p><strong>Rota:</strong> {$this->origem} → {$this->destino}</p>
            <p><strong>Distância:</strong> " . number_format($this->distancia, 1, ',', '.') . " km</p>
            <p><strong>Tempo Estimado:</strong> " . number_format($this->tempo, 1, ',', '.') . " horas</p>
            <p><strong>Tipo de Veículo:</strong> " . ucfirst(str_replace('_', ' ', $this->tipoVeiculo)) . "</p>
            <hr>
            <p><strong>Velocidade Média:</strong> " . number_format($this->calcularVelocidadeMedia(), 1, ',', '.') . " km/h</p>
            <p><strong>Consumo de Combustível:</strong> " . number_format($this->calcularConsumoCombustivel(), 1, ',', '.') . " litros</p>
            <p><strong>Custo Estimado:</strong> R$ " . number_format($this->calcularCustoViagem(), 2, ',', '.') . "</p>
        </div>
        ";
    }
}
?>