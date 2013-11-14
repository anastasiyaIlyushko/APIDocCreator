<?php

class m131114_074555_create_SubstancePropertiesLink extends CDbMigration {

	public function up() {
		$this->createTable('substancePropertiesLink', array(
			'substanceId' => 'int NOT NULL',
			'propertieId' => 'int NOT NULL',
			'PRIMARY KEY (`substanceId`, `propertieId`)'
		));
	}

	public function down() {
		$this->dropTable('substancePropertiesLink');
	}

	/*
	  // Use safeUp/safeDown to do migration with transaction
	  public function safeUp()
	  {
	  }

	  public function safeDown()
	  {
	  }
	 */
}