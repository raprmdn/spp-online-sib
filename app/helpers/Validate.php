<?php

class Validate
{
    public static function registerValidation($attributes, $user, $passwordConfirmation)
    {
        $_SESSION['error'] = null;
        foreach ($attributes as $key => $value) {
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
            if (empty($value)) {
                $_SESSION['error'][$key] = 'The ' . str_replace('_', ' ', $key) . ' field is required.';
            }
        }

        return $_SESSION['error'];
    }

    public static function classroomValidation($attributes) {
        $_SESSION['errors'] = null;
        foreach ($attributes as $key => $value) {
            if ($key === 'kelas' && !is_numeric($value)) {
                $_SESSION['error']['kelas'] = 'The tahun must be a number.';
            }
            if ($key === 'tahun' && !is_numeric($value)) {
                $_SESSION['error']['tahun'] = 'The tahun must be a number.';
            }
            if ($key === 'tahun' && strlen($value) !== 4) {
                $_SESSION['error']['tahun'] = 'The tahun must be a 4 digit number.';
            }
            if ($key === 'status' && !in_array($value, ['ACTIVE', 'INACTIVE'])) {
                $_SESSION['error']['status'] = 'The status must be either ACTIVE or INACTIVE.';
            }
            if (empty($value)) {
                $_SESSION['error'][$key] = 'The ' . str_replace('_', ' ', $key) . ' field is required.';
            }
        }

        return $_SESSION['error'];
    }
}