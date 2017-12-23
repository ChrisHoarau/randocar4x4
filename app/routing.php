<?php

/**
 * This file should be included from app.php, and is where you hook
 * up routes to controllers.
 *
 * @link http://silex.sensiolabs.org/doc/usage.html#routing
 * @link http://silex.sensiolabs.org/doc/providers/service_controller.html
 */

//$app->get('/', 'app.default_controller:indexAction');

$app->get("/", function() use ($app) {
	$circuits = $app["dao.circuit"]->findAll();

	return $app["twig"]->render("index.twig", array(
		"circuits" => $circuits
	));
});