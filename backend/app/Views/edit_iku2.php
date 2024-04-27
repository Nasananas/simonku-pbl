<?php
// Inisialisasi nilai data
$data = array(
    'id_mahasiswa' => '1', 
    'nama_mahasiswa' => 'Hanan	MBKM	20	Tidak ada	---	Susi S.Pd.,M.Pd',
    'aktivitas' => 'MBKM',
    'sks' => '20',
    'prestasi' => 'Tidak ada',
    'tingkat_lomba' => '---',
    'dosen_pembimbing' => 'Susi S.Pd.,M.Pd'
);

$id_mahasiswa = $data['id_mahasiswa']; 
$nama_mahasiswa = $data['nama_mahasiswa']; 
$aktivitas = $data['aktivitas']; 
$sks = $data['sks']; 
$prestasi = $data['prestasi'];
$tingkat_lomba = $data['tingkat_lomba']; 
$dosen_pembimbing = $data['dosen_pembimbing']; 
?>
<form method="POST" action="/updateiku2/iku2/">
    <label for="nama_mahasiswa">Nama Mahasiswa:</label><br>
    <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" value="<?php echo $nama_mahasiswa ?>"><br>
    <label for="aktivitas">Aktivitas:</label><br>
    <input type="text" id="aktivitas" name="aktivitas" value="<?php echo $aktivitas ?>"><br>
    <label for="sks">Sks:</label><br>
    <input type="text" id="sks" name="sks" value="<?php echo $sks ?>"><br>
    <label for="prestasi">Prestasi:</label><br>
    <input type="text" id="prestasi" name="prestasi" value="<?php echo $prestasi ?>"><br>
    <label for="tingkat_lomba">Tingkat Lomba:</label><br>
    <input type="text" id="tingkat_lomba" name="tingkat_lomba" value="<?php echo $tingkat_lomba ?>"><br>
    <label for="dosen_pembimbing">Dosen Pembimbing:</label><br>
    <input type="text" id="dosen_pembimbing" name="dosen_pembimbing" value="<?php echo $dosen_pembimbing ?>"><br>
    <input type="submit" value="Submit">
</form>
