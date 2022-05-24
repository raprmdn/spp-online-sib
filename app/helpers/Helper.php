<?php

class Helper
{
    static function rupiahFormat($value): string
    {
        return 'Rp. ' . number_format($value, 0, ',', '.') . ',-';
    }
}