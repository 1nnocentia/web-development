<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Tambah Mahasiswa</h2>

    <form method = "POST" action = "post.php" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="no_mhs">Student IDs : </label>
                <input type="text" name="no_mhs" id="no_mhs" required>
            </li>
            <li>
                <label for="jurusan">Major : </label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" required>
            </li>
            <li>
                <label for="foto">Photo : </label>
                <input type="file" name="foto" id="foto" required>
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
</body>
</html>