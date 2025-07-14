<?php

namespace App\Database\Migration;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Users extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     =>       20,
                'auto_increment' =>     TRUE,
            ],
            'name' => [
                'type'       =>    'VARCHAR',
                'constraint' =>        '100',
            ],
            'username' => [
                'type'       =>    'VARCHAR',
                'constraint' =>        '100',
                'unique'     =>         TRUE,
            ],
            'email' => [
                'type'       =>    'VARCHAR',
                'constraint' =>        '100',
                'unique'     =>         TRUE,
            ],
            'password' => [
                'type'       =>    'VARCHAR',
                'constraint' =>        '255',
            ],
            'role' => [
                'type'       => 'role',
                'default'    => 'admin',
            ],
            'status' => [
                'type'       => 'status',
                'default'    => 'active',
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('(NOW())'),
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('(NOW())'),
            ],
        ];

        $this->db->query("CREATE TYPE role AS ENUM ('admin', 'member')");
        $this->db->query("CREATE TYPE status AS ENUM ('active', 'inactive')");
        $this->forge->addField($fields)
            ->addKey('id', true)
            ->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
