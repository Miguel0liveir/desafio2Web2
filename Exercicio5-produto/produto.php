<?php
class Produto {
    private string $nome;
    private int $quantidade;
    private float $valorUnitario;

    public function __construct($nome, $quantidade, $valorUnitario) {
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->valorUnitario = $valorUnitario;
    }

    // Getters para acessar as propriedades privadas
    public function getNome(): string {
        return $this->nome;
    }

    public function getQuantidade(): int {
        return $this->quantidade;
    }

    public function getValorUnitario(): float {
        return $this->valorUnitario;
    }

    public function entradaEstoque(int $quantidade): void {
        $this->quantidade += $quantidade;
    }

    public function saidaEstoque(int $quantidade): bool {
        if ($quantidade <= $this->quantidade) {
            $this->quantidade -= $quantidade;
            return true;
        }
        return false;
    }

    public function getValorTotalEstoque(): float {
        return $this->quantidade * $this->valorUnitario;
    }

    public function exibirEstoque(): string {
        return "
        <div class='info-estoque'>
            <h3>Estoque Atual</h3>
            <p><strong>Produto:</strong> {$this->nome}</p>
            <p><strong>Quantidade:</strong> {$this->quantidade} unidades</p>
            <p><strong>Valor Unitário:</strong> R$ " . number_format($this->valorUnitario, 2, ',', '.') . "</p>
            <p><strong>Valor Total em Estoque:</strong> R$ " . number_format($this->getValorTotalEstoque(), 2, ',', '.') . "</p>
        </div>
        ";
    }
}
?>