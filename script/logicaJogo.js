$(document).ready(function () {
    var primeiro = null;
    var segundo = null;
    var contagem = 0;
    var aux1;
    var aux2;

    // Lógica de jogo da memória
    $(".ativado").click(function () {

        if (aux1) {
            return;
        }
        if (primeiro && $(primeiro).is($(this))) {
            return;
        }
        if (primeiro === null) {
            $(this).toggleClass("rotate3d");
            primeiro = $(this);
            return;
        }
        $(this).toggleClass("rotate3d");
        segundo = $(this);
        if (primeiro.data('id') === segundo.data('id')) {
            $(primeiro).off('click');
            $(segundo).off('click');
            contagem++;
            contagem++;
            if (contagem === 8) {
                // Exibe o alerta com animação
                $("#alerta")
                    .fadeIn(1000) // Aparece suavemente
                    .animate({ top: '40%', left: '50%', fontSize: '50px' }, 1000) // Balança suavemente
                    .delay(2000) // Fica na tela por 2 segundos
                    .fadeOut(500); // Desaparece suavemente

                // Reproduz um som de vitória
                var victorySound = new Audio("../audios/vitoria.mp3");
                victorySound.play();

                // Faz o botão aparecer suavemente
                $("#proximaFase").fadeIn(500);
                $("#novoJogo").fadeIn(500);


            }
            primeiro = null;
            segundo = null;
        } else {
            aux1 = primeiro;
            aux2 = segundo;
            primeiro = null;
            segundo = null;
            setTimeout(function () {
                $(aux1).toggleClass("rotate3d");
                $(aux2).toggleClass("rotate3d");
                aux1 = null;
                aux2 = null;
            }, 1000);
        }
    });

    // Sons ao clicar nos cartões
    $(".opc").click(function () {
        if ($(this).data("id") === 1) {
            $('#clickSound').attr('src', "../audios/som1.mp3")[0].play();
        }
        if ($(this).data("id") === 2) {
            $('#clickSound').attr('src', "../audios/som2.mp3")[0].play();
        }
        if ($(this).data("id") === 3) {
            $('#clickSound').attr('src', "../audios/som3.mp3")[0].play();
        }
        if ($(this).data("id") === 4) {
            $('#clickSound').attr('src', "../audios/som4.mp3")[0].play();
        }
    });

    // Finalizar o jogo e limpar os dados
    $("#finalizar").click(function () {
        if (confirm("Tem certeza de que deseja limpar o jogo?")) {
            fetch('../php/limpar_jogo.php', { method: 'POST' })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Mostra a mensagem do PHP
                    window.location.href = "escolherTema.html"; // Redireciona para a seleção de tema
                })
                .catch(err => alert("Erro ao limpar o jogo: " + err));
        }
    });

    $("#reiniciarJogo").click(function () {
        location.reload(); // Recarrega a página
    });


    $("#btnJogarNovamente").click(function () {
        location.reload(); // Recarrega a página
    });

    // Função para criar um novo jogo
    $("#btnCriarNovoJogo").click(function () {
        if (confirm("Tem certeza de que deseja criar um novo jogo?")) {
            fetch('../php/limpar_jogo.php', { method: 'POST' })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Mostra a mensagem do PHP
                    window.location.href = "escolherTema.html"; // Redireciona para seleção de tema
                })
                .catch(err => alert("Erro ao criar novo jogo: " + err));
        }
    });
});
