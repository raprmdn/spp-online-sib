<?php
require_once './app/models/Bill.php';
require_once './app/models/Classroom.php';
require_once './app/helpers/Helper.php';
require_once './app/helpers/Alert.php';

if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: ./403.php');
    exit;
}

$id = $_REQUEST['id'] ?? null;

$bill = new Bill();
$classroom = new Classroom();

$classrooms = $bill->getClassroomByBill($id);
$bill = $bill->getBillById($id);
$availClassrooms = $classroom->getAvailableClassrooms($bill['id']);

if (!$bill) {
    header('Location: ./404.php');
    exit;
}
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Kelas dari Tagihan : <?= $bill['name'] ?> - <?= $bill['year'] ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="./dashboard.php?page=bill-lists">List Tagihan</a></li>
                    <li class="breadcrumb-item active">List Siswa Kelas <?= $bill['name'] ?> - <?= $bill['year'] ?> </li>
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
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
                <?php if ( $bill['status'] === 'ACTIVE' ) : ?>
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-lg">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Tagihan Kelas
                    </button>
                <?php endif; ?>
                <?php Alert::notify(); ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Kelas dari Tagihan: <?= $bill['name'] ?> Tahun Ajaran: <?= $bill['year'] ?></h3>
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
                                <th>Nama Kelas</th>
                                <th>Kelas</th>
                                <th>Nama Tagihan</th>
                                <th>Tahun Ajaran</th>
                                <th>Jumlah Tagihan</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($classrooms as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['classroom_name'] ?></td>
                                    <td><?= $value['classroom'] ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['tahun_ajaran'] ?></td>
                                    <td><?= Helper::rupiahFormat($value['amount']) ?></td>
                                    <td>
                                        <a href="./dashboard.php?page=classroom-student-lists&id=<?= $value['id'] ?>" class="btn btn-xs btn-warning">
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
<div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Tagihan Kelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="./app/controllers/BillClassroomController.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="bill_id" value="<?= $bill['id'] ?>">
                        <label>Select Classrooms</label>
                        <select class="select2" multiple="multiple" id="classrooms" name="classrooms[]" data-placeholder="Select a classrooms" style="width: 100%;">
                            <?php foreach ($availClassrooms as $key => $value) : ?>
                                <option value="<?= $value['id'] ?>"><?= $value['classroom'] ?> - <?= $value['classroom_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
