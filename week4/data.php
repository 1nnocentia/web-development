<?php

require_once "mhs.php";
require_once "beasiswa.php";
require_once "kelas.php";

// langsung menggunakan constructor
$mhs = new MhsBeasiswa(1, "Ananda", "72180220", "MAN", "ananda@ciputra.ac.id", "ananda.jpg", 3.5, "Gold");

// diisi lewat setter
$mhs2 = new MhsBeasiswa();
$mhs2 ->setID(2);
$mhs2 ->setNama("Tulus");
$mhs2 ->setNIM("72180221");
$mhs2 ->setJurusan("IMT");
$mhs2 ->setEmail("tulus@ciputra.ac.id");
$mhs2 ->setFoto("tulus.jpg");
$mhs2 ->setIPK(3.8);
$mhs2 ->setJenisBeasiswa("Silver");

// Masukkan ke kelas
$kelas1 = new Kelas("605", $mhs1);
$kelas2 = new Kelas("606", $mhs2);

// Tampilkan
$kelas1->tampilkanKelas();
$kelas2->tampilkanKelas();
?>