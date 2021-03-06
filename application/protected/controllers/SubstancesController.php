<?php

class SubstancesController extends Controller {

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
				'actions' => array('index', 'view'),
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
		//$project = $this->getProject($model);
		$properties = $this->getProperties($id);
		$this->render('view', array(
			'model' => $model,
			//'project' => $project,
			'properties' => $properties,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($projectId) {
		$model = new Substance;
		$model->projectId = $projectId;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Substance'])) {
			$model->attributes = $_POST['Substance'];
			if ($model->save())
				$this->redirect(array($this->getProjectViewURL(NULL, $model)));
		}

		
		$project = Project::model()->findByPk($projectId);
		

		if ($project === null) {
			throw new CHttpException(400, "Project with projectId = '{$projectId}' not found");
		}

		$this->render('create', array(
			'model' => $model,
			'project' => $project
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Substance'])) {
			$model->attributes = $_POST['Substance'];
			if ($model->save())
				$this->redirect(array($this->getProjectViewURL(NULL, $model)));
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
		$model = $this->loadModel($id);
		$project = $this->getProject($model);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array($this->getProjectViewURL($project)));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($projectId) {
		$dataProvider = new CActiveDataProvider('Substance', array(
					'criteria' => array(
						'condition' => 'projectId=' . $projectId)
				));

		if (Yii::app()->request->isAjaxRequest) {
			$result = array();
			foreach ($dataProvider->getData() as $value) {
				$result[$value->id] = $value->name;
			}
			echo json_encode($result);
			Yii::app()->end();
		}

		$this->render('index', array(
			'dataProvider' => $dataProvider,
			'project' => Project::model()->findByPk($projectId),
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Substance('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Substance']))
			$model->attributes = $_GET['Substance'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Substance the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Substance::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Substance $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'substance-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function getProject($model) {
		$projectId = $model->projectId;

		return Project::model()->findByPk($projectId);
	}

	protected function getProjectViewURL($project = NULL, $model = NULL) {
		if (!(isset($project) || isset($model))) {
			throw new CException("Not given the requested parameters");
		}

		$projectId = (isset($project)) ? $project->id : $model->projectId;
		return "/projects/$projectId";
	}

	protected function getProperties($id) {

		$dataProvider = new CActiveDataProvider('Propertie', array(
					'criteria' => array(
						'with' => array(
							'substance' => array(
								'condition' => 'substanceId = :substanceId',
								'params' => array(':substanceId' => $id),
								'together' => true,
							)
						),
					),
				));

		return $dataProvider;
	}

}
