<?php

use App\Kernel;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Dotenv\Dotenv;

require_once dirname(__DIR__).'/vendor/autoload.php';

Debug::enable();

if (file_exists(dirname(__DIR__).'/.env')) {
    (new Dotenv())->load(dirname(__DIR__).'/.env');
}

$kernel = new Kernel($_SERVER['APP_ENV'] ?? 'dev', (bool) ($_SERVER['APP_DEBUG'] ?? true));

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
