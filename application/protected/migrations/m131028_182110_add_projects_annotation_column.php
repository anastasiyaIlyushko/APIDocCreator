<?php

class m131028_182110_add_projects_annotation_column extends CDbMigration
{
	public function up()
	{
		$this->addColumn("Projects", "annotation", "string");
	}

	public function down()
	{
		$this->dropColumn("Projects", "annotation");
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