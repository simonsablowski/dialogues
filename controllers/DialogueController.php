<?php

class DialogueController extends Controller {
	public function getFields() {
		return array();
	}
	
	public function index() {
		$this->displayView('Dialogue.index.php', array(
			'Dialogues' => Dialogue::findAll()
		));
	}
	
	public function add() {
		$title = $this->getRequest()->getData('title');
		$body = $this->getRequest()->getData('body');
		if (!empty($title) && !empty($body)) {
			$Dialogue = new Dialogue(array(
				'title' => $title,
				'body' => $body
			));
			$Dialogue->create();
			$this->getMessageHandler()->setMessage('The dialogue was created successfully.');
		}
		return $this->redirect();
	}
}