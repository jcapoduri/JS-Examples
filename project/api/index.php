<?php
// CORS enable
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With');
ini_set('display_errors', 1);

date_default_timezone_set('UTC');

require_once 'vendor/Slim/Slim.php';
require_once 'vendor/rb.php';

// SLIM setting up
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(array(
    'cookies.encrypt' => true,
    'cookies.secret_key' => 'newhorsestraplemachine',
    'cookies.cipher' => MCRYPT_RIJNDAEL_256,
    'cookies.cipher_mode' => MCRYPT_MODE_CBC
));

error_reporting(E_ALL);

//set Auth middleware
//$app->add(new AuthMiddleware());

define('REDBEAN_MODEL_PREFIX', '');
//R::setup('mysql:host=localhost;dbname=blackfeather', 'root', 'Kotipelto.46');
R::setup('mysql:host=127.0.0.1;dbname=c9', 'jcapoduri', '');

$app->get('/', function () use ($app){
    $response = $app->response();
    $response['Content-Type'] = 'application/json';
    $response->write('{}');
});

foreach (glob("routes/*.route.php") as $filename)
{
    require_once $filename;
};

$app->run();

?>