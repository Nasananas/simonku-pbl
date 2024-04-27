<?php
// Inisialisasi nilai data
$data = array(
    'id_dosen' => '1', 
    'nama_dosen' => 'Lanwu S.Kom',
    'aktivitas_dosen' => 'Bertridharma di Kampus Lain',
);

$id_dosen = $data['id_dosen']; 
$nama_dosen = $data['nama_dosen']; 
$aktivitas_dosen = $data['aktivitas_dosen']; 

?>
<form method="POST" action="/updateiku3/iku3/">
    <label for="nama_dosen">Nama Dosen:</label><br>
    <input type="text" id="nama_dosen" name="nama_dosen" value="<?php echo $nama_dosen ?>"><br>
    <label for="aktivitas_dosen">Aktivitas Dosen:</label><br>
    <input type="text" id="aktivitas_dosen" name="aktivitas_dosen" value="<?php echo $aktivitas_dosen ?>"><br>
    <input type="submit" value="Submit">
</form>
