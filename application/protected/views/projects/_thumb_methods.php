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
<li class="span9 well field">
	<div class="head">
		<a href="<?php echo Yii::app()->createUrl('methods/view', array('id' => $data->id)); ?>">
			<?php
			echo $data->name;
			?>
		</a>
		<?php echo $data->type.'&nbsp;'.$data->uri; ?>
		<div class="pull-right">
			<small>Desc</small>
			<i class="icon-chevron-down"></i>
		</div>
	</div>
	<div class="props" style="display: none;">
		<p><?php
		echo $data->description;
		//var_dump($data->properties)
		?></p>
		<table class='table table-bordered table-striped'>
			<thead>
			<th>
				Name
			</th>
			<th>
				Description
			</th>
			<th>
				type
			</th>
			</thead>
			<tbody>
				<?php foreach ($data->properties as $key => $propertie) { ?>
					<tr>
						<td>
							<?php echo $propertie->name; ?>
						</td>
						<td>
							<?php echo $propertie->description; ?>
						</td>
						<td>
							<?php echo PropertiesType::getName((int) $propertie->structure->type); ?>
						</td>
					</tr>
				<?php } ?>		
			</tbody>

		</table>


	</div>
</li>
