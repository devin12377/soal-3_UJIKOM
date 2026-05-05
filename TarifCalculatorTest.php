<?php
// Load autoload dari vendor biar PHPUnit-nya kenal
require_once 'vendor/autoload.php';
// Load file yang mau di-test (pastikan file TarifCalculator.php ada di folder yang sama)
require_once 'TarifCalculator.php'; 

use PHPUnit\Framework\TestCase;

class TarifCalculatorTest extends TestCase {
    private $calculator;

    protected function setUp(): void {
        $this->calculator = new TarifCalculator();
    }

    /**
     * @dataProvider tarifData
     */
    public function testHitungTarif($layanan, $kelas, $expected) {
        $result = $this->calculator->hitung($layanan, $kelas);
        $this->assertEquals($expected, $result);
    }

    public function tarifData() {
        return [
            ['UGD', 'Kelas 1', 150000], 
            ['UGD', 'VIP', 300000],     
            ['Poli Umum', 'Kelas 1', 50000], 
            ['Poli Umum', 'VIP', 100000],   
            ['Rawat Inap', 'Kelas 3', 200000], 
            ['Rawat Inap', 'Kelas 2', 400000], 
            ['Operasi', 'VIP', 5000000],      
            ['Lab', 'Reguler', 75000],        
        ];
    }
}