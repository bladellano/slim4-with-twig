<?php

define("URL_BASE","http://slim4.local.com");

define('ROOT',dirname(__FILE__,3));
define('DIR_VIEWS',ROOT.'/app/views/');
define('EXT_VIEWS','.html');

// Email configuration
define("MAIL_EMAIL","dellanosites@gmail.com");
define("MAIL_PASSWORD","@@Caio2019");
define("MAIL_HOST","smtp.gmail.com");
define("MAIL_NAME_FROM","Site Teste");
define("NAME_SITE",URL_BASE);

// Seo configuration
define("SITE", "Nome da Loja");
define("DESCRIPTION", "Um descrição bem extensa sobre a loja para o SEO");
define("FB_PAGE", "");
define("FB_AUTHOR", "");
define("APP_ID", "");
define("URL_SITE", URL_BASE);
define("IMAGE", URL_BASE);//Caminho da imagem.

// Database configuration
define("DB_SITE", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "slim4",
    "username" => "root",
    "passwd" => "root",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);