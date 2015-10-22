<?php

define('SCHEME', 'http');
session_start();


define('ROOT', __DIR__ . '/../');
define('PUBLIC_FOLDER', ROOT . 'public/');
define('APP_FOLDER', ROOT . 'app/');

//define('HTTP', SCHEME . '://localhost/barroc-itPR/');


require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/classes/MessageBag.php';

$messageBag = new MessageBag();