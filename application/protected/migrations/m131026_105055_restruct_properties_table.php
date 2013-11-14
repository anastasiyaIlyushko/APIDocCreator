<?php

class m131026_105055_restruct_properties_table extends CDbMigration
{
    public function up()
	{
        $this->dropTable('properties');
        $this->createTable('properties', array(
            'id' => 'pk',
            'name' => 'string',
            'description' => 'text'
        ));

	    
        $this->createTable("propertiesStructure", array(
            'id' => 'pk',
            'parentId' => 'integer NOT NULL',
            'type' => 'integer NOT NULL',
            'options' => 'string',
			'propertieId' => 'integer'
	    ));
	    
	}

	public function down()
	{
	    $this->dropTable('properties');
	    $this->dropTable('propertiesStructure');
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