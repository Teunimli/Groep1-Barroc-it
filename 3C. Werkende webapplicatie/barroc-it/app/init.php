<?php

define('SCHEME', 'http');


define('ROOT', __DIR__ . '/../');
define('PUBLIC_FOLDER', ROOT . 'public/');
define('APP_FOLDER', ROOT . 'app/');

define('HTTP', SCHEME . '://localhost/barroc-it/');


require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';