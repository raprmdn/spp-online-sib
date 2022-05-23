<?php
session_start();

 if (isset($_SESSION['user'])) {
     header('Location: index.php');
 }

$error = $_SESSION['error'] ?? null;
if ($error) {
    $message = $_SESSION['error']['message'] ?? null;
    $username = $_SESSION['error']['old']['username'] ?? null;
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPP Online - Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="assets/backend/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="assets/backend/dist/css/adminlte.min.css?v=3.2.0">
<body class="hold-transition login-page">
<div class="login-box">

    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="./" class="h1"><b>SPP</b> Online</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your experience</p>
            <form action="app/controllers/LoginController.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control <?= $error ? 'is-invalid' : '' ?>"
                           id="username" name="username" value="<?= $error ? $username : '' ?>" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <?= $error ? '<div class="invalid-feedback">' . $message . '</div>' : '' ?>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm btn-block">Sign In</button>
            </form>
            <p class="mb-0 mt-2 d-flex justify-content-center">
                <a href="register.php" class="text-center text-sm">Doesn't have an account?</a>
            </p>
        </div>

    </div>

</div>

<script src="assets/backend/plugins/jquery/jquery.min.js"></script>
<script src="assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/backend/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
