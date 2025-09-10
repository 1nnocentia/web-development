<?php
// Start session to manage messages
session_start();

// Include database configuration
require_once 'connection.php';

// --- INITIALIZATION ---
// Get ID from URL. Determine if it's a new user or editing an existing one.
$id = isset($_GET['id']) ? $_GET['id'] : null;
$is_new_user = ($id === 'new');

// Initialize variables
$nama = $no_mhs = $jurusan = $email = $asrama = $foto = "";
$message = $_SESSION['message'] ?? "";
$message_type = $_SESSION['message_type'] ?? "";

// Clear session messages after displaying them
unset($_SESSION['message']);
unset($_SESSION['message_type']);

// --- FORM PROCESSING (CREATE/UPDATE) ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // --- 1. HANDLE PROFILE DATA SUBMISSION ---
    if (isset($_POST['save_profile'])) {
        $nama = $conn->real_escape_string($_POST['nama']);
        $no_mhs = $conn->real_escape_string($_POST['no_mhs']);
        $jurusan = $conn->real_escape_string($_POST['jurusan']);
        $email = $conn->real_escape_string($_POST['email']);
        $asrama = $conn->real_escape_string($_POST['asrama']);
        
        if ($is_new_user) {
            // --- CREATE NEW USER ---
            $sql = "INSERT INTO mahasiswa (nama, no_mhs, jurusan, email, asrama) VALUES ('$nama', '$no_mhs', '$jurusan', '$email', '$asrama')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['message'] = "New student created successfully!";
                $_SESSION['message_type'] = "success";
                header("Location: dashboard.php");
                exit();
            } else {
                $message = "Error creating record: " . $conn->error;
                $message_type = "error";
            }
        } else {
            // --- UPDATE EXISTING USER ---
            $sql = "UPDATE mahasiswa SET nama='$nama', no_mhs='$no_mhs', jurusan='$jurusan', email='$email', asrama='$asrama' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                $message = "Profile updated successfully!";
                $message_type = "success";
            } else {
                $message = "Error updating record: " . $conn->error;
                $message_type = "error";
            }
        }
    }
    
    // --- 2. HANDLE PHOTO UPLOAD ---
    elseif (isset($_FILES['foto']) && !$is_new_user) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $imageFileType = strtolower(pathinfo(basename($_FILES["foto"]["name"]), PATHINFO_EXTENSION));
        $new_filename = $target_dir . uniqid() . '.' . $imageFileType;
        $uploadOk = 1;

        // Validations
        if (getimagesize($_FILES["foto"]["tmp_name"]) === false) {
            $message = "File is not an image.";
            $message_type = "error";
            $uploadOk = 0;
        } elseif ($_FILES["foto"]["size"] > 500000) { // 500KB limit
            $message = "Sorry, your file is too large.";
            $message_type = "error";
            $uploadOk = 0;
        } elseif (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $message_type = "error";
            $uploadOk = 0;
        }
        
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $new_filename)) {
                $sql = "UPDATE mahasiswa SET foto='$new_filename' WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    $foto = $new_filename;
                    $message = "Photo uploaded successfully!";
                    $message_type = "success";
                } else {
                    $message = "Error updating database: " . $conn->error;
                    $message_type = "error";
                }
            } else {
                $message = "Sorry, there was an error uploading your file.";
                $message_type = "error";
            }
        }
    }
}

