<?php declare (strict_types = 1);

require_once __DIR__ . '/../src/app.php';

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;

$dotenv = new Dotenv();
if (file_exists(__DIR__.'/../.env')) {
	$dotenv->load(__DIR__.'/../.env');
}

$request = Request::createFromGlobals();
$request->headers->add(['EBAY-API-KEY' => $_ENV['API_KEY']]);
$routes  = include __DIR__ . '/../src/app.php';

$context = new RequestContext();
$context->fromRequest($request);

$matcher    = new UrlMatcher($routes, $context);
$parameters = $matcher->match($context->getPathInfo());


$controllerInfo = explode('::', $parameters['_controller']);

$controller = new $controllerInfo[0];
$action     = $controllerInfo[1];

$response =	$controller->$action($request);
$response->send();