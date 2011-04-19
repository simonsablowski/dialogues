<?php

class FacebookChatInterpreter extends Interpreter {
	protected static $pattern = '/\[([^\]]+)\]\D*(\d+):(\d+)([^\[]+)/is';
	
	protected static function getAuthors() {
		if (!$matches = self::getMatches()) return NULL;
		return $matches[1];
	}
	
	protected static function getTimes() {
		if (!$matches = self::getMatches()) return NULL;
		else if (!$matches[2] || !$matches[3]) return array();
		
		$times = array();
		for ($i = 0; $i < count($matches[2]); $i++) {
			$times[] = mktime((int)$matches[2][$i], (int)$matches[3][$i], 0);
		}
		return $times;
	}
	
	protected static function getMessages() {
		if (!$matches = self::getMatches()) return NULL;
		return $matches[4];
	}
	
	protected static function matchesPattern($body) {
		self::setMatches(array_map(function($string) {
			return str_replace(array(
				':):)',
				':(:(',
				':D:D',
				':P:P',
				';);)'
			), array(
				':)',
				':(',
				':D',
				':P',
				';)'
			), $string);
		}, parent::matchesPattern($body)));
		
		return self::setMatches(array(
			self::getAuthors(),
			self::getTimes(),
			self::getMessages()
		));
	}
}