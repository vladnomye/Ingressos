<?php
require_once __DIR__ . '/../vendor/autoload.php';

use ingressos\Response;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$environment = $_ENV['ENVIRONMENT'];
$appVersion = $_ENV['APP_VERSION'];

$env = [
   'version' => $appVersion, 
    'environment' => $environment
    ];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$responseUrl = new Response;

switch ($uri) {
    case '/' :
        $response = $responseUrl->init($uri);
        http_response_code();
        break;
    case '/saude' :
        $response = $responseUrl->saude($env, $uri);
        http_response_code();
        break;
    default : 
        http_response_code(404);
}