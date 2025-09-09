<?php
//  cek apakah ada data di $_GET
if( !isset($_GET["nama"]) || 
    !isset($_GET["no_mhs"]) || 
    !isset($_GET["jurusan"]) || 
    !isset($_GET["email"]) || 
    !isset($_GET["foto"]) ) {
        // redirect
        header("Location: daftarmahasiswa.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <ul>
        <li><img src= "img/<?php echo $_GET["foto"]; ?>"></li>
        <li><?php echo $_GET["nama"]; ?></li>
        <li><?php echo $_GET["no_mhs"]; ?></li>
        <li><?php echo $_GET["jurusan"]; ?></li>
        <li><?php echo $_GET["email"]; ?></li>
    </ul>

    <a href="daftarmahasiswa.php">Kembali ke Daftar Mahasiswa</a>
</body>
</html>