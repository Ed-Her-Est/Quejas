<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuario extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'perfil' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => false,
                ],
                'nombre' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'apaterno' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'amaterno' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'username' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'unique' => TRUE
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'unique' => TRUE
                ],
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'telefono' => [
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'unique'    => TRUE
                ],
                'direccion' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'nullable'  => TRUE
                ],
                'sexo' => [
                    'type' => 'CHAR',
                    'constraint' => 1
                ],
                'status' => [
                    'type' => 'BOOLEAN',
                    'default' => TRUE
                ],
                'fecha_nacimiento' => [
                    'type' => 'DATE'
                ],
                'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                'deleted_at TIMESTAMP NULL'
            ]
        );

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('perfil', 'perfiles', 'id');
        $this->forge->createTable('usuarios', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('usuarios', true);
    }
}
