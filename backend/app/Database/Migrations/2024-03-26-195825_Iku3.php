<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Iku3 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dosen'               => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'nama_dosen'         => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'aktivitas_dosen'            => [
                'type'           => 'ENUM',
                'constraint'     => ['Bertridharma di Kampus Lain', 'Memiliki Pengalaman Sebagai Praktisi', 'Membimbing Mahasiswa Berprestasi'],
            ],
            
            
        ]);

        $this->forge->addKey('id_dosen', true);
        $this->forge->createTable('iku3');
       
    }

    public function down()
    {
        $this->forge->dropTable('iku3');
    }
}