<?php

require_once __DIR__.'/../app/Database.php';
require_once __DIR__.'/../routes/web.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$pdo=Database::connect();