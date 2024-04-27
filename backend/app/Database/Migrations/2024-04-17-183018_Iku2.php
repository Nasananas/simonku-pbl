<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Iku2 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'iku2_id'           => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'NIM'               => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'aktivitas'         => [
                'type'           => 'ENUM',
                'constraint'     => ['Studi Independent', 'MBKM', 'Proyek Kemanusiaan', 'Berwirausaha', 'Kampus Mengajar', 'Pertukaran Mahasiswa', 'Program Base Learning', 'Lomba'],
            ],
            'sks'               => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'prestasi'          => [
                'type'           => 'ENUM',
                'constraint'     => ['Juara 1', 'Juara 2', 'Juara 3', 'Peserta (Internasional)', 'Tidak ada'],
            ],
            'tingkat_lomba'     => [
                'type'           => 'ENUM',
                'constraint'     => ['Internasional', 'Nasional', 'Provinsi', '---'],
            ],
            'dosen_pembimbing'  => [
                'type'           => 'INT', // Mengubah tipe data menjadi INT
                'constraint'     => 20,   // Sesuaikan constraint dengan constraint pada kolom NIDN di tabel Dosen
            ],
        ]);

        $this->forge->addPrimaryKey('iku2_id');
        $this->forge->addForeignKey('NIM', 'mahasiswa', 'NIM', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('dosen_pembimbing', 'dosen', 'NIDN', 'CASCADE', 'CASCADE'); // Menambahkan foreign key ke tabel Dosen
        $this->forge->createTable('iku2');
    }

    public function down()
    {
        $this->forge->dropTable('iku2');
    }
}
