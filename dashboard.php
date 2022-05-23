<?php
ob_start();
session_start();
require_once 'config.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPP Online - Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="assets/backend/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/backend/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="./" class="nav-link">Home</a>
            </li><li class="nav-item d-none d-sm-inline-block">
                <a href="./dashboard.php" class="nav-link">Dashboard</a>
            </li>
        </ul>
    </nav>

    <?php include_once 'views/layouts/backend/sidebar.php'; ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Starter Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <?php
                    if (isset($_GET['page'])) {
                        if (file_exists('views/' . $_GET['page'] . '.php')) {
                            include_once 'views/' . $_GET['page'] . '.php';
                        } else {
                            header('Location: 404.php');
                        }
                    } else {
                        include_once 'views/dashboard.php';
                    }
                ?>
            </div>
        </div>
    </div>

    <aside class="control-sidebar control-sidebar-dark">

        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>

<script src="assets/backend/plugins/jquery/jquery.min.js"></script>
<script src="assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/backend/dist/js/adminlte.min.js"></script>
</body>
</html>
