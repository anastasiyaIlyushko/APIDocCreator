<?php 

class UpdateAction extends CAction {
	
	public function run($id) {

		$model = $this->controller->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Project'])) {
			$model->attributes = $_POST['Project'];
			if ($model->save())
				$this->controller->redirect(array('view', 'id' => $model->id));
		}

		$this->controller->render('update', array(
			'model' => $model,
		));
	}
}
