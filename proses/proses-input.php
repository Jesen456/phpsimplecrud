<?php
include_once '../config/class-member.php';
// Membuat objek dari class Mahasiswa
$member = new Member();
// Mengambil data mahasiswa dari form input menggunakan metode POST dan menyimpannya dalam array
$dataMember = [
    'kode' => $_POST['kode'],
    'nama' => $_POST['nama'],
    'membership' => $_POST['membership'],
    'alamat' => $_POST['alamat'],
    'kota' => $_POST['kota'],
    'email' => $_POST['email'],
    'telp' => $_POST['telp'],
    'tgl' => $_POST['tgl'],
    'status' => $_POST['status']
];
// Memanggil method inputMahasiswa untuk memasukkan data mahasiswa dengan parameter array $dataMahasiswa
$input = $member->inputMember($dataMember);
// Mengecek apakah proses input berhasil atau tidak - true/false
if($input){
    // Jika berhasil, redirect ke halaman data-list.php dengan status inputsuccess
    header("Location: ../data-list.php?status=inputsuccess");
} else {
    // Jika gagal, redirect ke halaman data-input.php dengan status failed
    header("Location: ../data-input.php?status=failed");
}

?>