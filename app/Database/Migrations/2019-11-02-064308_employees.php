<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employees extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'	=>	[
				'type'	=>	'INT',
				'constraint'	=>	10,
				'unsigned'	=>	TRUE,
				'auto_increment'	=>	TRUE
			],
			'name'	=>	[
				'type'	=>	'VARCHAR',
				'constraint'	=>	'100',
			],
			'email'	=>	[
				'type'	=>	'VARCHAR',
				'constraint'	=>	'100',
			],
			'gender'	=>	[
				'type'	=>	'VARCHAR',
				'constraint'	=>	'50',
			],
			'nip'	=>	[
				'type'	=>	'INT',
				'constraint'	=>	'15',
			],
			'hobby'	=>	[
				'type'	=>	'VARCHAR',
				'constraint'	=>	'50',
			],
			'photo'	=>	[
				'type'	=>	'VARCHAR',
				'constraint'	=>	'255',
			]
		]);
		$this->forge->addKey('id',TRUE);
		$this->forge->createTable('employee_list');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('employee_list');
	}
}
