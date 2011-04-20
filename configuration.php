<?php

$configuration = array();

$configuration['pathApplication'] = dirname(__FILE__) . '/';

$configuration['basePath'] = 'http://localhost/dialogue/';

$configuration['includeDirectories'] = array(
	$configuration['pathApplication'],
	'D:/Webprojekte/cheese/',
	'D:/Webprojekte/nacho/'
);

$configuration['Database'] = array(
	'type' => 'MySql',
	'host' => 'localhost',
	'name' => 'dialogue',
	'user' => 'root',
	'password' => ''
);

$configuration['Request'] = array(
	'defaultQuery' => 'Dialogue/index',
	'aliasQueries' => array(
		'(\d+)' => 'Dialogue/show/$1'
	)
);

$configuration['debugMode'] = TRUE;
// $configuration['debugMode'] = FALSE;