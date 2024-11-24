<?php
// db_connect.php

// Definindo os parâmetros de conexão com o banco de dados
$servername = "localhost"; // Endereço do servidor (geralmente 'localhost' para servidores locais)
$username = "root"; // Nome de usuário do banco de dados (padrão 'root' para muitas instalações locais)
$password = "7CG!I85CB=!q"; // Senha do banco de dados (deixe em branco se não houver senha configurada)
$dbname = "memoria"; // Nome do banco de dados que será acessado

// Estabelecendo a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se houve erro na conexão
if ($conn->connect_error) {
    // Caso haja um erro, a execução é interrompida e a mensagem de erro é exibida
    die("Connection failed: " . $conn->connect_error);
}

// Se a conexão for bem-sucedida, a execução continua sem mensagens de erro.
?>
