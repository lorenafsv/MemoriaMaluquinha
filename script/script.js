$(document).ready(function () {
    // Evento para redirecionar para a página de escolha de tema
    $("#escolherTema").click(function () {
        window.location.href = "/MemoriaMaluquinha/escolherTema.html";
    });

    // Eventos para redirecionar para as páginas das diferentes fases do jogo "Matemática"
    $("#matematicaFase1").click(function () {
        window.location.href = "/MemoriaMaluquinha/matematicaFase1.html";
    });

    $("#matematicaFase2").click(function () {
        window.location.href = "/MemoriaMaluquinha/matematicaFase2.html";
    });

    $("#matematicaFase3").click(function () {
        window.location.href = "/MemoriaMaluquinha/matematicaFase3.html";
    });

    // Eventos para redirecionar para as páginas das diferentes fases do jogo "Formas"
    $("#formasFase1").click(function () {
        window.location.href = "/MemoriaMaluquinha/formasFase1.html";
    });

    $("#formasFase2").click(function () {
        window.location.href = "/MemoriaMaluquinha/formasFase2.html";
    });

    $("#formasFase3").click(function () {
        window.location.href = "/MemoriaMaluquinha/formasFase3.html";
    });

    // Eventos para redirecionar para as páginas das diferentes fases do jogo "Sílaba"
    $("#silabasFase1").click(function () {
        window.location.href = "/MemoriaMaluquinha/silabasFase1.html";
    });

    $("#silabasFase2").click(function () {
        window.location.href = "/MemoriaMaluquinha/silabasFase2.html";
    });

    $("#silabasFase3").click(function () {
        window.location.href = "/MemoriaMaluquinha/silabasFase3.html";
    });

    // Evento para redirecionar para a página de jogo personalizado
    $("#personalizado").click(function () {
        window.location.href = "/MemoriaMaluquinha/personalizado.html";
    });

    // Evento para redirecionar para a página inicial do jogo
    $("#inicio").click(function () {
        window.location.href = "/MemoriaMaluquinha/index.html";
    });

    // Adiciona um evento para reiniciar o jogo (recarregar a página)
    document.getElementById('reiniciarJogo').addEventListener('click', function () {
        location.reload(); // Recarrega a página atual
    });

    // Adiciona um evento para redirecionar para a página de escolha de temas
    document.getElementById('escolherTemas').addEventListener('click', function () {
        window.location.href = 'escolherTema.html'; // Redireciona para a página de escolher temas
    });

    // Adiciona um evento para reiniciar o jogo (recarregar a página) novamente
    document.getElementById('reiniciarJogo').addEventListener('click', function () {
        location.reload(); // Recarrega a página atual
    });

    // Adiciona um evento para redirecionar para a página de escolher temas novamente
    document.getElementById('escolherTemas').addEventListener('click', function () {
        window.location.href = 'escolherTema.html'; // Redireciona para a página de escolher temas
    });

});
