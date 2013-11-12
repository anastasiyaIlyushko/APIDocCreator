<?php

class PropertiesController extends Controller {

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array('allow', // allow all users to perform 'index' and 'view' actions
				'actions' => array('index', 'view', 'options'),
				'users' => array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create', 'update'),
				'users' => array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('admin', 'delete'),
				'users' => array('admin'),
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$model = $this->loadModel($id);
		
		$this->redirect(array('update', 'id' => $model->id));

//		$this->render('view', array(
//			'model' => $this->loadModel($id),
//		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new CollectPropertie;
		$model->struct = new PropertieStructure;

		if (Yii::app()->request->isAjaxRequest) {
			echo json_encode($model);
			Yii::app()->end();
		}

		if (isset($_POST['CollectPropertie'])) {
			$model->attributes = $_POST['CollectPropertie'];
			$model->struct->attributes = $_POST['PropertieStructure'];
			if ($model->save()) {
				$this->redirect(array('update', 'id' => $model->id));
			}
		}
		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel($id);
		if (Yii::app()->request->isAjaxRequest) {
			echo json_encode($model);
			Yii::app()->end();
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['CollectPropertie'])) {
			$model->attributes = $_POST['CollectPropertie'];
			$model->struct->attributes = $_POST['PropertieStructure'];
			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('CollectPropertie');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Propertie('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Propertie']))
			$model->attributes = $_GET['Propertie'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Propertie the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = CollectPropertie::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Propertie $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'propertie-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionOptions() {
		if (isset($_GET['optionType'])) {

			$defaultOptions = array('null' => 'checkbox', 'required' => 'checkbox');

			switch ($_GET['optionType']) {
				case '0': $result = array('min' => 'textfield', 'max' => 'textfield');
					break;
				case '1': $result = array('min' => 'textfield', 'max' => 'textfield');
					break;
				case '2': $result = array('objectId' => 'select');
					break;
				case '3': $result = array('itemType' => 'select');
					break;
				default: $result = FALSE;
			}

			echo json_encode(array_merge($result, $defaultOptions));
		} else {
			echo json_encode(PropertieStructure::getTypesList());
		}
		Yii::app()->end();
	}

}
