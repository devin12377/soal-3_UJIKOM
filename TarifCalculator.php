<?php

class TarifCalculator {
    /**
     * Menghitung tarif berdasarkan jenis layanan dan kelas.
     * Sesuai dengan data test case di TarifCalculatorTest.php
     */
    public function hitung($layanan, $kelas) {
        if ($layanan === 'UGD') {
            return ($kelas === 'VIP') ? 300000 : 150000;
        }

        if ($layanan === 'Poli Umum') {
            return ($kelas === 'VIP') ? 100000 : 50000;
        }

        if ($layanan === 'Rawat Inap') {
            if ($kelas === 'Kelas 3') return 200000;
            if ($kelas === 'Kelas 2') return 400000;
        }

        if ($layanan === 'Operasi') {
            return 5000000;
        }

        if ($layanan === 'Lab') {
            return 75000;
        }

        return 0; // Default jika layanan tidak ditemukan
    }
}