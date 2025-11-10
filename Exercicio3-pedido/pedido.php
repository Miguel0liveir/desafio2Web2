<?php
class Pedido {
    private string $produto;
    private int $quantidade;
    private float $precoUnitario;
    private string $tipoCliente;

    public function __construct($produto, $quantidade, $precoUnitario, $tipoCliente) {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->precoUnitario = $precoUnitario;
        $this->tipoCliente = $tipoCliente;
    }

    public function calcularTotalBruto(): float {
        return $this->quantidade * $this->precoUnitario;
    }

    public function calcularDesconto(): float {
        $totalBruto = $this->calcularTotalBruto();
        
        if ($this->tipoCliente === 'premium') {
            return $totalBruto * 0.10;
        }
        
        return 0;
    }

    public function calcularImposto(): float {
        $totalBruto = $this->calcularTotalBruto();
        return $totalBruto * 0.08;
    }

    public function calcularTotalFinal(): float {
        $totalBruto = $this->calcularTotalBruto();
        $desconto = $this->calcularDesconto();
        $imposto = $this->calcularImposto();
        
        return $totalBruto - $desconto + $imposto;
    }

    public function exibirResumo(): string {
        return "
        <div class='resumo-pedido'>
            <h3>Resumo do Pedido</h3>
            <p><strong>Produto:</strong> {$this->produto}</p>
            <p><strong>Quantidade:</strong> {$this->quantidade}</p>
            <p><strong>Preço Unitário:</strong> R$ " . number_format($this->precoUnitario, 2, ',', '.') . "</p>
            <p><strong>Tipo Cliente:</strong> " . ucfirst($this->tipoCliente) . "</p>
            <hr>
            <p><strong>Total Bruto:</strong> R$ " . number_format($this->calcularTotalBruto(), 2, ',', '.') . "</p>
            <p><strong>Desconto:</strong> R$ " . number_format($this->calcularDesconto(), 2, ',', '.') . "</p>
            <p><strong>Imposto (8%):</strong> R$ " . number_format($this->calcularImposto(), 2, ',', '.') . "</p>
            <p><strong>Total Final:</strong> R$ " . number_format($this->calcularTotalFinal(), 2, ',', '.') . "</p>
        </div>
        ";
    }
}
?>