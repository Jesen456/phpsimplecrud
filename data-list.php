<?php
include_once 'config/class-member.php';
$member = new Member();
if(isset($_GET['status'])){
	if($_GET['status'] == 'inputsuccess'){
		echo "<script>alert('Data member berhasil ditambahkan.');</script>";
	} else if($_GET['status'] == 'editsuccess'){
		echo "<script>alert('Data member berhasil diubah.');</script>";
	} else if($_GET['status'] == 'deletesuccess'){
		echo "<script>alert('Data member berhasil dihapus.');</script>";
	} else if($_GET['status'] == 'deletefailed'){
		echo "<script>alert('Gagal menghapus data member. Silakan coba lagi.');</script>";
	}
}
$dataMember = $member->getAllMember();
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

			<link rel="stylesheet" href="assets/css/custom.css">
			<main class="app-main">

				<div class="app-content-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="mb-0">Daftar Member</h3>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-end">
									<li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
									<li class="breadcrumb-item active" aria-current="page">Beranda</li>
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
										<h3 class="card-title">Tabel Member</h3>
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
									<div class="card-body p-0 table-responsive">
										<table class="table table-striped" role="table">
											<thead>
												<tr>
													<th>Id</th>
													<th>Kode</th>
													<th>Nama</th>
													<th>Membership</th>
													<th>Alamat</th>
													<th>Kota</th>
													<th>Email</th>
													<th>Telp</th>
													<th>Tanggal Daftar</th>
													<th class="text-center">Status member</th>
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
													if(count($dataMember) == 0){
													    echo '<tr class="align-middle">
															<td colspan="10" class="text-center">Tidak ada data member.</td>
														</tr>';
													} else {
														foreach ($dataMember as $index => $member){
															// DIPERBAIKI: Normalisasi string
															$statusKey = strtolower(trim($member['status'] ?? ''));
															$statusBadge = match($statusKey) {
																'aktif'         => '<span class="badge bg-success">Aktif</span>',
																'nonaktif'      => '<span class="badge bg-danger">Tidak Aktif</span>',  // BARU
																default         => '<span class="badge bg-secondary">Unknown</span>'
															};

															echo '<tr class="align-middle">
																<td>'.($index + 1).'</td>
																<td>'.$member['kode'].'</td>
																<td>'.$member['nama'].'</td>
																<td>'.($member['membership'] ?? '-').'</td>
																<td>'.$member['alamat'].'</td>
																<td>'.$member['kota'].'</td>
															    <td>'.$member['email'].'</td>
																<td>'.$member['telp'].'</td>
																<td>'.$member['tgl'].'</td>
																<td class="text-center">'.$statusBadge.'</td>
																<td class="text-center">
																	<button type="button" class="btn btn-sm btn-warning me-1" onclick="window.location.href=\'data-edit.php?id='.$member['id'].'\'"><i class="bi bi-pencil-fill"></i> Edit</button>
																	<button type="button" class="btn btn-sm btn-danger" onclick="if(confirm(\'Yakin ingin menghapus data member ini?\')){window.location.href=\'proses/proses-delete.php?id='.$member['id'].'\'}"><i class="bi bi-trash-fill"></i> Hapus</button>
																</td>
															</tr>';
														}
													}
												?>
											</tbody>
										</table>
									</div>
									<div class="card-footer">
										<button type="button" class="btn btn-primary" onclick="window.location.href='data-input.php'"><i class="bi bi-plus-lg"></i> Tambah Member</button>
									</div>
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