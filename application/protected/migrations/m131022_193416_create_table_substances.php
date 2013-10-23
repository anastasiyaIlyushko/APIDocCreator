<?php

class m131022_193416_create_table_substances extends CDbMigration {

	public function up() {
		$this->createTable('substances', array(
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'description' => 'text NOT NULL',
			'projectId' => 'integer',
		));
	}

	public function down() {
		$this->dropTable('substances');
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