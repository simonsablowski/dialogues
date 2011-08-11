<?php

$configuration = array();

$configuration['pathApplication'] = dirname(__FILE__) . '/';

$configuration['basePath'] = '/';

$configuration['includeDirectories'] = array(
	$configuration['pathApplication'],
	$configuration['pathApplication'] . '../cheese/',
	$configuration['pathApplication'] . '../nacho/'
);

$configuration['Database'] = array(
	'type' => 'MySql',
	'host' => 'localhost',
	'name' => 'dialogues',
	'user' => 'root',
	'password' => ''
);

$configuration['Request'] = array(
	'defaultQuery' => 'Dialogue/index',
	'aliasQueries' => array(
		'(\d+)' => 'Dialogue/show/$1'
	)
);

$configuration['debugMode'] = FALSE;