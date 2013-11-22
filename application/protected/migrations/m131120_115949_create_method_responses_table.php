<?php

class m131120_115949_create_method_responses_table extends CDbMigration {

	public function up() {
		$this->createTable('methodResponses', array(
			'id' => 'pk',
			'description' => 'text',
			'status' => 'integer NOT NULL',
			'methodId' => 'integer  NOT NULL',
			'propertieId' => 'integer  NOT NULL',
		));
	}

	public function down() {
		$this->dropTable('methodResponces');
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