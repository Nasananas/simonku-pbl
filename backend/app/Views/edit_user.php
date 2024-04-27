<?php
// Inisialisasi nilai data
$data = array(
    'id_user' => '2', 
    'email'=>'Daren@staff.uns.ac.id',
    'password' => 'Daren123',
    'role' => 'admin',
);


$id_user = $data['id_user']; 
$email = $data['email']; 
$password = $data['password']; 
$role = $data['role']; 
?>
<form method="POST" action="/update/user/">
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email" value="Daren@staff.uns.ac.id"><br>
    <label for="password">Password:</label><br>
    <input type="text" id="password" name="password" value="Daren123"><br>
    <label for="role">Role:</label><br>
    <input type="text" id="role" name="role" value="admin"><br>
    <input type="submit" value="Submit">
</form>

