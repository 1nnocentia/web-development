<?php
$mahasiswa = [
    [
        "nama" => "Inno",
        "no_mhs" => "1234567890",
        "jurusan" => "IMT",
        "email" => "Inno@example.com",
        "foto" => "foto1.png"
    ],
    [
        "nama" => "Michele",
        "no_mhs" => "1234567890",
        "jurusan" => "IMT",
        "email" => "Michele@example.com",
        "foto" => "foto2.png"
    ],
    [
        "nama" => "Arsya",
        "no_mhs" => "134567890",
        "jurusan" => "IMT",
        "email" => "Arsya@example.com",
        "foto" => "foto3.png"
    ],
]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach($mahasiswa as $mhs) : ?>
            <li>
                <a href="detailmhs.php?nama=<?php echo $mhs["nama"]; ?>
                        &no_mhs=<?php echo $mhs["no_mhs"];?>
                        &jurusan=<?php echo $mhs["jurusan"];?>
                        &email=<?php echo $mhs["email"];?>
                        &foto=<?php echo $mhs["foto"];?>">
                    <?php echo $mhs["nama"]; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>