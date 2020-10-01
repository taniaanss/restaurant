<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menu extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'menu_id' => [
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'menu_name' => [
				'type' => 'VARCHAR',
				'constraint' => 100,

			],
			'menu_price' => [
				'type' => 'INT',
				'constraint' => 100,
			],
			'menu_stock' => [
				'type' => 'INT',
				'constraint' => 20,
			],
			'menu_category' => [
				'type' => 'INT',
				'constraint' => 10,
			],
			'photo' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'description' => [
				'type' => 'TEXT',

			]
		]);


		$this->forge->dropTable('menu', TRUE);
		$this->forge->addKey('menu_id', TRUE);
		$this->forge->createTable('menu');
	}


	public function down()
	{
		//
	}
}
