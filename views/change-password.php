<?php
require_once './app/helpers/Alert.php';

$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Change Password</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php Alert::notify(); ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                    </div>
                    <form action="./app/controllers/ChangePasswordController.php" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" class="form-control <?= isset($error['current_password']) ? 'is-invalid' : '' ?>"
                                               id="current_password" name="current_password" placeholder="Massukan password saat ini">
                                        <?= isset($error['current_password']) ? '<div class="invalid-feedback">' . $error['current_password'] . '</div>' : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control <?= isset($error['password']) ? 'is-invalid' : '' ?>"
                                               id="password" name="password" placeholder="Massukan password terbaru">
                                        <?= isset($error['password']) ? '<div class="invalid-feedback">' . $error['password'] . '</div>' : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input type="password" class="form-control <?= isset($error['password_confirmation']) ? 'is-invalid' : '' ?>"
                                               id="password_confirmation" name="password_confirmation" placeholder="Massukan ulang password terbaru">
                                        <?= isset($error['password_confirmation']) ? '<div class="invalid-feedback">' . $error['password_confirmation'] . '</div>' : '' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>