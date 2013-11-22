<?php

class PropertiesType {

	const STRING = 0;
	const NUMERIC = 1;
	const OBJECT = 2;
	const AN_ARRAY = 3;

	public static function getList() {
		return array(
			self::STRING => 'String',
			self::NUMERIC => 'Numeric',
			self::OBJECT => 'Object',
			self::AN_ARRAY => 'Array',
		);
	}

	public static function getName($type) {
		$typeList = self::getList();
		return $typeList[(int) $type];
	}

}