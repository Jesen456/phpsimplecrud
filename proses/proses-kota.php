<?php

// Memasukkan file class-master.php untuk mengakses class MasterData
include '../config/class-master.php';
// Membuat objek dari class MasterData
$master = new MasterData();
// Mengecek aksi yang dilakukan berdasarkan parameter GET 'aksi'
if($_GET['aksi'] == 'inputkota'){
    // Mengambil data provinsi dari form input menggunakan metode POST dan menyimpannya dalam array
    $dataKota = [
        'nama' => $_POST['nama']
    ];
    // Memanggil method inputProvinsi untuk memasukkan data provinsi dengan parameter array $dataProvinsi
    $input = $master->inputKota($dataKota);
    if($input){
        header("Location: ../master-kota-list.php?status=inputsuccess");
    } else {
        header("Location: ../master-kota-input.php?status=failed");
    }
} elseif($_GET['aksi'] == 'updatekota'){
    // Mengambil data provinsi dari form edit menggunakan metode POST dan menyimpannya dalam array
    $dataKota = [
        'id' => $_POST['id'],
        'nama' => $_POST['nama']
    ];
    // Memanggil method updateProvinsi untuk mengupdate data provinsi dengan parameter array $dataProvinsi
    $update = $master->updatekota($dataKota);
    if($update){
        header("Location: ../master-kota-list.php?status=editsuccess");
    } else {
        header("Location: ../master-kota-edit.php?id=".$dataKota['id']."&status=failed");
    }
} elseif($_GET['aksi'] == 'deletekota'){
    // Mengambil id provinsi dari parameter GET
    $id = $_GET['id'];
    // Memanggil method deleteProvinsi untuk menghapus data provinsi berdasarkan id
    $delete = $master->deleteKota($id);
    if($delete){
        header("Location: ../master-kota-list.php?status=deletesuccess");
    } else {
        header("Location: ../master-kota-list.php?status=deletefailed");
    }
}

?>