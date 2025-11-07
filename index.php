<?php
// 1. REQUER a conexão.
require_once 'config/conexao.php';

// 2. INCLUI o cabeçalho.
include 'templates/cabecalho.php';
?>

<div class="hero">
    <h2>Últimas Notícias</h2>
    <p>Veja o que há de novo em nossa plataforma e no mundo da tecnologia.</p>
</div>

<div class="noticias-container">
    <?php
    // 3. Consulta SQL para buscar informações da noticia
    $sql = "SELECT titulo, conteudo, data_publicacao 
            FROM noticias 
            ORDER BY data_publicacao DESC 
            LIMIT 6";
            
    $resultado = $conexao->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        
        // 4. Loop para criar cada card
        while ($noticia = $resultado->fetch_assoc()) {
            
            // 5. Formatação da data para o padrão BR
            $data = new DateTime($noticia['data_publicacao']);
            $data_formatada = $data->format('d/m/Y H:i');

            // 6. Limita o tamanho do conteúdo para o card
            $conteudo_curto = mb_substr($noticia['conteudo'], 0, 120);
            if (mb_strlen($noticia['conteudo']) > 120) {
                $conteudo_curto .= "...";
            }

            // 7. Exibe o HTML do Card
            echo '<article class="card">';
            echo '  <div class="card-header">';
            echo '      <h3>' . htmlspecialchars($noticia['titulo']) . '</h3>';
            echo '  </div>';
            echo '  <div class="card-body">';
            echo '      <p>' . htmlspecialchars($conteudo_curto) . '</p>';
            echo '  </div>';
            echo '  <div class="card-footer">';
            echo '      <span class="data">Publicado em: ' . $data_formatada . '</span>';
            echo '      <span class="badge">Tecnologia</span>';
            echo '  </div>';
            echo '</article>';
        }

    } else {
        echo '<div class="no-news">';
        echo '  <p>Nenhuma notícia encontrada no banco de dados.</p>';
        echo '</div>';
    }

    // 8. Fecha a conexão
    $conexao->close();
    ?>
</div>

<?php
// 9. INCLUI o rodapé
include 'templates/rodape.php';
?>