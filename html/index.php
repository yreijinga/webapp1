<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooking Mama 2</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <div class="name">COOKING MAMA 2</div>
            <div class="nav-a">
                <a class="nav-link" href="index.php">Home</a>
                <a class="nav-link" href="menu.php">Menu</a>
                <?php
                if(isset($_SESSION['admin']) && $_SESSION['admin'] == "true") {
                    echo '<a class="nav-link admin-bttn" href="admin/index.php">Admin</a>';
                    echo '<style>.admin-bttn{color: black; text-decoration: none;}</style>';
                } else {
                    echo '<style>.admin-bttn{display: none;}</style>';
                }
                ?>
            </div>
            <?php 
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true"){
                echo '<div class="login-bttn">';
                echo '<a class="redir-login" href="admin/logout.php">Logout</a>';
                echo '</div>';
            } else {
                echo '<div class="login-bttn">';
                echo '<a class="redir-login" href="login.php">Login</a>';
                echo '</div>';
            }
            ?>
        </nav>
    </header>
    
</body>
</html>