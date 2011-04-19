<?php

class Interpreter extends Application {
	protected static $pattern;
	protected static $matches;
	protected static $Interpreters = array(
		'FacebookChat'
	);
	
	protected static function matchesPattern($body) {
		preg_match_all(self::getPattern(), $body, $matches);
		return self::setMatches(array_map(function($string) {
			if (is_array($string)) {
				$result = $string;
				foreach ($result as $key => $value) {
					$result[$key] = trim($value);
				}
			} else {
				$result = trim($string);
			}
			return $result;
		}, $matches));
	}
	
	public static function apply($body) {
		foreach (self::getInterpreters() as $Interpreter) {
			$className = $Interpreter . 'Interpreter';
			if ($matches = $className::matchesPattern($body)) {
				$result = array();
				foreach ($matches[0] as $n => $match) {
					$result[] = array(
						'author' => $matches[0][$n],
						'time' => $matches[1][$n],
						'body' => $matches[2][$n]
					);
				}
				return $result;
			}
		}
		
		return array();
	}
}