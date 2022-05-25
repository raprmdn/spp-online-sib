<?php
if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: ./403.php');
    exit;
}

$error = $_SESSION['error'] ?? null;
if ($error) {
    unset($_SESSION['error']);
}

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Kelas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="./dashboard.php?page=classroom-lists">List Kelas</a></li>
                    <li class="breadcrumb-item active">Tambah Kelas</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="./dashboard.php?page=classroom-lists" class="btn btn-primary mb-3">
                    <i class="fas fa-arrow-left mr-1"></i>
                    Kembali
                </a>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Kelas</h3>
                    </div>
                    <form action="./app/controllers/ClassroomController.php" method="POST" autocomplete="off">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <input type="text" class="form-control <?= isset($error['kelas']) ? 'is-invalid' : '' ?>" id="kelas" name="kelas"
                                               value="<?= $error ? $error['old']['kelas'] : '' ?>" placeholder="Masukkan Kelas. ex: 10">
                                        <?= isset($error['kelas']) ? '<div class="invalid-feedback">' . $error['kelas'] . '</div>' : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kelas">Nama Kelas</label>
                                        <input type="text" class="form-control <?= isset($error['nama_kelas']) ? 'is-invalid' : '' ?>" id="nama_kelas" name="nama_kelas"
                                               value="<?= $error ? $error['old']['nama_kelas'] : '' ?>" placeholder="Masukkan Nama Kelas. ex: 10 A">
                                        <?= isset($error['nama_kelas']) ? '<div class="invalid-feedback">' . $error['nama_kelas'] . '</div>' : '' ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tahun">Tahun Ajaran</label>
                                        <input type="text" class="form-control <?= isset($error['tahun']) ? 'is-invalid' : '' ?>" id="tahun" name="tahun"
                                               value="<?= $error ? $error['old']['tahun'] : '' ?>" placeholder="Masukkan Tahun Ajaran">
                                        <?= isset($error['tahun']) ? '<div class="invalid-feedback">' . $error['tahun'] . '</div>' : '' ?>
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