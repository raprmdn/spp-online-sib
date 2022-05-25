<?php
session_start();
require_once '../../config.php';
require_once '../models/User.php';
require_once '../helpers/Validate.php';

$user = new User();

$fullname = htmlspecialchars($_POST['fullname'] ?? null);
$username = htmlspecialchars($_POST['username'] ?? null);
$email = htmlspecialchars($_POST['email'] ?? null);
$password = htmlspecialchars($_POST['password'] ?? null);
$passwordConfirmation = htmlspecialchars($_POST['password_confirmation'] ?? null);

$attributes = [
    'fullname' => $fullname,
    'username' => $username,
    'email' => $email,
    'password' => $password,
    'password_confirmation' => $passwordConfirmation
];

$_SESSION['error'] = Validate::registerValidation($attributes, $user, $passwordConfirmation);

if (isset($_SESSION['error'])) {
    $_SESSION['error']['old'] = $attributes;
    header('Location: ../../register.php');
    exit;
}

$attributes['role'] = 'student';
$attributes['status'] = 'ACTIVE';

$user->register($attributes);
$_SESSION['user'] = $user->attempt($attributes['username'], $attributes['password']);

header('Location: ../../index.php');