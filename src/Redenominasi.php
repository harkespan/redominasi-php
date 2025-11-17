<?php

namespace Redenominasi;

/**
 * Class Redenominasi
 *
 * Library untuk mengkonversi nilai rupiah dengan menghilangkan 3 digit jutaan
 *
 * @package Redenominasi
 */
class Redenominasi
{
    /**
     * Konversi nilai rupiah dengan menghilangkan 3 digit terakhir
     *
     * @param int|float $amount Jumlah rupiah yang akan dikonversi
     * @param int $decimals Jumlah digit desimal (default: 2)
     * @param bool $roundUp Pembulatan ke atas (default: true)
     * @return float Hasil konversi
     */
    public static function convert($amount, int $decimals = 2, bool $roundUp = true): float
    {
        // Konversi ke float jika input adalah string
        $amount = (float) $amount;

        // Bagi dengan 1000 untuk menghilangkan 3 digit
        $result = $amount / 1000;

        // Lakukan pembulatan
        if ($roundUp) {
            // Pembulatan ke atas
            $multiplier = pow(10, $decimals);
            $result = ceil($result * $multiplier) / $multiplier;
        } else {
            // Pembulatan normal
            $result = round($result, $decimals);
        }

        return $result;
    }

    /**
     * Konversi dan format nilai rupiah dengan pemisah ribuan dan desimal
     *
     * @param int|float $amount Jumlah rupiah yang akan dikonversi
     * @param int $decimals Jumlah digit desimal (default: 2)
     * @param bool $roundUp Pembulatan ke atas (default: true)
     * @param string $decimalSeparator Pemisah desimal (default: ',')
     * @param string $thousandsSeparator Pemisah ribuan (default: '.')
     * @return string Hasil konversi yang sudah diformat
     */
    public static function format(
        $amount,
        int $decimals = 2,
        bool $roundUp = true,
        string $decimalSeparator = ',',
        string $thousandsSeparator = '.'
    ): string {
        $result = self::convert($amount, $decimals, $roundUp);

        return number_format($result, $decimals, $decimalSeparator, $thousandsSeparator);
    }
}
