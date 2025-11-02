<?php

// Memasukkan file konfigurasi database
include_once 'db-config.php';

class MasterData extends Database {

    // Method untuk mendapatkan daftar membership
    public function getMembership(){
        $query = "SELECT * FROM tb_membership";
        $result = $this->conn->query($query);
        $membership = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $membership[] = [
                    'kode' => $row['kode_membership'],
                    'nama' => $row['nama_membership'],
                    'harga' => $row['harga'],
                    'durasi' => $row['durasi_hari'],
                ];
            }
        }
        return $membership;
    }

    // Method untuk mendapatkan daftar kota
    public function getKota(){
        $query = "SELECT * FROM tb_kota";
        $result = $this->conn->query($query);
        $kota = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $kota[] = [
                    'id' => $row['id_kota'],
                    'nama' => $row['nama_kota']
                ];
            }
        }
        return $kota;
    }

    // Method untuk mendapatkan daftar status member menggunakan array statis
    public function getStatus(){
        return [
            ['id' => 1, 'nama' => 'Aktif'],
            ['id' => 2, 'nama' => 'Tidak Aktif'],
            ['id' => 3, 'nama' => 'Cuti'],
            ['id' => 4, 'nama' => 'Expired']
        ];
    }

    // Method untuk input data membership
public function inputMembership($data){
    // DIPERBAIKI: Cek apakah key ada & tidak kosong
    $kodeMembership = $data['kode'] ?? '';
    $namaMembership = $data['nama'] ?? '';
    $harga = isset($data['harga']) && $data['harga'] !== '' ? (int)$data['harga'] : 0;
    $durasi = isset($data['durasi']) && $data['durasi'] !== '' ? (int)$data['durasi'] : 0;

    // Validasi minimal
    if (empty($kodeMembership) || empty($namaMembership) || $harga <= 0 || $durasi <= 0) {
        return false;
    }

    $query = "INSERT INTO tb_membership (kode_membership, nama_membership, harga, durasi_hari) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    if(!$stmt){
        return false;
    }
    $stmt->bind_param("ssii", $kodeMembership, $namaMembership, $harga, $durasi);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
    }

    // Method untuk mendapatkan data membership berdasarkan kode
    public function getUpdateMembership($id){
        $query = "SELECT * FROM tb_membership WHERE kode_membership = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $Membership = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $Membership = [
                'kode' => $row['kode_membership'],
                'nama' => $row['nama_membership'],
                'harga' => $row['harga'],
                'durasi' => $row['durasi_hari'],
            ];
        }
        $stmt->close();
        return $Membership;
    }

    // Method untuk mengedit data membership
    public function updateMembership($data){
        $kodeMembership = $data['kode'];
        $namaMembership = $data['nama'];
        $harga = $data['harga'];
        $durasi = $data['durasi'];
        $query = "UPDATE tb_membership SET nama_membership = ?, harga = ?, durasi_hari = ? WHERE kode_membership = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("siis", $namaMembership, $harga, $durasi, $kodeMembership);  // URUTAN & JUMLAH BENAR
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk menghapus data membership
    public function deleteMembership($id){
        $query = "DELETE FROM tb_membership WHERE kode_membership = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk input data kota
    public function inputKota($data){
        $namaKota = $data['nama'];
        $query = "INSERT INTO tb_kota (nama_kota) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $namaKota);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk mendapatkan data kota berdasarkan id
    public function getUpdateKota($id){
        $query = "SELECT * FROM tb_kota WHERE id_kota = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $kota = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $kota = [
                'id' => $row['id_kota'],
                'nama' => $row['nama_kota']
            ];
        }
        $stmt->close();
        return $kota;
    }

    // Method untuk mengedit data kota
    public function updateKota($data){
        $idKota = $data['id'];
        $namaKota = $data['nama'];
        $query = "UPDATE tb_kota SET nama_kota = ? WHERE id_kota = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("si", $namaKota, $idKota);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk menghapus data kota
    public function deleteKota($id){
        $query = "DELETE FROM tb_kota WHERE id_kota = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

}

?>