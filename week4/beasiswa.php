<?php

require_once "mhs.php";

class MhsBeasiswa extends Mahasiswa {
    private $ipk;
    private $jenisbeasiswa;

    public function __construct($id = null, $nama = null, $nim = null, $jurusan =null, $email=null,
    $foto = null, $ipk = null, $jenisBeasiswa = null) {
        parent::__construct($id, $nama, $nim, $jurusan, $email, $foto);
        $this->ipk = $ipk;
        $this->jenisbeasiswa = $jenisBeasiswa;
    }

    public function setIpk($ipk) {
        $this->ipk = $ipk;
    }

    public function getIpk() {
        return $this->ipk;
    }

    public function setJenisBeasiswa($jenisbeasiswa) {
        $this->jenisbeasiswa = $jenisbeasiswa;
    }
    public function getJenisBeasiswa() {
        return $this->jenisbeasiswa;
    }

    public function tampilkanData() {
        parent::tampilkanData();
        echo "IPK: " . $this->ipk . "<br>";
        echo "Jenis Beasiswa: " . $this->jenisbeasiswa . "<br>";
    }

}

?>