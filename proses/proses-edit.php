<?php

// Memasukkan file class-member.php
include_once '../config/class-member.php';
// Membuat objek dari class Member
$member = new Member();

// Mengambil data dari form
$dataMember = [
    'id'         => $_POST['id'],
    'kode'       => $_POST['kode'] ?? '',           // TAMBAH: kode
    'nama'       => $_POST['nama'],
    'membership' => $_POST['membership'],
    'alamat'     => $_POST['alamat'],
    'kota'       => $_POST['kota'],
    'email'      => $_POST['email'],
    'telp'       => $_POST['telp'],
    'tgl'        => $_POST['tgl'] ?? date('Y-m-d'), // AMAN: default hari ini
    'status'     => $_POST['status']
];

// Memanggil method editMember
$edit = $member->editMember($dataMember);

// Cek hasil
if($edit){
    
    header("Location: ../data-list.php?status=editsuccess");
} else {
    header("Location: ../data-edit.php?id=".$dataMember['id']."&status=failed");  // DIPERBAIKI: $dataMember
}
exit;
?>