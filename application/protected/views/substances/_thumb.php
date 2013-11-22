<?php
Yii::app()->clientScript->registerScript('displayDescription', "
  $('.field').live('click', function(e){
    if (e.target.tagName == 'A'){
      $(\".objects a[href='\"+$(e.target).attr('href')+\"']\").trigger('click');
    }else{
      $(this).children('.props').toggle();
    }
  });
", CClientScript::POS_READY);
?>

<style>
	.head{
		font-weight: bold;
	}
	.field small {
		font-size: 80%;
		font-weight: normal;
	}
	li.field:hover{
		background-color:#e2e2e2;
		border-color: #EEE;
		cursor: pointer; 
	}
</style>
<li class="span2 well field">
	<div class="head">
		<?php echo $data->name; ?>
		<small>
			<?php
			echo PropertiesType::getName((int) $data->structure->type);
			$options = json_decode($data->structure->options, TRUE);
			?>
		</small>
		<small class="link">
			<a href="<?php echo Yii::app()->createUrl('substances/view', array('id' => $options['objectId'])); ?>">
				<?php
				echo Substance::model()->findByPk($options['objectId'])->name;
				?>
			</a>
		</small>
		<div class="pull-right">
			<small></small>
			<i class="icon-chevron-down"></i>
		</div>
	</div>
	<div class="props" style="display: none;">
		<p><?php echo $data->description; ?></p>
	</div>
</li>
