<?php
class CalculadoraGeometrica {
    private string $figura;
    private float $medida1;
    private float $medida2;

    public function __construct($figura, $medida1, $medida2 = 0) {
        $this->figura = $figura;
        $this->medida1 = $medida1;
        $this->medida2 = $medida2;
    }

    public function calcularArea(): float {
        switch ($this->figura) {
            case 'quadrado':
                return $this->medida1 * $this->medida1;
            case 'retangulo':
                return $this->medida1 * $this->medida2;
            case 'circulo':
                return M_PI * $this->medida1 * $this->medida1;
            default:
                return 0;
        }
    }

    public function getNomeFigura(): string {
        $nomes = [
            'quadrado' => 'Quadrado',
            'retangulo' => 'Retângulo',
            'circulo' => 'Círculo'
        ];
        return $nomes[$this->figura] ?? 'Figura Desconhecida';
    }

    public function getDescricaoMedidas(): string {
        switch ($this->figura) {
            case 'quadrado':
                return "Lado: {$this->medida1}";
            case 'retangulo':
                return "Base: {$this->medida1}, Altura: {$this->medida2}";
            case 'circulo':
                return "Raio: {$this->medida1}";
            default:
                return "Medidas não definidas";
        }
    }

    public function exibirResultado(): string {
        $area = $this->calcularArea();
        $nomeFigura = $this->getNomeFigura();
        $descricao = $this->getDescricaoMedidas();

        return "
        <div class='resultado-geometrico'>
            <h3>Resultado do Cálculo</h3>
            <p><strong>Figura:</strong> {$nomeFigura}</p>
            <p><strong>Medidas:</strong> {$descricao}</p>
            <hr>
            <p><strong>Área Calculada:</strong> " . number_format($area, 2, ',', '.') . " unidades²</p>
        </div>
        ";
    }
}
?>