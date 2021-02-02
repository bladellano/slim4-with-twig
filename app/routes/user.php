<?php

use app\controllers\User;

$app->get('/user/create', User::class.":create");