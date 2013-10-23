<?php

class m131023_104209_create_table_properties extends CDbMigration {

	public function up() {
		$sql = "CREATE TABLE properties (
					id INTEGER PRIMARY KEY,
					name VARCHAR(255) NOT NULL,
					description VARCHAR(511) NOT NULL,
					type VARCHAR(64) NOT NULL,
					substanceId INTEGER,
					FOREIGN KEY(substanceId) REFERENCES substances(id))";
		$this->execute($sql);
	}

	public function down() {
		$this->dropTable('properties');
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