<?php

class Dialogue extends Model {
	protected $fields = array(
		'id',
		'title',
		'body',
		'interpret',
		'anonymize',
		'status',
		'created',
		'modified'
	);
	protected $requiredFields = array(
		'title',
		'body'
	);
	
	protected function interpret() {
		return $this->isInterpret();
	}
	
	protected function anonymize() {
		return $this->isAnonymize();
	}
}