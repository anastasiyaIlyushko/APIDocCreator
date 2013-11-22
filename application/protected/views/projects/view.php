<?php
/* @var $this ProjectsController */
/* @var $model Project */

$this->breadcrumbs = array(
	'Projects' => array('index'),
	$model->name,
);

?>

<h1>View Project #<?php echo $model->id . "&nbsp;" . $model->name; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'name',
		'annotation',
		'description'
	),
));
?>

<h2>Substances of '<?php echo $model->name; ?>'</h2>
<?php

$this->widget('bootstrap.widgets.TbThumbnails', array(
	'dataProvider' => $substances,
	'template' => "{items}\n{pager}",
	'itemView' => '_thumb',
));

?>
<h2>Methods of '<?php echo $model->name; ?>'</h2>
<?php

$this->widget('bootstrap.widgets.TbThumbnails', array(
	'dataProvider' => $methods,
	'template' => "{items}\n{pager}",
	'itemView' => '_thumb_methods',
));
?>