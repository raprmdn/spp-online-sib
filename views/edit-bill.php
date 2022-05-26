<?php
require_once './app/models/Bill.php';

if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: ./403.php');
    exit;
}

$id = $_REQUEST['id'] ?? null;

$bill = new Bill();
$bill = $bill->getBillById($id);

if (!$bill){
    header('Location: ./404.php');
    exit;
}

$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Update Tagihan : <?= $bill['name'] ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="./dashboard.php?page=bill-lists">List Tagihan</a></li>
                    <li class="breadcrumb-item active">Update Tagihan</li>
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
                        <h3 class="card-title">Update Tagihan : <?= $bill['name'] ?></h3>
                    </div>
                    <form action="./app/controllers/BillController.php" method="POST" autocomplete="off">
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="id" value="<?= $bill['id'] ?>">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nama_tagihan">Nama Tagihan</label>
                                        <input type="text" class="form-control <?= isset($error['nama_tagihan']) ? 'is-invalid' : '' ?>" id="nama_tagihan" name="nama_tagihan"
                                               value="<?= $bill['name'] ?>" placeholder="Masukkan nama tagihan">
                                        <?= isset($error['nama_tagihan']) ? '<div class="invalid-feedback">' . $error['nama_tagihan'] . '</div>' : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun_tagihan">Tahun Tagihan</label>
                                        <input type="text" class="form-control <?= isset($error['tahun_tagihan']) ? 'is-invalid' : '' ?>" id="tahun_tagihan" name="tahun_tagihan"
                                               value="<?= $bill['year'] ?>" placeholder="Masukkan tahun tagihan">
                                        <?= isset($error['tahun_tagihan']) ? '<div class="invalid-feedback">' . $error['tahun_tagihan'] . '</div>' : '' ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="jumlah_tagihan">Jumlah Tagihan</label>
                                        <input type="text" class="form-control <?= isset($error['jumlah_tagihan']) ? 'is-invalid' : '' ?>" id="jumlah_tagihan" name="jumlah_tagihan"
                                               value="<?= $bill['amount'] ?>" placeholder="Masukkan jumlah tagihan">
                                        <?= isset($error['jumlah_tagihan']) ? '<div class="invalid-feedback">' . $error['jumlah_tagihan'] . '</div>' : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control <?= isset($error['status']) ? 'is-invalid' : '' ?>" id="status" name="status">
                                            <option value="ACTIVE" <?= $bill['status'] === 'ACTIVE' ? 'selected' : ''?>>ACTIVE</option>
                                            <option value="INACTIVE" <?= $bill['status'] === 'INACTIVE' ? 'selected' : ''?>>INACTIVE</option>
                                        </select>
                                        <?= isset($error['status']) ? '<div class="invalid-feedback">' . $error['status'] . '</div>' : '' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" value="update" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
