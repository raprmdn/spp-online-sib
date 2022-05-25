<?php
require_once './app/models/Classroom.php';

if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: ./403.php');
    exit;
}

$id = $_REQUEST['id'] ?? null;

$classroom = new Classroom();
$classroom = $classroom->getClassroomById($id);

if (!$classroom){
    header('Location: ./404.php');
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
                <h1 class="m-0">Update Kelas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="./dashboard.php?page=classroom-lists">List Kelas</a></li>
                    <li class="breadcrumb-item active">Update Kelas</li>
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
                        <h3 class="card-title">Update Kelas: <?= $classroom['classroom_name'] ?></h3>
                    </div>
                    <form action="./app/controllers/ClassroomController.php" method="POST" autocomplete="off">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" name="id" id="id" value="<?= $id ?>">
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <input type="text" class="form-control <?= isset($error['kelas']) ? 'is-invalid' : '' ?>" id="kelas" name="kelas"
                                               value="<?= $classroom['classroom'] ?>" placeholder="Masukkan Kelas. ex: 10">
                                        <?= isset($error['kelas']) ? '<div class="invalid-feedback">' . $error['kelas'] . '</div>' : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kelas">Nama Kelas</label>
                                        <input type="text" class="form-control <?= isset($error['nama_kelas']) ? 'is-invalid' : '' ?>" id="nama_kelas" name="nama_kelas"
                                               value="<?= $classroom['classroom_name'] ?>" placeholder="Masukkan Nama Kelas. ex: 10 A">
                                        <?= isset($error['nama_kelas']) ? '<div class="invalid-feedback">' . $error['nama_kelas'] . '</div>' : '' ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tahun">Tahun Ajaran</label>
                                        <input type="text" class="form-control <?= isset($error['tahun']) ? 'is-invalid' : '' ?>" id="tahun" name="tahun"
                                               value="<?= $classroom['tahun_ajaran'] ?>" placeholder="Masukkan Tahun Ajaran">
                                        <?= isset($error['tahun']) ? '<div class="invalid-feedback">' . $error['tahun'] . '</div>' : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control <?= isset($error['status']) ? 'is-invalid' : '' ?>" id="status" name="status">
                                            <option value="ACTIVE" <?= $classroom['status'] === 'ACTIVE' ? 'selected' : ''?>>ACTIVE</option>
                                            <option value="INACTIVE" <?= $classroom['status'] === 'INACTIVE' ? 'selected' : ''?>>INACTIVE</option>
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
