<?php
require_once './app/models/Student.php';

if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: ./403.php');
    exit;
}

$student = new Student();
$students = $student->getAll();
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Siswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">List Siswa</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Siswa</h3>
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
                                    <th>FullName</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>NIS Siswa</th>
                                    <th>Gender</th>
                                    <th>Kelas</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($students as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['fullname'] ?></td>
                                    <td><?= $value['username'] ?></td>
                                    <td><?= $value['email'] ?></td>
                                    <td><?= $value['nis'] ?></td>
                                    <td><?= $value['gender'] ?></td>
                                    <td><?= $value['classroom'] ?: '-' ?></td>
                                    <td><?= $value['tahun_ajaran'] ?: '-' ?></td>
                                    <td>
                                        <a href="./dashboard.php?page=student-detail&id=<?= $value['id'] ?>" class="btn btn-xs btn-warning">
                                            <i class="fa fa-eye"></i>
                                        </a>
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