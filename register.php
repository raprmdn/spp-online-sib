<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: index.php');
}

$error = $_SESSION['error'] ?? null;
if ($error) {
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPP Online - Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="assets/backend/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="assets/backend/dist/css/adminlte.min.css?v=3.2.0">
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="./" class="h1"><b>SPP</b> Online</a>
    </div>
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new account</p>
            <form action="app/controllers/RegisterController.php" method="post" autocomplete="off">
                <div class="input-group mb-3">
                    <input type="text" class="form-control <?= isset($error['fullname']) ? 'is-invalid' : '' ?>" id="fullname" name="fullname"
                           value="<?= $error ? $error['old']['fullname'] : '' ?>" placeholder="Full name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <?= isset($error['fullname']) ? '<div class="invalid-feedback">' . $error['fullname'] . '</div>' : '' ?>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control <?= isset($error['username']) ? 'is-invalid' : '' ?>" id="username" name="username"
                           value="<?= $error ? $error['old']['username'] : '' ?>" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <?= isset($error['username']) ? '<div class="invalid-feedback">' . $error['username'] . '</div>' : '' ?>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control <?= isset($error['email']) ? 'is-invalid' : '' ?>" id="email" name="email"
                           value="<?= $error ? $error['old']['email'] : '' ?>" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <?= isset($error['email']) ? '<div class="invalid-feedback">' . $error['email'] . '</div>' : '' ?>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control <?= isset($error['password']) ? 'is-invalid' : '' ?>" id="password" name="password"
                           placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <?= isset($error['password']) ? '<div class="invalid-feedback">' . $error['password'] . '</div>' : '' ?>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control <?= isset($error['confirmation_password']) ? 'is-invalid' : '' ?>" id="confirmation_password" name="confirmation_password"
                           placeholder="Confirmation Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <?= isset($error['confirmation_password']) ? '<div class="invalid-feedback">' . $error['password'] . '</div>' : '' ?>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary text-sm">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Register</button>
                    </div>
                </div>
            </form>
            <p class="mb-0 mt-3 d-flex justify-content-center">
                <a href="login.php" class="text-center text-sm">I already have an account</a>
            </p>
        </div>

    </div>
</div>

<script src="assets/backend/plugins/jquery/jquery.min.js"></script>
<script src="assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/backend/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
