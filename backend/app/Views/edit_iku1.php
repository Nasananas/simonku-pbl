<?php
// Inisialisasi nilai data
$data = array(
    'iku1_id' => '1000', 
    'no_ijazah'=>'DN-06000023/5688',
    'nama_alumni' => 'Raya',
    'status' => 'mendapat pekerjaan',
    'gaji' => 'lebih dari 1.2xUMP',
    'masa_tunggu' => 'antara 6 sampai 12bulan'
);


$iku1_id = $data['iku1_id']; 
$no_ijazah = $data['no_ijazah']; 
$nama_alumni = $data['nama_alumni']; 
$status = $data['status']; 
$gaji = $data['gaji']; 
$masa_tunggu = $data['masa_tunggu']; 
?>
<form method="POST" action="/update/iku1/">
    <label for="no_ijazah">No Ijazah:</label><br>
    <input type="text" id="no_ijazah" name="no_ijazah" value="DN-06000023/5688"><br>
    <label for="nama_alumni">Nama Alumni:</label><br>
    <input type="text" id="nama_alumni" name="nama_alumni" value="Raya"><br>
    <label for="status">Status:</label><br>
    <input type="text" id="status" name="status" value="mendapat pekerjaan"><br>
    <label for="gaji">Gaji:</label><br>
    <input type="text" id="gaji" name="gaji" value="lebih dari 1.2xUMP"><br>
    <label for="masa_tunggu">Masa Tunggu:</label><br>
    <input type="text" id="masa_tunggu" name="masa_tunggu" value="antara 6 sampai 12bulan"><br>
    <input type="submit" value="Submit">
</form>

