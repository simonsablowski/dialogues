<?php

class Anonymizer extends Interpreter {
	protected static $patterns = array(
		// Facebook
		'FacebookChat' => '/\[.+\]/s'
	);
}