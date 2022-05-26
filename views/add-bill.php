<?php
if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: ./403.php');
    exit;
}

$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Tagihan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="./dashboard.php?page=bill-lists">List Tagihan</a></li>
                    <li class="breadcrumb-item active">Tambah Tagihan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="./dashboard.php?page=bill-lists" class="btn btn-primary mb-3">
                    <i class="fas fa-arrow-left mr-1"></i>
                    Kembali
                </a>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Tagihan</h3>
                    </div>
                    <form action="./app/controllers/BillController.php" method="POST" autocomplete="off">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nama_tagihan">Nama Tagihan</label>
                                        <input type="text" class="form-control <?= isset($error['nama_tagihan']) ? 'is-invalid' : '' ?>" id="nama_tagihan" name="nama_tagihan"
                                               value="<?= $error ? $error['old']['nama_tagihan'] : '' ?>" placeholder="Masukkan nama tagihan">
                                        <?= isset($error['nama_tagihan']) ? '<div class="invalid-feedback">' . $error['nama_tagihan'] . '</div>' : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun_tagihan">Tahun Tagihan</label>
                                        <input type="text" class="form-control <?= isset($error['tahun_tagihan']) ? 'is-invalid' : '' ?>" id="tahun_tagihan" name="tahun_tagihan"
                                               value="<?= $error ? $error['old']['tahun_tagihan'] : '' ?>" placeholder="Masukkan tahun tagihan">
                                        <?= isset($error['tahun_tagihan']) ? '<div class="invalid-feedback">' . $error['tahun_tagihan'] . '</div>' : '' ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="jumlah_tagihan">Jumlah Tagihan</label>
                                        <input type="text" class="form-control <?= isset($error['jumlah_tagihan']) ? 'is-invalid' : '' ?>" id="jumlah_tagihan" name="jumlah_tagihan"
                                               value="<?= $error ? $error['old']['jumlah_tagihan'] : '' ?>" placeholder="Masukkan jumlah tagihan">
                                        <?= isset($error['jumlah_tagihan']) ? '<div class="invalid-feedback">' . $error['jumlah_tagihan'] . '</div>' : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control <?= isset($error['status']) ? 'is-invalid' : '' ?>" id="status" name="status">
                                            <option value="ACTIVE">ACTIVE</option>
                                            <option value="INACTIVE">INACTIVE</option>
                                        </select>
                                        <?= isset($error['status']) ? '<div class="invalid-feedback">' . $error['status'] . '</div>' : '' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" value="create" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>