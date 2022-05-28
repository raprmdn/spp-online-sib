<?php
require_once './app/models/Student.php';
require_once './app/helpers/Helper.php';

$studentObj = new Student();

$authId = $_SESSION['user']['id'] ?? null;
$authStudentId = $_SESSION['user']['students_id'] ?? null;

$student = $studentObj->getMyStudentProfileWithClassroom($authStudentId);
$studentBills = $studentObj->getStudentBills($authStudentId);

?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tagihan Siswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tagihan Siswa</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php if (!$authStudentId) : ?>
                <div class="col-md-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Notification:</h5>
                        Anda saat ini belum memiliki Akun Siswa. Silahkan buat Akun Siswa terlebih dahulu pada menu
                        <a href="./dashboard.php?page=create-student" class="text-primary">Buat Akun Siswa</a>
                    </div>
                </div>
            <?php else : ?>
                <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="/assets/backend/dist/img/user4-128x128.jpg" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?= $student['fullname'] ?></h3>
                        <p class="text-muted text-center"><?= $student['classroom'] ?> - <?= $student['classroom_name'] ?></p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>NIS</b> <a class="float-right"><?= $student['nis'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Jenis Kelamin</b> <a class="float-right"><?= $student['gender'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Agama</b> <a class="float-right"><?= $student['religion'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tempat Lahir</b> <a class="float-right"><?= $student['birthplace'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tanggal Lahir</b> <a class="float-right"><?= $student['birthdate'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Alamat</b> <a class="float-right"><?= $student['address'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>No HP</b> <a class="float-right"><?= $student['phone_number'] ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jenis Tagihan</th>
                                        <th>Nama Tagihan</th>
                                        <th>Jumlah</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>NIS</th>
                                        <th>Tahun</th>
                                        <th>Status</th>
                                        <th>Paid At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($studentBills as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value['bill_name'] ?></td>
                                        <td><?= $value['bill_detail'] ?></td>
                                        <td><?= Helper::rupiahFormat($value['amount']) ?></td>
                                        <td><?= $value['fullname'] ?></td>
                                        <td><?= $value['classroom'] ?></td>
                                        <td><?= $value['nis'] ?></td>
                                        <td><?= $value['year'] ?></td>
                                        <td>
                                            <?= $value['status'] === 'PAID'
                                                ? '<span class="badge badge-success">' . $value['status'] . '</span>'
                                                : '<span class="badge badge-danger">' . $value['status'] . '</span>'
                                            ?>
                                        </td>
                                        <td>
                                            <?= $value['paid_at'] ? Helper::dateFormat($value['paid_at']) : '-' ?>
                                        </td>
                                        <td>-</td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>