<?php

class Helper
{
    static function rupiahFormat($value): string
    {
        return 'Rp. ' . number_format($value, 0, ',', '.') . ',-';
    }

    static function dateFormat($value): string
    {
        return date_format(date_create($value), 'd M Y, H:i A');
    }
}