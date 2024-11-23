$(document).ready(function () {
    // Evento para redirecionar para a página de escolha de tema
    $("#escolherTema").click(function () {
        window.location.href = "escolherTema.html";
    });

    // Eventos para redirecionar para as páginas das diferentes fases do jogo "Matemática"
    $("#matematicaFase1").click(function () {
        window.location.href = "matematicaFase1.html";
    });

    $("#matematicaFase2").click(function () {
        window.location.href = "matematicaFase2.html";
    });

    $("#matematicaFase3").click(function () {
        window.location.href = "matematicaFase3.html";
    });

    // Eventos para redirecionar para as páginas das diferentes fases do jogo "Formas"
    $("#formasFase1").click(function () {
        window.location.href = "formasFase1.html";
    });

    $("#formasFase2").click(function () {
        window.location.href = "formasFase2.html";
    });

    $("#formasFase3").click(function () {
        window.location.href = "formasFase3.html";
    });

    // Eventos para redirecionar para as páginas das diferentes fases do jogo "Sílaba"
    $("#silabasFase1").click(function () {
        window.location.href = "silabasFase1.html";
    });

    $("#silabasFase2").click(function () {
        window.location.href = "silabasFase2.html";
    });

    $("#silabasFase3").click(function () {
        window.location.href = "silabasFase3.html";
    });

    // Evento para redirecionar para a página de jogo personalizado
    $("#personalizado").click(function () {
        window.location.href = "personalizado.html";
    });

    // Evento para redirecionar para a página inicial do jogo
    $("#inicio").click(function () {
        window.location.href = "index.html";
    });

    // Adiciona um evento para reiniciar o jogo (recarregar a página)
    document.getElementById('reiniciarJogo').addEventListener('click', function () {
        location.reload(); // Recarrega a página atual
    });

    // Adiciona um evento para redirecionar para a página de escolha de temas
    document.getElementById('escolherTemas').addEventListener('click', function () {
        window.location.href = 'escolherTema.html'; // Redireciona para a página de escolher temas
    });
});