// --- DATA FETCHING (for existing users) ---
if (!$is_new_user && is_numeric($id)) {
    $sql = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $no_mhs = $row['no_mhs'];
        $jurusan = $row['jurusan'];
        $email = $row['email'];
        $foto = $row['foto'];
        $asrama = $row['asrama'];
    } else {
        // No user found, redirect to dashboard
        $_SESSION['message'] = "Student not found.";
        $_SESSION['message_type'] = "error";
        header("Location: dashboard.php");
        exit();
    }
} elseif (!$is_new_user) {
    // Invalid ID, redirect
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $is_new_user ? 'Add New Profile' : 'Edit Profile'; ?></title>
    <style>
        /* Color Var */
        :root {
            --gryffindor-red: #740001;
            --gryffindor-gold: #D3A625;
            --slytherin-green: #1A472A;
            --slytherin-silver: #5D5D5D;
            --ravenclaw-blue: #0E1A40;
            --ravenclaw-bronze: #946B2D;
            --hufflepuff-yellow: #ECB939;
            --hufflepuff-black: #372E29;
            --parchment: #F5F5DC;
            --ink: #2A2A2A;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--parchment);
            color: var(--ink);
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect fill-opacity="0.05" fill="%23000000" x="0" y="0" width="100" height="100"/><path fill="none" stroke="%23000000" stroke-opacity="0.1" d="M30,30 L70,70 M70,30 L30,70" stroke-width="2"/></svg>');
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 800px;
            overflow: hidden;
            border: 5px solid var(--gryffindor-gold);
            position: relative;
        }

        .header {
            background: linear-gradient(135deg, var(--gryffindor-red) 0%, var(--ravenclaw-blue) 100%);
            color: var(--gryffindor-gold);
            padding: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path fill="%23D3A625" fill-opacity="0.1" d="M45,5 L55,5 L55,45 L95,45 L95,55 L55,55 L55,95 L45,95 L45,55 L5,55 L5,45 L45,45 Z"/></svg>');
            background-size: 200px;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            font-family: 'Harry Potter', sans-serif;
            letter-spacing: 2px;
        }

        .header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .back-to-dashboard {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: var(--gryffindor-gold);
            color: var(--gryffindor-red);
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .back-to-dashboard:hover {
            background-color: white;
            transform: scale(1.05);
        }

        .profile-content {
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-image-container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 25px;
        }

        .profile-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 5px solid var(--gryffindor-gold);
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            background: linear-gradient(45deg, var(--ravenclaw-blue), var(--gryffindor-red));
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 5rem;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-details {
            width: 100%;
            max-width: 500px;
        }

        .detail-item {
            display: flex;
            margin-bottom: 20px;
            padding: 15px;
            background: linear-gradient(to right, transparent, rgba(209, 166, 37, 0.1), transparent);
            border-radius: 8px;
            border-left: 4px solid var(--gryffindor-red);
        }

        .detail-label {
            min-width: 120px;
            font-weight: bold;
            color: var(--gryffindor-red);
        }

        .detail-value {
            flex-grow: 1;
            color: var(--ink);
        }

        .house-badge {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: var(--gryffindor-red);
            color: var(--gryffindor-gold);
            border-radius: 20px;
            font-weight: bold;
            text-align: center;
            display: inline-block;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: var(--ravenclaw-blue);
            color: var(--gryffindor-gold);
            font-size: 0.9rem;
        }

        /* Form styles */
        .edit-form {
            width: 100%;
            max-width: 500px;
            margin-top: 20px;
            padding: 20px;
            background: linear-gradient(to right, transparent, rgba(209, 166, 37, 0.05), transparent);
            border-radius: 8px;
            border: 1px solid var(--gryffindor-gold);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: var(--gryffindor-red);
            font-weight: bold;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--gryffindor-gold);
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .btn {
            background-color: var(--gryffindor-red);
            color: var(--gryffindor-gold);
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: var(--ravenclaw-blue);
        }

        /* Upload form */
        .upload-form {
            margin-top: 15px;
            text-align: center;
        }

        .upload-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: var(--hufflepuff-yellow);
            color: var(--hufflepuff-black);
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .upload-btn:hover {
            background-color: var(--ravenclaw-bronze);
            color: white;
        }

        /* Message styles */
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Efek khusus Harry Potter */
        .magic-sparkle {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: var(--gryffindor-gold);
            border-radius: 50%;
            opacity: 0;
            animation: sparkle 2s infinite;
        }

        @keyframes sparkle {
            0% { opacity: 0; transform: translateY(0) rotate(0deg); }
            50% { opacity: 1; }
            100% { opacity: 0; transform: translateY(-50px) rotate(360deg); }
        }

        /* Responsivitas */
        @media (max-width: 600px) {
            .profile-content {
                padding: 20px;
            }
            
            .profile-image {
                width: 150px;
                height: 150px;
                font-size: 3rem;
            }
            
            .detail-item {
                flex-direction: column;
            }
            
            .detail-label {
                margin-bottom: 5px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
     <div class="container">
        <div class="header">
            <a href="dashboard.php" class="back-to-dashboard">&laquo; Back to Dashboard</a>
            <h1>CIPUTRA UNIVERSITY</h1>
            <p><i>The magical side of Ciputra University</i></p>
        </div>
        
        <div class="profile-content">
            <?php if ($message): ?>
                <div class="message <?php echo htmlspecialchars($message_type); ?>">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>
            
            <div class="profile-image-container">
                <div class="profile-image">
                    <?php if (empty($foto)): ?>
                        <span>⚡</span>
                    <?php else: ?>
                        <img src="<?php echo htmlspecialchars($foto); ?>" alt="Foto Profil">
                    <?php endif; ?>
                </div>
                
                <?php if (!$is_new_user): // Only show upload form for existing users ?>
                <form action="profilepage.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" class="upload-form">
                    <label for="foto" class="upload-btn">Change Photo</label>
                    <input type="file" name="foto" id="foto" style="display: none;" onchange="this.form.submit()">
                </form>
                <?php endif; ?>
            </div>
            
            <div class="profile-details">
                <div class="detail-item">
                    <div class="detail-label">Name:</div>
                    <div class="detail-value"><?php echo htmlspecialchars($nama ?: 'N/A'); ?></div>
                </div>
                
                <div class="detail-item">
                    <div class="detail-label">Student No:</div>
                    <div class="detail-value"><?php echo htmlspecialchars($no_mhs ?: 'N/A'); ?></div>
                </div>
                
                <div class="detail-item">
                    <div class="detail-label">Major:</div>
                    <div class="detail-value"><?php echo htmlspecialchars($jurusan ?: 'N/A'); ?></div>
                </div>
                
                <div class="detail-item">
                    <div class="detail-label">Email:</div>
                    <div class="detail-value"><?php echo htmlspecialchars($email ?: 'N/A'); ?></div>
                </div>
            </div>
            
            <div class="house-badge">
                Dorm: <?php echo htmlspecialchars($asrama ?: 'N/A'); ?>
            </div>
            
            <div class="edit-form">
                <h3><?php echo $is_new_user ? 'Create New Profile' : 'Edit Profile'; ?></h3>
                <form action="profilepage.php?id=<?php echo $id; ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Name:</label>
                        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="no_mhs">Student No:</label>
                        <input type="text" id="no_mhs" name="no_mhs" value="<?php echo htmlspecialchars($no_mhs); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="jurusan">Major:</label>
                        <input type="text" id="jurusan" name="jurusan" value="<?php echo htmlspecialchars($jurusan); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="asrama">Dorm:</label>
                        <select id="asrama" name="asrama">
                            <option value="Gryffindor" <?php if ($asrama == 'Gryffindor') echo 'selected'; ?>>Gryffindor</option>
                            <option value="Slytherin" <?php if ($asrama == 'Slytherin') echo 'selected'; ?>>Slytherin</option>
                            <option value="Ravenclaw" <?php if ($asrama == 'Ravenclaw') echo 'selected'; ?>>Ravenclaw</option>
                            <option value="Hufflepuff" <?php if ($asrama == 'Hufflepuff') echo 'selected'; ?>>Hufflepuff</option>
                        </select>
                    </div>
                    
                    <button type="submit" name="save_profile" class="btn"><?php echo $is_new_user ? 'Create Profile' : 'Update Profile'; ?></button>
                </form>
            </div>
        </div>
        
        <div class="footer">
            &copy; 2025 Web Development Class
        </div>
    </div>

    <script>
        // Add magical sparkle effect
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.container');
            const colors = ['#D3A625', '#740001', '#0E1A40', '#1A472A'];
            
            for (let i = 0; i < 20; i++) {
                const sparkle = document.createElement('div');
                sparkle.className = 'magic-sparkle';
                sparkle.style.left = Math.random() * 100 + '%';
                sparkle.style.top = Math.random() * 100 + '%';
                sparkle.style.background = colors[Math.floor(Math.random() * colors.length)];
                sparkle.style.animationDelay = Math.random() * 2 + 's';
                sparkle.style.width = Math.random() * 8 + 4 + 'px';
                sparkle.style.height = sparkle.style.width;
                container.appendChild(sparkle);
            }
        });
    </script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>