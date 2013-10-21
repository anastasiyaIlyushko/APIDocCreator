<?php

class m131021_192406_create_table_project extends CDbMigration
{
	public function up()
	{
	    $this->createTable('project', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'description' => 'text',
        ));
	}

	public function down()
	{
		//echo "m131021_192406_create_table_project does not support migration down.\n";
		//return false;
		$this->dropTable('project');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}yiic migrate
	*/
}