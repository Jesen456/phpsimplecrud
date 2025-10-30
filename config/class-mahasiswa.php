<?php 

// Memasukkan file konfigurasi database
include_once 'db-config.php';
class Member extends Database {

    // Method untuk input data member
    public function inputMember($data){
        // Mengambil data dari parameter $data
        $kode      = $data['kode'];
        $nama     = $data['nama'];
        $membership  = $data['membership'];
        $alamat  = $data['alamat'];
        $kota = $data['kota'];
        $email   = $data['email'];
        $telp     = $data['telp'];
        $tgl = $data['tgl'];
        $status   = $data['status'];
        // Menyiapkan query SQL untuk insert data menggunakan prepared statement
        $query = "INSERT INTO tb_member (kode_member, nama_member, membership, alamat, kota, email, telp, tgl_daftar, status_member) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        // Mengecek apakah statement berhasil disiapkan
        if(!$stmt){
            return false;
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("ssssissss", $kode, $nama, $membership, $alamat, $kota, $email, $telp, $tgl, $status);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk mengambil semua data mahasiswa
    public function getAllMember(){
        // Menyiapkan query SQL untuk mengambil data mahasiswa beserta prodi dan provinsi
        $query = "SELECT id_member, kode_member, nama_member, membership, alamat, kota, email, telp, tgl_daftar, status_member 
                  FROM tb_member
                  LEFT JOIN tb_membership ON membership = kode_membership
                  LEFT JOIN tb_kota ON kota = id_kota";
        $result = $this->conn->query($query);
        // Menyiapkan array kosong untuk menyimpan data mahasiswa
        $member = [];
        // Mengecek apakah ada data yang ditemukan
        if($result->num_rows > 0){
            // Mengambil setiap baris data dan memasukkannya ke dalam array
            while($row = $result->fetch_assoc()) {
                $member[] = [
                    'id' => $row['id_member'],
                    'kode' => $row['kode_member'],
                    'nama' => $row['nama_member'],
                    'membership' => $row['nama_membership'],
                    'kota' => $row['nama_kota'],
                    'alamat' => $row['alamat'],
                    'email' => $row['email'],
                    'telp' => $row['telp'],
                    'status' => $row['status_member']
                ];
            }
        }
        // Mengembalikan array data mahasiswa
        return $member;
    }

    // Method untuk mengambil data mahasiswa berdasarkan ID
    public function getUpdateMember($id){
        // Menyiapkan query SQL untuk mengambil data mahasiswa berdasarkan ID menggunakan prepared statement
        $query = "SELECT * FROM tb_member WHERE id_member = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = false;
        if($result->num_rows > 0){
            // Mengambil data member 
            $row = $result->fetch_assoc();
            // Menyimpan data dalam array
            $data = [
                'id' => $row['id_member'],
                'nim' => $row['kode_member'],
                'nama' => $row['nama_member'],
                'prodi' => $row['membership'],
                'alamat' => $row['alamat'],
                'provinsi' => $row['kota'],
                'email' => $row['email'],
                'telp' => $row['telp'],
                'status' => $row['status_member']
            ];
        }
        $stmt->close();
        // Mengembalikan data mahasiswa
        return $data;
    }

    // Method untuk mengedit data mahasiswa
    public function editMember($data){
        // Mengambil data dari parameter $data
        $id       = $data['id'];
        $nim      = $data['kode'];
        $nama     = $data['nama'];
        $prodi    = $data['membership'];
        $alamat   = $data['alamat'];
        $provinsi = $data['kota'];
        $email    = $data['email'];
        $telp     = $data['telp'];
        $status   = $data['status'];
        // Menyiapkan query SQL untuk update data menggunakan prepared statement
        $query = "UPDATE tb_member SET kode_member = ?, nama_member = ?, membership = ?, alamat = ?, kota = ?, email = ?, telp = ?, status_member = ? WHERE id_member = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("ssssisssi", $nim, $nama, $prodi, $alamat, $provinsi, $email, $telp, $status, $id);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk menghapus data mahasiswa
    public function deleteMember($id){
        // Menyiapkan query SQL untuk delete data menggunakan prepared statement
        $query = "DELETE FROM tb_member WHERE id_member = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk mencari data mahasiswa berdasarkan kata kunci
    public function searchMember($kataKunci){
        // Menyiapkan LIKE query untuk pencarian
        $likeQuery = "%".$kataKunci."%";
        // Menyiapkan query SQL untuk pencarian data member menggunakan prepared statement
        $query = "SELECT id_member, kode_member, nama_member, membership, nama_kota, alamat, email, telp, status_member 
                  FROM tb_member
                  LEFT JOIN tb_membership ON membership = kode_membership
                  LEFT JOIN tb_kota ON kota = id_kota
                  WHERE kode_member LIKE ? OR nama_member LIKE ? OR email LIKE ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            // Mengembalikan array kosong jika statement gagal disiapkan
            return [];
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("sss", $likeQuery, $likeQuery, $likeQuery);
        $stmt->execute();
        $result = $stmt->get_result();
        // Menyiapkan array kosong untuk menyimpan data mahasiswa
        $member = [];
        if($result->num_rows > 0){
            // Mengambil setiap baris data dan memasukkannya ke dalam array
            while($row = $result->fetch_assoc()) {
                // Menyimpan data mahasiswa dalam array
                $member[] = [
                    'id' => $row['id_member'],
                    'nim' => $row['kode_member'],
                    'nama' => $row['nama_member'],
                    'prodi' => $row['nama_membership'],
                    'kota' => $row['nama_kota'],
                    'alamat' => $row['alamat'],
                    'email' => $row['email'],
                    'telp' => $row['telp'],
                    'status' => $row['status_member']
                ];
            }
        }
        $stmt->close();
        // Mengembalikan array data member yang ditemukan
        return $member;
    }

}
?>