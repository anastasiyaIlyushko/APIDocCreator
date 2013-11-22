<?php

class ViewAction extends CAction {

	public function run($id) {

		$substances = new CActiveDataProvider('Substance', array(
					'criteria' => array(
						'condition' => 'projectId=' . $id)
				));
		$methods = new CActiveDataProvider('Method', array(
					'criteria' => array(
						'condition' => 'projectId=' . $id)
				));

		$array = array(array('label' => "Substances"));
		foreach ($substances->getData() as $value) {
			$array[] = array('label' => $value->name, 'url' => array('/substances/' . $value->id));
		}
		$this->controller->substances = $array;
		
		unset($array);
		
		$array = array(array('label' => "Methods"));
		foreach ($methods->getData() as $value) {
			$array[] = array('label' => $value->name, 'url' => array('/methods/' . $value->id));
		}
		$this->controller->methods = $array;

		$this->controller->render('view', array(
			'model' => $this->controller->loadModel($id),
			'substances' => $substances,
			'methods' => $methods,
		));
	}

}
