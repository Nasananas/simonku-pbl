<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Iku1 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'iku1_id'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
                'first'          => true, // set as first column
            ],
            'no_ijazah'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'nama_alumni'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['mendapat pekerjaan', 'melanjutkan studi', 'wiraswasta', 'mencari pekerjaan'],
            ],
            'gaji' => [
                'type' => 'ENUM',
                'constraint' => ['lebih dari 1.2xUMP', 'kurang dari 1.2xUMP', 'belum berpendapatan'],
            ],
            'masa_tunggu' => [
                'type' => 'ENUM',
                'constraint' => ['kurang dari 6 bulan', 'antara 6 sampai 12bulan'],
            ],
            
        ]);

        $this->forge->addKey('iku1_id', true);

        $this->forge->createTable('iku1');
        
        // Set auto-increment starting from 1000
        $this->db->query('ALTER TABLE iku1 AUTO_INCREMENT = 1000');
    }

    public function down()
    {
        $this->forge->dropTable('iku1');
    }
}
