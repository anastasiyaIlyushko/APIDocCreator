<?php 

class CreateAction extends CAction {
	
	public function run() {

		$model = new Project;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Project'])) {
			$model->attributes = $_POST['Project'];
			if ($model->save())
				$this->controller->redirect(array('view', 'id' => $model->id));
		}

		$this->controller->render('create', array(
			'model' => $model,
		));
	}
}
