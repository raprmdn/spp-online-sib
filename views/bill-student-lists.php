<?php
require_once './app/models/BillDetail.php';
require_once './app/helpers/Helper.php';

if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: ./403.php');
    exit;
}

$billDetail = new BillDetail();
$bills = $billDetail->getAll();
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Tagihan Siswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">List Tagihan Siswa</li>
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
                        <h3 class="card-title">List Tagihan Siswa</h3>
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
                            <?php foreach ($bills as $key => $value) : ?>
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
                                    <td>-</td>
                                    <td>-</td>
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