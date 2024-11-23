<?php
// Habilita a exibição de erros para facilitar a depuração
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica se a requisição é do tipo POST (quando o formulário for enviado)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Inclui o arquivo de conexão com o banco de dados
    include(__DIR__ . '/db_connect.php');

    // Obtém e limpa o valor do tema enviado pelo formulário
    $tema = mysqli_real_escape_string($conn, $_POST['tema']);

    // Define o diretório onde as imagens serão armazenadas no servidor
    $uploadDirectory = '/opt/bitnami/apache/htdocs/MemoriaMaluquinha/uploads/';

    // Array para armazenar os caminhos das imagens enviadas
    $images = [];

    // Loop para processar as 8 imagens
    for ($i = 1; $i <= 8; $i++) {
        // Verifica se o arquivo foi enviado sem erro
        if (isset($_FILES["imagem$i"]) && $_FILES["imagem$i"]["error"] == UPLOAD_ERR_OK) {
            // Obtém o nome do arquivo e define o caminho de destino
            $fileName = basename($_FILES["imagem$i"]["name"]);
            $targetFile = $uploadDirectory . $fileName;
            $relativePath = '/opt/bitnami/apache/htdocs/MemoriaMaluquinha/uploads/' . $fileName;
            $imageType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); // Obtém a extensão do arquivo

            // Verifica se o arquivo é uma imagem válida
            if (in_array($imageType, ['jpg', 'jpeg', 'png', 'gif'])) {
                // Move o arquivo para o diretório de uploads
                if (move_uploaded_file($_FILES["imagem$i"]["tmp_name"], $targetFile)) {
                    // Adiciona o caminho relativo da imagem ao array
                    $images[] = $relativePath;
                } else {
                    // Exibe erro caso o arquivo não tenha sido enviado corretamente
                    echo "Erro ao enviar a imagem $i.";
                }
            } else {
                // Exibe erro se o arquivo não for uma imagem válida
                echo "Somente imagens JPG, PNG e GIF são permitidas.";
            }
        } else {
            // Exibe erro se houve algum problema no envio da imagem
            echo "Erro no envio da imagem $i: " . $_FILES["imagem$i"]["error"];
        }
    }

    // Verifica se todas as 8 imagens foram carregadas com sucesso
    if (count($images) == 8) {
        // Prepara a consulta SQL para inserir o tema e as imagens no banco de dados
        $stmt = $conn->prepare("INSERT INTO jogos (tema, imagem1, imagem2, imagem3, imagem4, imagem5, imagem6, imagem7, imagem8)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Liga os parâmetros da consulta
        $stmt->bind_param("sssssssss", $tema, $images[0], $images[1], $images[2], $images[3], $images[4], $images[5], $images[6], $images[7]);

        // Executa a consulta e verifica se a inserção foi bem-sucedida
        if ($stmt->execute()) {
            // Redireciona para a página do jogo, passando o tema como parâmetro
            header("Location: jogo.php?tema=" . urlencode($tema));
            exit();
        } else {
            // Exibe erro caso a inserção falhe
            echo "Erro ao criar jogo: " . $stmt->error;
        }

        // Fecha a declaração e a conexão com o banco de dados
        $stmt->close();
        $conn->close();
    } else {
        // Exibe erro caso as 8 imagens não tenham sido carregadas corretamente
        echo "Por favor, carregue todas as imagens corretamente.";
    }
}
?>
