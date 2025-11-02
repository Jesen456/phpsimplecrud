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
        $tgl = $data['tgl'] ?? date('Y-m-d');  // DIPERBAIKI: Y-m-d
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
        // DIPERBAIKI: Query lengkap + alias
        $query = "SELECT m.id_member, m.kode_member, m.nama_member, 
                         ms.nama_membership, k.nama_kota, 
                         m.alamat, m.email, m.telp, m.tgl_daftar, m.status_member 
                  FROM tb_member m
                  LEFT JOIN tb_membership ms ON m.membership = ms.kode_membership
                  LEFT JOIN tb_kota k ON m.kota = k.id_kota";
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
                    'membership' => $row['nama_membership'] ?? '-',  // AMAN
                    'kota' => $row['nama_kota'] ?? '-',             // AMAN
                    'alamat' => $row['alamat'],
                    'email' => $row['email'],
                    'telp' => $row['telp'],
                    'tgl' => $row['tgl_daftar'],        
                    'status' => $row['status_member']
                ];
            }
        }
        // Mengembalikan array data mahasiswa
        return $member;
    }

    // Method untuk mengambil data mahasiswa berdasarkan ID
    public function getUpdateMember($id){
        // DIPERBAIKI: Query benar + alias + WHERE
        $query = "SELECT m.*, ms.nama_membership, k.nama_kota 
                  FROM tb_member m
                  LEFT JOIN tb_membership ms ON m.membership = ms.kode_membership
                  LEFT JOIN tb_kota k ON m.kota = k.id_kota
                  WHERE m.id_member = ?";
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
                'kode' => $row['kode_member'],
                'nama' => $row['nama_member'],
                'membership' => $row['membership'],           // kode
                'nama_membership' => $row['nama_membership'] ?? '',
                'kota' => $row['kota'],
                'nama_kota' => $row['nama_kota'] ?? '',
                'alamat' => $row['alamat'],
                'email' => $row['email'],
                'telp' => $row['telp'],
                'tgl' => $row['tgl_daftar'],
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
        $kode     = $data['kode'] ?? '';
        $nama     = $data['nama'];
        $prodi    = $data['membership'];
        $alamat   = $data['alamat'];
        $kota     = $data['kota'];
        $email    = $data['email'];
        $telp     = $data['telp'];
        $tgl      = $data['tgl'] ?? date('Y-m-d');
        $status   = $data['status'];
        // DIPERBAIKI: Tambah = di setiap SET
        $query = "UPDATE tb_member SET 
                  kode_member = ?, nama_member = ?, membership = ?, 
                  alamat = ?, kota = ?, email = ?, telp = ?, 
                  tgl_daftar = ?, status_member = ? 
                  WHERE id_member = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        // DIPERBAIKI: Urutan & jumlah parameter
        $stmt->bind_param("ssssissssi", $kode, $nama, $prodi, $alamat, $kota, $email, $telp, $tgl, $status, $id);
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
        // DIPERBAIKI: Query lengkap
        $query = "SELECT m.id_member, m.kode_member, m.nama_member, 
                         ms.nama_membership, k.nama_kota, 
                         m.alamat, m.email, m.telp, m.tgl_daftar, m.status_member 
                  FROM tb_member m
                  LEFT JOIN tb_membership ms ON m.membership = ms.kode_membership
                  LEFT JOIN tb_kota k ON m.kota = k.id_kota
                  WHERE m.kode_member LIKE ? OR m.nama_member LIKE ? OR m.email LIKE ?";
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
                    'kode' => $row['kode_member'],
                    'nama' => $row['nama_member'],
                    'membership' => $row['nama_membership'] ?? '-',
                    'kota' => $row['nama_kota'] ?? '-',
                    'alamat' => $row['alamat'],
                    'email' => $row['email'],
                    'telp' => $row['telp'],
                    'tgl'  => $row['tgl_daftar'],
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