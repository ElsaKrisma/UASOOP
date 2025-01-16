<?php
require_once('classes/Mahasiswa.php');
$mhs = new Mahasiswa();

if(isset($_GET['nim'])){
    $nim = $_GET['nim'];
    $mhs -> destroy($nim);
}
header("Location:index.php");