<?php
session_start();
require_once '../../config.php';
require_once '../models/User.php';

$user = new User();

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

$credentials = $user->attempt($username, $password);

if ($credentials) {
    $_SESSION['user'] = $credentials;
    header('Location: ../../index.php');
} else {
    $_SESSION['error'] = [
        'message' => 'These credentials do not match our records.',
        'old' => [
            'username' => $username,
        ]
    ];
    header('Location: ../../login.php');
}