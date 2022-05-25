<?php
require_once './app/models/Classroom.php';
require_once './app/helpers/Alert.php';

if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: ./403.php');
    exit;
}

$classroom = new Classroom();
$classrooms = $classroom->getAll();
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Kelas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">List Kelas</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="./dashboard.php?page=add-classroom" class="btn btn-primary mb-3">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Kelas
                </a>
                <?php Alert::notify(); ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Kelas</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Tahun Ajaran</th>
                                <th>Jumlah Siswa</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($classrooms as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['classroom'] ?></td>
                                    <td><?= $value['classroom_name'] ?></td>
                                    <td><?= $value['tahun_ajaran'] ?></td>
                                    <td><?= $value['students_count'] ?></td>
                                    <td><?= $value['status'] ?></td>
                                    <td>
                                        <form action="./app/controllers/ClassroomController.php" method="POST">
                                            <a href="./dashboard.php?page=classroom-student-lists&id=<?= $value['id'] ?>" class="btn btn-xs btn-warning">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="./dashboard.php?page=edit-classroom&id=<?= $value['id'] ?>" class="btn btn-xs btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                            <button type="submit" name="submit" value="delete" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>