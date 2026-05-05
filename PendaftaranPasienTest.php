<?php
require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class PendaftaranPasienTest extends TestCase {
    private $db;

    protected function setUp(): void {
        // Ganti sesuai DB lo: host, dbname, user, pass
        $this->db = new PDO("mysql:host=localhost;dbname=simrs_test", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Poin 4: Mulai transaksi (Rollback nanti di tearDown)
        $this->db->beginTransaction();
    }

    protected function tearDown(): void {
        // Poin 4: Rollback biar DB tetep bersih
        if ($this->db->inTransaction()) {
            $this->db->rollBack();
        }
    }

    public function testRegistrasiPasienBaru() {
        // Simulasi input data
        $nama = "Budi Santoso";
        $alamat = "Jakarta";

        // Query insert simulasi endpoint pendaftaran_pasien.php
        $stmt = $this->db->prepare("INSERT INTO pasien (nama, alamat) VALUES (?, ?)");
        $result = $stmt->execute([$nama, $alamat]);

        $this->assertTrue($result, "Gagal insert data pasien");

        // Cek apakah data beneran masuk ke database
        $check = $this->db->prepare("SELECT * FROM pasien WHERE nama = ?");
        $check->execute([$nama]);
        $pasien = $check->fetch();

        $this->assertEquals($nama, $pasien['nama']);
    }

    public function testRegistrasiNamaKosong() {
        // Test case minimal 3 sesuai soal (Case 2: Data kosong)
        $this->expectException(PDOException::class);
        $stmt = $this->db->prepare("INSERT INTO pasien (nama, alamat) VALUES (NULL, 'Jakarta')");
        $stmt->execute();
    }

    public function testCekJumlahPasien() {
        // Test case minimal 3 sesuai soal (Case 3: Cek Row)
        $this->db->exec("INSERT INTO pasien (nama, alamat) VALUES ('Pasien X', 'Bekasi')");
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM pasien");
        $total = $stmt->fetchColumn();
        
        $this->assertGreaterThan(0, $total);
    }
}