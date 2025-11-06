<?php 

include_once 'config/class-master.php';
include_once 'config/class-member.php';  
$master = new MasterData();
$member = new Member();  
// TAMBAHKAN: Ambil daftar membership
$membershipList = $master->getMembership();  // <--- BARIS BARU
$kotaList = $master->getKota();  
$statusList = $master->getStatus();
$datamember = $member->getUpdateMember($_GET['id']);  
if(isset($_GET['status'])){
    if($_GET['status'] == 'failed'){
        echo "<script>alert('Gagal mengubah data mahasiswa. Silakan coba lagi.');</script>";
    }
}
?>
<!doctype html>
<html lang="en">
	<head>
		<?php include 'template/header.php'; ?>
	</head>

	<body class="layout-fixed fixed-header fixed-footer sidebar-expand-lg sidebar-open bg-body-tertiary">

		<div class="app-wrapper">

			<?php include 'template/navbar.php'; ?>

			<?php include 'template/sidebar.php'; ?>

			<main class="app-main">

				<div class="app-content-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="mb-0">Edit Member</h3>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-end">
									<li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Data</li>
								</ol>
							</div>
						</div>
					</div>
				</div>

				<div class="app-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Formulir Member</h3>
										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse">
												<i data-lte-icon="expand" class="bi bi-plus-lg"></i>
												<i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
											</button>
											<button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
												<i class="bi bi-x-lg"></i>
											</button>
										</div>
									</div>
                                    <form action="proses/proses-edit.php" method="POST">
									    <div class="card-body">
                                            <input type="hidden" name="id" value="<?php echo $datamember['id']; ?>">

                                            <!-- TAMBAHAN: KODE MEMBER -->
                                            <div class="mb-3">
                                                <label for="kode" class="form-label">Kode Member</label>
                                                <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan Kode Member" value="<?php echo $datamember['kode']; ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap Member" value="<?php echo $datamember['nama']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="prodi" class="form-label">membership</label>
                                                <select class="form-select" id="membership" name="membership" required>
                                                    <option value="" selected disabled>Pilih membership</option>
                                                    <?php 
                                                    foreach ($membershipList as $membership){
                                                        $selectedMembership = "";
                                                        if($datamember['membership'] == $membership['kode']){
                                                            $selectedMembership = "selected";
                                                        }
                                                        echo '<option value="'.$membership['kode'].'" '.$selectedMembership.'>'.$membership['nama'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat Lengkap Sesuai KTP" required><?php echo $datamember['alamat']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kota" class="form-label">kota</label>
                                                <select class="form-select" id="kota" name="kota" required>
                                                    <option value="" selected disabled>Pilih Kota</option>
                                                    <?php
                                                    foreach ($kotaList as $kota){
                                                        $selectedKota = "";
                                                        if($datamember['kota'] == $kota['id']){
                                                            $selectedKota = "selected";
                                                        }
                                                        echo '<option value="'.$kota['id'].'" '.$selectedKota.'>'.$kota['nama'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Valid dan Benar" value="<?php echo $datamember['email']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="telp" class="form-label">Nomor Telepon</label>
                                                <input type="tel" class="form-control" id="telp" name="telp" placeholder="Masukkan Nomor Telpon/HP" value="<?php echo $datamember['telp']; ?>" pattern="[0-9+\-\s()]{6,20}" required>
                                            </div>

                                            <!-- TAMBAHAN: TANGGAL DAFTAR -->
                                            <div class="mb-3">
                                                <label for="tgl" class="form-label">Tanggal Daftar</label>
                                                <input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo $datamember['tgl']; ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status Member</label>
                                                <select class="form-select" id="status" name="status" required>
                                                    <option value="" selected disabled>Pilih Status</option>
                                                    <?php 
                                                    foreach ($statusList as $status){
                                                        $selectedStatus = "";
                                                        if($datamember['status'] == $status['id']){
                                                            $selectedStatus = "selected";
                                                        }
                                                        echo '<option value="'.$status['id'].'" '.$selectedStatus.'>'.$status['nama'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
									    <div class="card-footer">
                                            <button type="button" class="btn btn-danger me-2 float-start" onclick="window.location.href='data-list.php'">Batal</button>
                                            <button type="submit" class="btn btn-warning float-end">Update Data</button>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</main>

			<?php include 'template/footer.php'; ?>

		</div>
		
		<?php include 'template/script.php'; ?>

	</body>
</html>