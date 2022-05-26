<?php
session_start();
require_once '../../config.php';
require_once '../models/User.php';

$userObj = new User();
$authId = $_SESSION['user']['id'] ?? null;
$_SESSION['error'] = null;

$currentPassword = $_POST['current_password'] ?? null;
$password = $_POST['password'] ?? null;
$passwordConfirmation = $_POST['password_confirmation'] ?? null;

$attributes = [
    'current_password' => $currentPassword,
    'password' => $password,
    'password_confirmation' => $passwordConfirmation
];

$user = $userObj->find($authId);

foreach ($attributes as $key => $value) {
    if ($key === 'current_password' && !password_verify($value, $user['password'])) {
        $_SESSION['error']['current_password'] = 'The provided password does not match your current password.';
    }
    if ($key === 'password' && $value !== $passwordConfirmation) {
        $_SESSION['error']['password'] = 'The password and confirmation password do not match.';
    }
    if (empty($value)) {
        $_SESSION['error'][$key] = 'The ' . str_replace('_', ' ', $key) . ' field is required.';
    }
}

if (isset($_SESSION['error'])) {
    header('Location: ../../dashboard.php?page=change-password');
    exit;
}

$attributes['id'] = $authId;
$userObj->updatePassword($attributes);

$_SESSION['alert'] = [
    'type' => 'success',
    'icon' => 'fas fa-check-circle',
    'message' => 'Your password has been changed.'
];

header('Location: ../../dashboard.php?page=change-password');