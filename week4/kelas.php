<?php

require_once "mhs.php";

class Kelas {
    protected $ruangKelas;
    protected Mahasiswa $mahasiswa;

    public function __construct($ruangKelas = null, Mahasiswa $mahasiswa = null) {
        $this->ruangKelas = $ruangKelas;
        $this->mahasiswa = $mahasiswa;
    }

    public function setRuangKelas($ruangKelas) {
        $this->ruangKelas = $ruangKelas;
    }

    public function getRuangKelas() {
        return $this->ruangKelas;
    }

    public function setMahasiswa(Mahasiswa $mahasiswa) {
        $this->mahasiswa = $mahasiswa;
    }

    public function getMahasiswa() {
        return $this->mahasiswa;
    }

    public function tampilkanKelas(){
        return $this->mahasiswa;
    }
}

?>