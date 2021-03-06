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

    public static function billValidation($attributes)
    {
        $_SESSION['error'] = null;
        foreach ($attributes as $key => $value) {
            if ($key === 'tahun_tagihan' && !is_numeric($value)) {
                $_SESSION['error']['tahun_tagihan'] = 'The tahun must be a number.';
            }
            if ($key === 'tahun_tagihan' && strlen($value) !== 4) {
                $_SESSION['error']['tahun_tagihan'] = 'The tahun must be a 4 digit number.';
            }
            if ($key === 'tahun_tagihan' && $value <= 0) {
                $_SESSION['error']['tahun_tagihan'] = 'The tahun must be greater than 0.';
            }
            if ($key === 'jumlah_tagihan' && !is_numeric($value)) {
                $_SESSION['error']['jumlah_tagihan'] = 'The amount must be a number.';
            }
            if ($key === 'jumlah_tagihan' && $value <= 0) {
                $_SESSION['error']['jumlah_tagihan'] = 'The amount must be greater than 0.';
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

    public static function studentValidation($attributes)
    {
        $_SESSION['error'] = null;
        foreach ($attributes as $key => $value) {
            if ($key === 'nama_lengkap' && !is_string($value)) {
                $_SESSION['error']['nama_lengkap'] = 'The nama lengkap must be a string.';
            }
            if ($key === 'agama' && !is_string($value)) {
                $_SESSION['error']['agama'] = 'The agama must be a string.';
            }
            if ($key === 'jenis_kelamin' && !in_array($value, ['Laki-Laki', 'Perempuan'])) {
                $_SESSION['error']['jenis_kelamin'] = 'The jenis kelamin must be either Laki-Laki or Perempuan.';
            }
            if ($key === 'no_hp' && !preg_match('/^\+62/', $value)) {
                $_SESSION['error']['no_hp'] = 'The no hp must start with +62.';
            }
            if ($key === 'tanggal_lahir' && !preg_match('/^\d{4}\/\d{2}\/\d{2}$/', $value)) {
                $_SESSION['error']['tanggal_lahir'] = 'The tanggal lahir must be in the format yyyy/mm/dd.';
            }
            if (empty($value)) {
                $_SESSION['error'][$key] = 'The ' . str_replace('_', ' ', $key) . ' field is required.';
            }
        }

        return $_SESSION['error'];
    }

}