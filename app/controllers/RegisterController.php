<?php
session_start();
require_once '../../config.php';
require_once '../models/User.php';

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

$_SESSION['error'] = null;
foreach ($attributes as $key => $value) {
    if (empty($value)) {
        $_SESSION['error'][$key] = 'The ' . $key . ' field is required.';
    }
    if ($key === 'password' && $value !== $passwordConfirmation) {
        $_SESSION['error']['password'] = 'The password and confirmation password do not match.';
    }
    if ($key === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error']['email'] = 'The email must be a valid email address.';
    }
    if ($key === 'username' && $user->existsUsername($value)) {
        $_SESSION['error']['username'] = 'The username is already been taken.';
    }
    if ($key === 'email' && $user->existsEmail($value)) {
        $_SESSION['error']['email'] = 'The email is already been taken.';
    }
}

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