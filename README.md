# Redenominasi Rupiah

Library PHP untuk redenominasi rupiah dengan menghilangkan 3 digit jutaan.

## Instalasi

Install melalui Composer:

```bash
composer require yourvendor/redenominasi
```

## Penggunaan

### Basic Usage

```php
<?php

require 'vendor/autoload.php';

use Redenominasi\Redenominasi;

// Contoh 1: 5039900 menjadi 5039.9
$result = Redenominasi::convert(5039900, 1, false);
echo $result; // Output: 5039.9

// Contoh 2: 7364857 menjadi 7364.86 (dibulatkan ke atas)
$result = Redenominasi::convert(7364857, 2, true);
echo $result; // Output: 7364.86
```

### Format dengan Pemisah

```php
<?php

use Redenominasi\Redenominasi;

// Format dengan pemisah Indonesia (koma untuk desimal, titik untuk ribuan)
$formatted = Redenominasi::format(7364857, 2, true);
echo $formatted; // Output: 7.364,86

// Format dengan pemisah US (titik untuk desimal, koma untuk ribuan)
$formatted = Redenominasi::format(5039900, 1, false, '.', ',');
echo $formatted; // Output: 5,039.9
```

## Method Documentation

### `convert($amount, $decimals = 2, $roundUp = true)`

Mengkonversi nilai rupiah dengan menghilangkan 3 digit terakhir.

**Parameters:**
- `$amount` (int|float) - Jumlah rupiah yang akan dikonversi
- `$decimals` (int) - Jumlah digit desimal (default: 2)
- `$roundUp` (bool) - Pembulatan ke atas (default: true)

**Return:** `float` - Hasil konversi

**Contoh:**
```php
Redenominasi::convert(5039900, 1, false); // 5039.9
Redenominasi::convert(7364857, 2, true);  // 7364.86
```

### `format($amount, $decimals = 2, $roundUp = true, $decimalSeparator = ',', $thousandsSeparator = '.')`

Mengkonversi dan memformat nilai rupiah dengan pemisah ribuan dan desimal.

**Parameters:**
- `$amount` (int|float) - Jumlah rupiah yang akan dikonversi
- `$decimals` (int) - Jumlah digit desimal (default: 2)
- `$roundUp` (bool) - Pembulatan ke atas (default: true)
- `$decimalSeparator` (string) - Pemisah desimal (default: ',')
- `$thousandsSeparator` (string) - Pemisah ribuan (default: '.')

**Return:** `string` - Hasil konversi yang sudah diformat

**Contoh:**
```php
Redenominasi::format(7364857, 2, true);              // 7.364,86
Redenominasi::format(5039900, 1, false, '.', ',');  // 5,039.9
```

## Testing

Jalankan test dengan PHPUnit:

```bash
composer install
vendor/bin/phpunit
```

## Requirements

- PHP >= 7.4

## License

MIT License

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
