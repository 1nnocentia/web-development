<?php
class Mahasiswa {

    protected $id,
              $nama,
              $nim,
              $jurusan,
              $email,
              $foto;
        
    public function __construct($id, $nama, $nim, $jurusan, $email, $foto) {
        $this->id = $id;
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
        $this->email = $email;
        $this->foto = $foto;
    }

    public function tampilkanData() {
        echo "ID: " . $this->id . "<br>";
        echo "Nama: " . $this->nama . "<br>";
        echo "NIM: " . $this->nim . "<br>";
        echo "Jurusan: " . $this->jurusan . "<br>";
        echo "Email: " . $this->email . "<br>";
        echo "Foto: <img src='img/" . $this->foto . "' width='100'><br>";
    }

    public function setID($id) {
        $this ->id = $id;
    }

    public function getId(){
        return $this -> id;
    }

    public function setNama($nama) {
        if(!is_string($nama) || empty($nama)) {
            throw new Exception("Nama harus berupa string dan tidak boleh kosong.");
        }
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setNim($nim) {
        $this->nim = $nim;
    }

    public function getNim() {
        return $this->nim;
    }

    public function setJurusan($jurusan) {
        $this->jurusan = $jurusan;
    }

    public function getJurusan() {
        return $this->jurusan;
    }

    public function setEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Format email tidak valid.");
        }
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getFoto() {
        return $this->foto;
    }
}


?>