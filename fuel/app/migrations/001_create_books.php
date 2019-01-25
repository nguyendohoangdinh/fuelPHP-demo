<?php

namespace Fuel\Migrations;

class Create_books
{
	public function up()
	{
		\DBUtil::create_table('books', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'author' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'document' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'year' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'pages' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'price' => array('constraint' => '10,2', 'null' => false, 'type' => 'decimal'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('books');
	}
}