<?php

class m131120_053828_create_methods_table extends CDbMigration {

	public function up() {
		$this->createTable('methods', array(
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'description' => 'text',
			'type' => 'string NOT NULL',
			'uri' => 'string NOT NULL',
			'projectId' => 'integer',
		));
	}

	public function down() {
		$this->dropTable('methods');
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