<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new \Silex\Application();

$app['piglatin'] = function($app) {
	return new \PigLatin\PigLatin();
};

//Instantiate a new service
$app->get('/translate', function() use ($app){
	$string = $app['piglatin']->convert("almond tomato crimson");

	return $string;
});

$app->get('/about', function() use ($app){
	return new \Symfony\Component\HttpFoundation\Response("This is the about page!");
});

$app->run();