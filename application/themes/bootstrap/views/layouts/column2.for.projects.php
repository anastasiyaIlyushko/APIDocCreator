<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
	<div class="span2">
		<div id="left_sidebar">
			<?php
			/////////
			$this->beginWidget('zii.widgets.CPortlet', array(
					//'title' => $this->menuName,
			));
			$this->widget('bootstrap.widgets.TbMenu', array(
				'items' => $this->substances,
				'htmlOptions' => array('class' => 'substances'),
			));
			$this->endWidget();

			/////////
			$this->beginWidget('zii.widgets.CPortlet', array(
					//'title' => $this->menuName,
			));
			$this->widget('bootstrap.widgets.TbMenu', array(
				'items' => $this->methods,
				'htmlOptions' => array('class' => 'methods'),
			));
			$this->endWidget();
			?>
		</div>
	</div>
    <div class="span10">
        <div id="content">
			<?php echo $content; ?>
        </div><!-- content -->
    </div>
<!--    <div class="span3">
        <div id="sidebar">
			<?php //
//			$this->beginWidget('zii.widgets.CPortlet', array(
//				'title' => 'Operations',
//			));
//			$this->widget('bootstrap.widgets.TbMenu', array(
//				'items' => $this->menu,
//				'htmlOptions' => array('class' => 'operations'),
//			));
//			$this->endWidget();

//			/////////
//			$this->beginWidget('zii.widgets.CPortlet', array(
//                'title'=>$this->menuName,
//            ));
//            $this->widget('bootstrap.widgets.TbMenu', array(
//                'items'=>$this->substances,
//                'htmlOptions'=>array('class'=>'substances'),
//            ));
//            $this->endWidget();
			?>
        </div> sidebar 
    </div>-->
</div>
<?php $this->endContent(); ?>