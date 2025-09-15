<?php
include "config.php";

$sql = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $sql);

$mahasiswa = [];
if ($result) {
    $mahasiswa = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>daftar</title>
</head>
<body>
    <h1>Dorm List</h1>
    <?php if (count($mahasiswa) > 0):  ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Student IDs</th>
            <th>Major</th>
            <th>email</th>
            <th>photo</th>
            <th>Dorm</th>
        </tr>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row): ?>
        <tr>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['no_mhs'] ?></td>
            <td><?php echo $row['jurusan'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><img src ="..\database-front\uploads\<?php echo $row['foto']; ?>" alt="<?php echo $row['nama']; ?>" width="100"></td>
            <td><?php echo $row['asrama'] ?></td>
    
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Tidak ada data</p>
    <?php endif; ?>
</body>
</html>