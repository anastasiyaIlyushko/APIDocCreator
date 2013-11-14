<?php 

class ViewAction extends CAction {
	
	public function run($id) {

		$substances = new CActiveDataProvider('Substance', array(
					'criteria' => array(
						'condition' => 'projectId=' . $id)
				));
		$this->controller->render('view', array(
			'model' => $this->controller->loadModel($id),
			'substances' => $substances,
		));
	}
}
