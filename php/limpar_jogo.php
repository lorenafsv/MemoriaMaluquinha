<?php
// Incluindo o arquivo de conexão com o banco de dados
include(__DIR__ . '/../config/db_connect.php');

// Função para excluir todas as imagens do diretório
function excluirImagens($diretorio) {
    // Obtém todos os arquivos no diretório especificado
    $arquivos = glob($diretorio . '*'); 
    
    // Percorre todos os arquivos encontrados
    foreach ($arquivos as $arquivo) {
        // Verifica se o arquivo é um arquivo comum
        if (is_file($arquivo)) {
            unlink($arquivo); // Exclui o arquivo
        }
    }
}

try {
    // SQL para excluir todas as entradas na tabela 'jogos'
    $sql = "DELETE FROM jogos";
    
    // Executa a consulta para excluir os dados do banco de dados
    if ($conn->query($sql) === TRUE) {
        // Se a exclusão for bem-sucedida, exclui as imagens no diretório 'uploads'
        excluirImagens('../uploads/');
        echo "Jogo finalizado e imagens excluídas!"; // Mensagem de sucesso
    } else {
        // Caso haja erro na exclusão do banco de dados, lança uma exceção
        throw new Exception("Erro ao limpar o banco de dados: " . $conn->error);
    }
} catch (Exception $e) {
    // Exibe a mensagem de erro caso a exceção seja lançada
    echo "Erro: " . $e->getMessage();
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
