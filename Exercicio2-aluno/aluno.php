<?php
class Aluno {
    private string $nome;
    private string $disciplina;
    private float $nota1;
    private float $nota2;
    private float $nota3;

    public function __construct($nome, $disciplina, $nota1, $nota2, $nota3) {
        $this->nome = $nome;
        $this->disciplina = $disciplina;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
        $this->nota3 = $nota3;
    }

    public function calcularMedia(): float {
        return ($this->nota1 + $this->nota2 + $this->nota3) / 3;
    }

    public function verificarStatus(): string {
        $media = $this->calcularMedia();
        
        if ($media >= 7.0) {
            return "Aprovado";
        } elseif ($media >= 5.0) {
            return "Recuperação";
        } else {
            return "Reprovado";
        }
    }

    public function exibirResultado(): string {
        $media = $this->calcularMedia();
        $status = $this->verificarStatus();
        
        return "
        <div class='resultado'>
            <h3>Resultado Acadêmico</h3>
            <p><strong>Aluno:</strong> {$this->nome}</p>
            <p><strong>Disciplina:</strong> {$this->disciplina}</p>
            <p><strong>Notas:</strong> {$this->nota1}, {$this->nota2}, {$this->nota3}</p>
            <p><strong>Média:</strong> " . number_format($media, 2, ',', '.') . "</p>
            <p><strong>Status:</strong> <span class='status {$status}'>$status</span></p>
        </div>
        ";
    }
}
?>