<?php
class ReservaHotel {
    private string $hospede;
    private int $numeroNoites;
    private string $tipoQuarto;

    public function __construct($hospede, $numeroNoites, $tipoQuarto) {
        $this->hospede = $hospede;
        $this->numeroNoites = $numeroNoites;
        $this->tipoQuarto = $tipoQuarto;
    }

    public function getValorDiaria(): float {
        $valores = [
            'simples' => 120.00,
            'luxo' => 200.00,
            'suite' => 350.00
        ];
        return $valores[$this->tipoQuarto] ?? 120.00;
    }

    public function calcularDesconto(): float {
        if ($this->numeroNoites > 5) {
            $totalBruto = $this->getValorDiaria() * $this->numeroNoites;
            return $totalBruto * 0.10;
        }
        return 0;
    }

    public function calcularTotalHospedagem(): float {
        $totalBruto = $this->getValorDiaria() * $this->numeroNoites;
        $desconto = $this->calcularDesconto();
        return $totalBruto - $desconto;
    }

    public function exibirReserva(): string {
        $valorDiaria = $this->getValorDiaria();
        $desconto = $this->calcularDesconto();
        $total = $this->calcularTotalHospedagem();

        $mensagemBoasVindas = "🌟 Bem-vindo(a), {$this->hospede}! Sua reserva foi processada com sucesso.";

        return "
        <div class='reserva-hotel'>
            <h3>Reserva de Hotel</h3>
            <p class='boas-vindas'>{$mensagemBoasVindas}</p>
            <p><strong>Hóspede:</strong> {$this->hospede}</p>
            <p><strong>Número de Noites:</strong> {$this->numeroNoites}</p>
            <p><strong>Tipo de Quarto:</strong> " . ucfirst($this->tipoQuarto) . "</p>
            <p><strong>Valor da Diária:</strong> R$ " . number_format($valorDiaria, 2, ',', '.') . "</p>
            <hr>
            <p><strong>Desconto:</strong> R$ " . number_format($desconto, 2, ',', '.') . "</p>
            <p><strong>Total da Hospedagem:</strong> R$ " . number_format($total, 2, ',', '.') . "</p>
        </div>
        ";
    }
}
?>