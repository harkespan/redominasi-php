<?php

namespace Redenominasi\Tests;

use PHPUnit\Framework\TestCase;
use Redenominasi\Redenominasi;

class RedenominasiTest extends TestCase
{
    /**
     * Test konversi dengan contoh 5039900 menjadi 5039.9
     */
    public function testConvertExample1()
    {
        $result = Redenominasi::convert(5039900, 1, false);
        $this->assertEquals(5039.9, $result);
    }

    /**
     * Test konversi dengan contoh 7364857 menjadi 7364.86 (dibulatkan ke atas)
     */
    public function testConvertExample2()
    {
        $result = Redenominasi::convert(7364857, 2, true);
        $this->assertEquals(7364.86, $result);
    }

    /**
     * Test konversi nilai bulat
     */
    public function testConvertRoundNumber()
    {
        $result = Redenominasi::convert(1000000, 2, false);
        $this->assertEquals(1000.00, $result);
    }

    /**
     * Test konversi dengan pembulatan ke atas
     */
    public function testConvertWithRoundUp()
    {
        $result = Redenominasi::convert(1234567, 2, true);
        $this->assertEquals(1234.57, $result);
    }

    /**
     * Test konversi dengan pembulatan normal
     */
    public function testConvertWithNormalRound()
    {
        $result = Redenominasi::convert(1234564, 2, false);
        $this->assertEquals(1234.56, $result);
    }

    /**
     * Test format dengan pemisah koma
     */
    public function testFormatWithCommaDecimal()
    {
        $result = Redenominasi::format(7364857, 2, true);
        $this->assertEquals('7.364,86', $result);
    }

    /**
     * Test format dengan pemisah titik
     */
    public function testFormatWithDotDecimal()
    {
        $result = Redenominasi::format(5039900, 1, false, '.', ',');
        $this->assertEquals('5,039.9', $result);
    }

    /**
     * Test konversi nilai 0
     */
    public function testConvertZero()
    {
        $result = Redenominasi::convert(0, 2, false);
        $this->assertEquals(0.00, $result);
    }

    /**
     * Test konversi dengan desimal 0
     */
    public function testConvertWithZeroDecimals()
    {
        $result = Redenominasi::convert(5500000, 0, true);
        $this->assertEquals(5500.0, $result);
    }

    /**
     * Test konversi nilai kecil
     */
    public function testConvertSmallNumber()
    {
        $result = Redenominasi::convert(999, 2, true);
        $this->assertEquals(1.00, $result);
    }
}
