<?php

class User extends Model {
	protected $temporary = FALSE;
	
	protected $fields = array(
		'id',
		'userName',
		'firstName',
		'lastName',
		'status',
		'created',
		'modified'
	);
	protected $requiredFields = array(
		'userName'
	);
	
	public function isAuthorized($actionName) {
		return TRUE;
	}
}