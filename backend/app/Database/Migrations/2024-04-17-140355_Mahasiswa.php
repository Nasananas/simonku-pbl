<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'NIM'               => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'nama_mahasiswa'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'angkatan'             => [
                'type'           => 'ENUM',
                'constraint'     => ['2021', '2022', '2023'],
            ],
        ]);

        $this->forge->addKey('NIM', true);
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}