<?php

namespace AppBundle\Util;

/*
 * Author: Muhammad Surya Ihsanuddin<surya.kejawen@gmail.com>
 * Url: https://github.com/ihsanudin
 */

use Symfony\Component\Validator\Exception\OutOfBoundsException;

class BulanIndonesia
{
    public static $BULAN = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    );

    public static function convertToText($bulanInteger)
    {
        $bulanInteger = (int) $bulanInteger;

        if ($bulanInteger > 0 && $bulanInteger <= 12) {
            return self::$BULAN[$bulanInteger];
        } else {
            throw new OutOfBoundsException('unaccepted bulan');
        }
    }

    public static function convertToNumber($bulanText)
    {
        return array_search($bulanText, self::$BULAN);
    }
}
