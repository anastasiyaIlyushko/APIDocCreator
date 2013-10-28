<?php

class DcValueWithDescriptionColumn extends TbDataColumn {

	public $description = null;
 
	protected function renderDataCellContent($row, $data) {

		$value = $data->getAttribute($this->name);
		$description = $data->getAttribute($this->description);
		echo $value === null 
			? $this->grid->nullDisplay 
			: CHtml::tag('div', array('style' => 'clear: both;'), $value) . CHtml::tag('div', array('style' => "color: #808080;"), $description);
	}
}
