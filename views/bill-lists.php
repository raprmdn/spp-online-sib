<?php
require_once './app/models/Bill.php';
require_once './app/helpers/Helper.php';
require_once './app/helpers/Alert.php';

if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: ./403.php');
    exit;
}

$bill = new Bill();
$bills = $bill->getAll();
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Tagihan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">List Tagihan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="./dashboard.php?page=add-bill" class="btn btn-primary mb-3">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Tagihan
                </a>
                <?php Alert::notify(); ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Tagihan</h3>
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
                                <th>Nama Tagihan</th>
                                <th>Tahun Tagihan</th>
                                <th>Jumlah Tagihan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($bills as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['year'] ?></td>
                                    <td><?= Helper::rupiahFormat($value['amount']) ?></td>
                                    <td><?= $value['status'] ?></td>
                                    <td>
                                        <form action="./app/controllers/BillController.php" method="POST">
                                            <a href="./dashboard.php?page=bill-detail&id=<?= $value['id'] ?>" class="btn btn-xs btn-warning">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="./dashboard.php?page=edit-bill&id=<?= $value['id'] ?>" class="btn btn-xs btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                            <button type="submit" class="btn btn-xs btn-danger" name="submit" value="delete">
                                                <i class="fas fa-trash"></i>
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