<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();

require __DIR__ . '/../app/routes/site.php';
require __DIR__ . '/../app/routes/user.php';

$app->run();