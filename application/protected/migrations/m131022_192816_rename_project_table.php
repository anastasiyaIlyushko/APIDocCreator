<?php

class m131022_192816_rename_project_table extends CDbMigration
{
	public function up()
	{
	    $this->renameTable('project', 'projects');
	}

	public function down()
	{
		$this->renameTable('projects', 'project');
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