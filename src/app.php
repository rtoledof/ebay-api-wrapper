<?php

use Symfony\Component\Routing;
use Symfony\Component\Config\FileLocator;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Symfony\Bundle\FrameworkBundle\Routing\AnnotatedRouteControllerLoader;

$loader = require __DIR__ . '/../vendor/autoload.php';

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

$loader = new Routing\Loader\AnnotationDirectoryLoader(
	new FileLocator(__DIR__ . '/Controller/'),
	new AnnotatedRouteControllerLoader(
		new AnnotationReader()
	)
);

return $loader->load(__DIR__ . '/Controller/');