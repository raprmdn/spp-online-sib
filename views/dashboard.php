<?php
$user = $_SESSION['user'] ?? null;
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Notification:</h5>
                    Hi, <?= $user['fullname'] ?>! Selamat datang di halaman dashboard dari Aplikasi SPP Online.
                </div>
            </div>
        </div>
    </div>
</div>