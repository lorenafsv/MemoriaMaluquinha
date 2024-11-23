$(document).ready(function () {
    // Função para verificar se o arquivo selecionado é uma imagem válida (JPG, PNG, GIF)
    function isValidImage(file) {
        // Tipos de arquivo válidos para imagens
        const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
        // Retorna true se o tipo de arquivo estiver na lista de tipos válidos
        return validTypes.includes(file.type);
    }

    // Validação dos arquivos de imagem quando um arquivo é selecionado no formulário
    $(document).ready(function () {
        // Evento que é acionado quando o usuário seleciona um arquivo
        $('input[type="file"]').on('change', function () {
            const input = $(this); // Armazena o elemento de entrada de arquivo
            // Obtém o elemento de feedback associado ao input
            const feedback = $('#' + input.attr('id').replace('imagem', 'feedbackImagem'));
            const file = input[0].files[0]; // Obtém o primeiro arquivo selecionado

            // Se um arquivo foi selecionado
            if (file) {
                // Verifica se o arquivo é uma imagem válida
                if (isValidImage(file)) {
                    // Exibe a mensagem de imagem válida
                    feedback.text('Imagem válida!').removeClass('invalid').addClass('valid');
                    // Adiciona a classe "valid" e remove "invalid" do input
                    input.removeClass('invalid').addClass('valid');
                } else {
                    // Exibe a mensagem de erro se a imagem não for válida
                    feedback.text('Por favor, selecione uma imagem válida (JPG, PNG, GIF).').removeClass('valid').addClass('invalid');
                    // Adiciona a classe "invalid" e remove "valid" do input
                    input.removeClass('valid').addClass('invalid');
                }
            } else {
                // Se nenhum arquivo for selecionado, limpa o feedback e remove as classes
                feedback.text('');
                input.removeClass('invalid').removeClass('valid');
            }
        });
    });
});
