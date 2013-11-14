<?php 

class SubstancesAction extends CAction {
	
	public function run($id) {

		$this->controller->redirect(array('substances/index', 'projectId' => $id));
	}
}
