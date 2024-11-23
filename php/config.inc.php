<?php
/*
 * Isso é necessário para autenticação baseada em cookies, para criptografar a senha no
 * cookie. É importante mudar esse valor para um valor mais seguro e único.
 */
$cfg['blowfish_secret'] = 'xampp'; /* VOCÊ DEVE MUDAR ISSO PARA UMA AUTH DE COOKIE MAIS SEGURA! */

/*
 * Configuração dos servidores
 */
$i = 0; // Inicializa o índice do servidor

/*
 * Configuração do primeiro servidor
 */
$i++; // Incrementa o índice do servidor

/* Tipo de autenticação e informações */
$cfg['Servers'][$i]['auth_type'] = 'config'; // Define o tipo de autenticação
$cfg['Servers'][$i]['user'] = 'root'; // Nome de usuário para acessar o servidor
$cfg['Servers'][$i]['password'] = ''; // Senha do usuário (neste caso está vazia)
$cfg['Servers'][$i]['extension'] = 'mysqli'; // Usa a extensão MySQLi para interação com o banco de dados
$cfg['Servers'][$i]['AllowNoPassword'] = true; // Permite login sem senha
$cfg['Servers'][$i]['port'] = '3307'; // Porta para o servidor MySQL (alterada para 3307)

/* Configuração de idioma */
$cfg['Lang'] = ''; // Configuração de idioma (vazio significa o idioma padrão)

/* Vincula ao endereço IPv4 localhost e tipo de conexão TCP */
$cfg['Servers'][$i]['host'] = '127.0.0.1'; // Endereço IP localhost
$cfg['Servers'][$i]['connect_type'] = 'tcp'; // Usa o tipo de conexão TCP/IP

/* Usuário para funcionalidades avançadas do phpMyAdmin */
$cfg['Servers'][$i]['controluser'] = 'pma'; // Usuário de controle para gerenciar o phpMyAdmin
$cfg['Servers'][$i]['controlpass'] = ''; // Senha do usuário de controle (neste caso está vazia)

/* Configurações para funcionalidades avançadas do phpMyAdmin */
$cfg['Servers'][$i]['pmadb'] = 'phpmyadmin'; // Banco de dados para uso interno do phpMyAdmin
$cfg['Servers'][$i]['bookmarktable'] = 'pma__bookmark'; // Tabela para armazenar favoritos
$cfg['Servers'][$i]['relation'] = 'pma__relation'; // Tabela para armazenar relações
$cfg['Servers'][$i]['table_info'] = 'pma__table_info'; // Tabela para armazenar informações de tabelas
$cfg['Servers'][$i]['table_coords'] = 'pma__table_coords'; // Tabela para armazenar coordenadas de tabelas
$cfg['Servers'][$i]['pdf_pages'] = 'pma__pdf_pages'; // Tabela para armazenar páginas de PDFs
$cfg['Servers'][$i]['column_info'] = 'pma__column_info'; // Tabela para armazenar informações de colunas
$cfg['Servers'][$i]['history'] = 'pma__history'; // Tabela para armazenar histórico de consultas
$cfg['Servers'][$i]['designer_coords'] = 'pma__designer_coords'; // Tabela para armazenar coordenadas de design
$cfg['Servers'][$i]['tracking'] = 'pma__tracking'; // Tabela para rastrear ações
$cfg['Servers'][$i]['userconfig'] = 'pma__userconfig'; // Tabela para armazenar configurações de usuários
$cfg['Servers'][$i]['recent'] = 'pma__recent'; // Tabela para armazenar consultas recentes
$cfg['Servers'][$i]['table_uiprefs'] = 'pma__table_uiprefs'; // Tabela para armazenar preferências de UI de tabelas
$cfg['Servers'][$i]['users'] = 'pma__users'; // Tabela para armazenar informações dos usuários
$cfg['Servers'][$i]['usergroups'] = 'pma__usergroups'; // Tabela para armazenar grupos de usuários
$cfg['Servers'][$i]['navigationhiding'] = 'pma__navigationhiding'; // Tabela para esconder itens de navegação
$cfg['Servers'][$i]['savedsearches'] = 'pma__savedsearches'; // Tabela para armazenar buscas salvas
$cfg['Servers'][$i]['central_columns'] = 'pma__central_columns'; // Tabela para armazenar informações de colunas centrais
$cfg['Servers'][$i]['designer_settings'] = 'pma__designer_settings'; // Tabela para armazenar configurações de design
$cfg['Servers'][$i]['export_templates'] = 'pma__export_templates'; // Tabela para armazenar templates de exportação
$cfg['Servers'][$i]['favorite'] = 'pma__favorite'; // Tabela para armazenar itens favoritos

/*
 * Fim da configuração dos servidores
 */
?>
