# Pengujian SIMRS - Soal 3 (Ujikom)

Repositori ini berisi implementasi **Unit Testing** dan **Integration Testing** untuk sistem informasi rumah sakit sederhana, sesuai dengan kriteria tugas Soal 3.

## Fitur Pengujian
1. **Unit Testing (`TarifCalculatorTest.php`)**:
   - Menguji logika perhitungan tarif layanan (UGD, Poli, Rawat Inap, Operasi, Lab).
   - Menggunakan `@dataProvider` untuk efisiensi test case.
   - Total 8 skenario pengujian (Status: **PASS**).

2. **Integration Testing (`PendaftaranPasienTest.php`)**:
   - Menguji interaksi langsung dengan database MySQL (Tabel `pasien`).
   - Skenario: Registrasi sukses, validasi data null, dan penghitungan jumlah row.
   - **Transaction Rollback**: Menggunakan `beginTransaction()` dan `rollBack()` agar database tetap bersih setelah pengujian selesai (Status: **PASS**).

## Teknologi yang Digunakan
- **PHP 7.4/8.x**
- **PHPUnit 9** (Unit Testing Framework)
- **Composer** (Dependency Manager)
- **MySQL** (Database)

## Struktur Folder
```text
.
├── TarifCalculator.php        # Logika bisnis perhitungan tarif
├── TarifCalculatorTest.php    # File Unit Test
├── PendaftaranPasienTest.php  # File Integration Test
├── composer.json              # Konfigurasi library PHPUnit
└── README.md                  # Dokumentasi ini
