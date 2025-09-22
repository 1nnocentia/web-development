<?php
include "connection.php";
$sql = "SELECT * FROM MHS";
$result = mysqli_query($conn, $sql);

$mhs = [];
if ($result) {
    $mhs = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body { background-color: gray;}
        p {color:white}
        h1 {color:blue}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Student Data</h1>
    <h2><a href='form.php'>Add another Data?</a></h2>
    <?php if(count($mhs) > 0): ?>
        <table border="1" cellpadding="4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Name</th>
                    <th>Major</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($mhs as $row) : ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['NIM']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Major']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><img src="images/<?php echo $row['Photo']; ?>" width="100"></td>
                    <td>
                        <a href="edit.php?NIM=<?php echo $row['NIM']; ?>">Edit</a> |
                        <a href="delete.php?NIM=<?php echo $row['NIM']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No data found.</p>
    <?php endif; ?>
</body>
</html>