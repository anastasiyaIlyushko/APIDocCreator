<?php 

class AdminAction extends CAction {
	
	public function run() {
		$model = new Project('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Project']))
			$model->attributes = $_GET['Project'];

		$this->controller->render('admin', array(
			'model' => $model,
		));
	}
}
