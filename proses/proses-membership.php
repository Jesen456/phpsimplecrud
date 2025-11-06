<?php
// Memasukkan file class-master.php untuk mengakses class MasterData
include '../config/class-master.php';
// Membuat objek dari class MasterData
$master = new MasterData();
// Mengecek aksi yang dilakukan berdasarkan parameter GET 'aksi'
if($_GET['aksi'] == 'inputmembership'){
    // DIPERBAIKI: TAMBAH 'harga' & 'durasi'
    $datamembership = [
        'kode'   => $_POST['kode'],
        'nama'   => $_POST['nama'],
        'harga'  => $_POST['harga'],
        'durasi' => $_POST['durasi']
    ];
    // Memanggil method inputMembership
    $input = $master->inputMembership($datamembership);
    if($input){
        header("Location: ../master-membership-list.php?status=inputsuccess");
    } else {
        header("Location: ../master-membership-input.php?status=failed");
    }
} elseif($_GET['aksi'] == 'updatemembership'){
    // DIPERBAIKI: TAMBAH 'harga' & 'durasi'
    $datamembership = [
        'kode'   => $_POST['kode'],
        'nama'   => $_POST['nama'],
        'harga'  => $_POST['harga'],
        'durasi' => $_POST['durasi']
    ];
    $update = $master->updateMembership($datamembership);
    if($update){
        header("Location: ../master-membership-list.php?status=editsuccess");
    } else {
        header("Location: ../master-membership-edit.php?id=".$datamembership['kode']."&status=failed");
    }
} elseif($_GET['aksi'] == 'deletemembership'){
    $id = $_GET['kode'] ?? '';

    // Validasi: kode tidak boleh kosong (karena string, bukan angka)
    if (empty($id)) {
        header("Location: ../master-membership-list.php?status=deletefailed");
        exit;
    }

    $delete = $master->deleteMembership($id);
    if($delete === true){
        header("Location: ../master-membership-list.php?status=deletesuccess");
    } else {
        header("Location: ../master-membership-list.php?status=deletefailed");
    }
    exit;
}
?>