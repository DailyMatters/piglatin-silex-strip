<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

$app = new \Silex\Application();

$app['piglatin'] = function($app) {
	return new \PigLatin\PigLatin();
};

//Instantiate a new service
$app->get('/translate/{string}', function($string) use ($app){
	$string = $app['piglatin']->convert($string);

	return new Response($string);
});


//This is just a test route, please ingore it
$app->get('/about', function() use ($app){
	return new \Symfony\Component\HttpFoundation\Response("This is the about page!");
});

$app->run();
