<?php declare (strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__.'/../src/router.php';

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::start();

//require_once __DIR__ . '/../src/app.php';
//
//use Symfony\Component\Dotenv\Dotenv;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Routing\RequestContext;
//use Symfony\Component\Routing\Matcher\UrlMatcher;
//
//$dotenv = new Dotenv();
//$dotenv->load(__DIR__.'/../.env');
//
//$request = Request::createFromGlobals();
//$request->headers->add(['EBAY-API-KEY' => $_ENV['API_KEY']]);
//$routes  = include __DIR__ . '/../src/app.php';
//
//$context = new RequestContext();
//$context->fromRequest($request);
//
//$matcher    = new UrlMatcher($routes, $context);
//$parameters = $matcher->match($context->getPathInfo());
//
//
//$controllerInfo = explode('::', $parameters['_controller']);
//
//$controller = new $controllerInfo[0];
//$action     = $controllerInfo[1];
//
//$response =	$controller->$action($request);
//$response->send();