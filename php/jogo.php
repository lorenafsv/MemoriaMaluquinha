<?php
// Incluindo o arquivo de conexão com o banco de dados
include('php/db_connect.php');

// Verificando se o parâmetro 'tema' foi passado na URL
if (isset($_GET['tema'])) {
    // Obtém o valor do parâmetro 'tema' da URL
    $tema = $_GET['tema'];
} else {
    // Caso o parâmetro não tenha sido passado, exibe mensagem de erro e encerra o script
    echo "Tema não especificado!";
    exit;
}

// Recuperando as imagens associadas ao tema selecionado
$sql = "SELECT imagem1, imagem2, imagem3, imagem4, imagem5, imagem6, imagem7, imagem8 FROM jogos WHERE tema = '$tema'";
$result = $conn->query($sql);

// Verificando se o tema tem imagens associadas no banco
if ($result->num_rows > 0) {
    // Se houver imagens, recupera os dados e armazena em um array
    $row = $result->fetch_assoc();
    $imagens = [
        $row['imagem1'],
        $row['imagem2'],
        $row['imagem3'],
        $row['imagem4'],
        $row['imagem5'],
        $row['imagem6'],
        $row['imagem7'],
        $row['imagem8'],
    ];

    // Criando um array para os pares de imagens, associando cada imagem a um 'data_id'
    $cartas = [];
    for ($i = 0; $i < 8; $i++) {
        $cartas[] = [
            'imagem' => $imagens[$i],
            'data_id' => floor($i / 2) + 1 // Cada par terá o mesmo 'data_id'
        ];
    }

    // Embaralhando as cartas para garantir que o jogo seja aleatório
    shuffle($cartas);
} else {
    // Caso não haja imagens para o tema, exibe mensagem de erro e encerra o script
    echo "Nenhum jogo encontrado para o tema: $tema";
    exit;
}

// Fechando a conexão com o banco de dados após a consulta
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memória Maluquinha</title>

    <!-- Link para o arquivo de estilo CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fases.css">
    
    <!-- Configuração de fontes do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">

    <!-- Incluindo jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script/logicaJogo.js"></script>
    <script src="script/script.js"></script>
    
    <!-- Incluindo jQuery UI -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <!-- Incluindo Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Botões superiores para reiniciar o jogo e sair -->
    <div class="botoes-superiores">
        <button id="reiniciarJogo" title="Reiniciar Jogo">
            <i class="fas fa-redo"></i>
        </button>
        <button id="finalizar" title="Sair do Jogo">
            <i class="fa-solid fa-arrow-right-to-bracket"></i>
        </button>
    </div>

    <!-- Exibindo o nome do tema selecionado -->
    <h1 class="logo_principal">
        <span><?php echo htmlspecialchars($tema); ?></span>
    </h1>

    <!-- Botões para jogar novamente ou criar um novo jogo -->
    <div id="proximaFase">
        <button id="btnJogarNovamente" class="botao">Jogar Novamente</button>
    </div>
    <div id="novoJogo">
        <button id="btnCriarNovoJogo" class="botao">Criar Novo Jogo</button>
    </div>

    <!-- Exibindo as cartas embaralhadas -->
    <div id="containerCartoes">
        <?php foreach ($cartas as $index => $carta): ?>
            <div class="opc ativado" data-id="<?php echo $carta['data_id']; ?>">
                <img src="uploads/<?php echo basename($carta['imagem']); ?>" class="front-face">
                <button class="back-face">
                    <img class="img-frente" src="imgs/personalizado/frente-card.png">
                </button>
            </div>
            
            <!-- Divisão após o 4º cartão para uma nova linha -->
            <?php if (($index + 1) % 4 == 0): ?>
                <br>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <!-- Alerta de vitória -->
    <div id="alerta">
        <p>Parabéns!</p>
        <p>Você ganhou!</p>
    </div>

    <!-- Áudio para o som do clique -->
    <audio id="clickSound" src=""></audio>

</body>
</html>
