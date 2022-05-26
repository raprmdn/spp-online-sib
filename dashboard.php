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

    <?php include_once 'views/layouts/backend/navbar.php'; ?>

    <?php include_once 'views/layouts/backend/sidebar.php'; ?>

    <div class="content-wrapper">
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

    <?php include_once 'views/layouts/backend/footer.php'; ?>
</div>

<script src="assets/backend/plugins/jquery/jquery.min.js"></script>
<script src="assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/backend/dist/js/adminlte.min.js"></script>
<script src="assets/backend/plugins/inputmask/jquery.inputmask.min.js"></script>
<script>
    $(function () {
        $('[data-mask]').inputmask()
    })
</script>
</body>
</html>
