<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <?php if(isset($_POST["subit"]) ) : ?>
        <h1>Halo, Selamat Datang <?php echo $_POST["nama"]; ?>
        <?php endif; ?></h1>

    <form action="" method="post">
        Masukkan Nama : 
        <input type="text" name="nama" autofocus>
        <br>
        <button type="submit" name="subit">Kirim</button>
    </form>
</body>
</html>