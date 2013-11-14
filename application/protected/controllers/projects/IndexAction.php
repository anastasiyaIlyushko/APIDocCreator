<?php 

class IndexAction extends CAction {
	
	public function run() {
		$dataProvider = new CActiveDataProvider('Project');
		$this->controller->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}
}
