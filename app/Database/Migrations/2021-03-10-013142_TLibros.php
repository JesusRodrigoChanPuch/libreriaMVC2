<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TLibros extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_libro'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'titulo'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'autor'       => [
				'type'       => 'VARCHAR',
				'constraint' => '150',
			],
			'descripcionC'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'rutaImg'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
		]);
		$this->forge->addKey('id_libro', true);
		$this->forge->createTable('t_libros');
	}

	public function down()
	{
		$this->forge->dropTable('blog');
	}
}
