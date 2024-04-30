<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Perfil extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'nombre' => [
                    'type' => 'VARCHAR',
                    'constraint' => 20,
                    'unique' => TRUE
                ],

                'descripcion' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'nullable' => true
                ],
                'estado' => [
                    'type' => 'BOOLEAN',
                    'default' => 1
                ],
                'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                'deleted_at TIMESTAMP NULL'
            ]
        );

        $this->forge->addKey('id', true);
        $this->forge->createTable('perfiles', true);
    }

    public function down()
    {
        $this->forge->dropTable('perfiles', true);
    }
}
