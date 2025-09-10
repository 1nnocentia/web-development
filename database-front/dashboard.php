<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Asrama Hogwarts</title>
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
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            border: 5px solid var(--gryffindor-gold);
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
            position: relative;
        }
        
        .header .add-student-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: var(--gryffindor-gold);
            color: var(--gryffindor-red);
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .header .add-student-btn:hover {
            background-color: white;
            transform: scale(1.05);
        }

        .header p {
            font-size: 1.2rem;
            opacity: 0.9;
            position: relative;
        }

        .navigation {
            display: flex;
            justify-content: center;
            margin: 30px 0;
            flex-wrap: wrap;
            gap: 15px;
            padding: 0 20px;
        }

        .nav-btn {
            padding: 12px 25px;
            border: none;
            border-radius: 30px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .nav-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }

        .nav-btn.gryffindor {
            background: linear-gradient(to right, var(--gryffindor-red), var(--gryffindor-gold));
            color: white;
        }

        .nav-btn.slytherin {
            background: linear-gradient(to right, var(--slytherin-green), var(--slytherin-silver));
            color: white;
        }

        .nav-btn.ravenclaw {
            background: linear-gradient(to right, var(--ravenclaw-blue), var(--ravenclaw-bronze));
            color: white;
        }

        .nav-btn.hufflepuff {
            background: linear-gradient(to right, var(--hufflepuff-yellow), var(--hufflepuff-black));
            color: var(--hufflepuff-black);
        }

        .nav-btn.all {
            background: linear-gradient(45deg, var(--gryffindor-red), var(--slytherin-green), var(--ravenclaw-blue), var(--hufflepuff-yellow));
            color: white;
        }

        .houses-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
            padding: 0 20px;
        }

        .house-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .house-card:hover {
            transform: translateY(-5px);
        }

        .house-header {
            padding: 20px;
            text-align: center;
            color: white;
            font-weight: bold;
            font-size: 1.4rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .member-count {
            background-color: rgba(0, 0, 0, 0.3);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .house-header.gryffindor {
            background-color: var(--gryffindor-red);
        }

        .house-header.slytherin {
            background-color: var(--slytherin-green);
        }

        .house-header.ravenclaw {
            background-color: var(--ravenclaw-blue);
        }

        .house-header.hufflepuff {
            background-color: var(--hufflepuff-yellow);
            color: var(--hufflepuff-black);
        }

        .members-list {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            min-height: 200px;
        }

        .member-item {
            display: flex;
            align-items: center;
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 8px;
            background: linear-gradient(to right, transparent, rgba(209, 166, 37, 0.1));
            transition: all 0.2s ease;
            cursor: pointer;
            border-left: 4px solid;
            text-decoration: none;
            color: inherit;
        }

        .member-item:hover {
            transform: translateX(5px);
            background: linear-gradient(to right, transparent, rgba(209, 166, 37, 0.2));
        }

        .member-item.gryffindor {
            border-left-color: var(--gryffindor-red);
        }

        .member-item.slytherin {
            border-left-color: var(--slytherin-green);
        }

        .member-item.ravenclaw {
            border-left-color: var(--ravenclaw-blue);
        }

        .member-item.hufflepuff {
            border-left-color: var(--hufflepuff-yellow);
        }

        .member-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            overflow: hidden;
        }

        .member-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .member-avatar.gryffindor {
            background: linear-gradient(45deg, var(--gryffindor-red), var(--gryffindor-gold));
        }

        .member-avatar.slytherin {
            background: linear-gradient(45deg, var(--slytherin-green), var(--slytherin-silver));
        }

        .member-avatar.ravenclaw {
            background: linear-gradient(45deg, var(--ravenclaw-blue), var(--ravenclaw-bronze));
        }

        .member-avatar.hufflepuff {
            background: linear-gradient(45deg, var(--hufflepuff-yellow), var(--hufflepuff-black));
        }

        .member-info {
            flex-grow: 1;
        }

        .member-name {
            font-weight: bold;
            margin-bottom: 4px;
        }

        .member-id {
            font-size: 0.85rem;
            opacity: 0.7;
        }

        .no-members {
            text-align: center;
            padding: 30px;
            color: #777;
            font-style: italic;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: var(--ravenclaw-blue);
            color: var(--gryffindor-gold);
            font-size: 0.9rem;
        }

        /* Responsivitas */
        @media (max-width: 768px) {
            .houses-container {
                grid-template-columns: 1fr;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .navigation {
                flex-direction: column;
                align-items: center;
            }
            
            .nav-btn {
                width: 80%;
                margin-bottom: 10px;
            }
        }

        /* Efek khusus */
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

        .loading {
            text-align: center;
            padding: 30px;
            color: #777;
        }
    </style>
</head>
<body>
    <?php
    // Include database configuration
    require_once 'connection.php';
    
    // Initialize variables
    $houses = [
        'Gryffindor' => ['color' => 'gryffindor', 'members' => []],
        'Slytherin' => ['color' => 'slytherin', 'members' => []],
        'Ravenclaw' => ['color' => 'ravenclaw', 'members' => []],
        'Hufflepuff' => ['color' => 'hufflepuff', 'members' => []]
    ];
    
    // Fetch student data from the database
    $sql = "SELECT id, nama, no_mhs, asrama, foto FROM mahasiswa ORDER BY asrama, nama";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $asrama = $row['asrama'];
            if (isset($houses[$asrama])) {
                $houses[$asrama]['members'][] = $row;
            }
        }
    }
    ?>
    
    <div class="container">
        <div class="header">
            <a href="profilepage.php?id=new" class="add-student-btn">Add New Student</a>
            <h1>DORM DASHBOARD</h1>
            <p>Explore our dormitories and their members</p>
        </div>
        
        <div class="navigation">
            <button class="nav-btn all" onclick="filterHouse('all')">All Houses</button>
            <button class="nav-btn gryffindor" onclick="filterHouse('gryffindor')">Gryffindor</button>
            <button class="nav-btn slytherin" onclick="filterHouse('slytherin')">Slytherin</button>
            <button class="nav-btn ravenclaw" onclick="filterHouse('ravenclaw')">Ravenclaw</button>
            <button class="nav-btn hufflepuff" onclick="filterHouse('hufflepuff')">Hufflepuff</button>
        </div>
        
        <div class="houses-container">
            <?php foreach ($houses as $houseName => $houseData): ?>
            <div class="house-card" data-house="<?php echo $houseData['color']; ?>">
                <div class="house-header <?php echo $houseData['color']; ?>">
                    <span><?php echo $houseName; ?></span>
                    <span class="member-count"><?php echo count($houseData['members']); ?> Members</span>
                </div>
                <div class="members-list">
                    <?php if (count($houseData['members']) > 0): ?>
                        <?php foreach ($houseData['members'] as $member): ?>
                        <a href="profilepage.php?id=<?php echo $member['id']; ?>" class="member-item <?php echo $houseData['color']; ?>">
                            <div class="member-avatar <?php echo $houseData['color']; ?>">
                                <?php if (!empty($member['foto'])): ?>
                                    <img src="<?php echo htmlspecialchars($member['foto']); ?>" alt="Foto Profil">
                                <?php else: ?>
                                    <?php echo strtoupper(substr($member['nama'], 0, 1)); ?>
                                <?php endif; ?>
                            </div>
                            <div class="member-info">
                                <div class="member-name"><?php echo htmlspecialchars($member['nama']); ?></div>
                                <div class="member-id">ID: <?php echo htmlspecialchars($member['no_mhs']); ?></div>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-members">There's no member in this house</div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="footer">
            &copy; 2025 Web Development Class
        </div>
    </div>

    <script>
        // Function to filter houses
        function filterHouse(house) {
            const houseCards = document.querySelectorAll('.house-card');
            
            houseCards.forEach(card => {
                if (house === 'all' || card.dataset.house === house) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
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