<?php
include "connector.php";

if (isset($_GET['NIM'])) {
    $nim = $_GET['NIM'];
    $sql = "SELECT * FROM mhs WHERE NIM='$nim'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $nama = $_POST['Nama'];
    $nim = $_POST['NIM'];
    $jurusan = $_POST['Jurusan'];
    $email = $_POST['Email'];

    // Handle photo update if a new file is uploaded
    if ($_FILES['foto']['name']) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $folder = "img/";
        move_uploaded_file($tmp, $folder.$foto);
        $sql = "UPDATE mhs SET Nama='$nama', Jurusan='$jurusan', Email='$email', foto='$foto' WHERE NIM='$nim'";
    } else {
        $sql = "UPDATE mhs SET Nama='$nama', Jurusan='$jurusan', Email='$email' WHERE NIM='$nim'";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: display.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body { background-color: gray; }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Data</h2>
    <form method="POST" enctype="multipart/form-data">
        Nama: <input type="text" name="Nama" value="<?php echo $data['Nama']; ?>" required><br><br>
        NIM: <input type="text" name="NIM" value="<?php echo $data['NIM']; ?>" readonly><br><br>
        Jurusan: <input type="text" name="Jurusan" value="<?php echo $data['Jurusan']; ?>" required><br><br>
        Email: <input type="email" name="Email" value="<?php echo $data['Email']; ?>" required><br><br>
        Foto: <input type="file" name="foto"><br>
        <img src="img/<?php echo $data['foto']; ?>" width="100"><br><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>