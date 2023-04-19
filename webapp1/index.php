<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="css/main.css">
    <title>webapp 1 youri</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="nav-header">
            <h1>Restaurant met eten</h1>
        </div>
    </nav>
    <h1></h1>
    <div>
        <form method="post" action="index.php">
            <input type="text" name="zoekveld">
            <input type="submit" value="Zoeken" id="zoek-btn">
        </form>
        <?php
        
        /* Connect to a MySQL database using driver invocation */
        $dsn = 'mysql:dbname=webapplicatie;host=127.0.0.1';
        $user = 'root';
        $password = '';

        try {
            $connectie = new PDO($dsn, $user, $password);
            echo "Verbinding gelukt";
        } catch (PDOException $e) {
            echo "Verbinding niet gelukt: " . $e;
        }

        if(isset($_POST['zoekveld'])) {
            $resultSet = $connectie->prepare("SELECT * FROM `menu` WHERE Titel LIKE ?");
            $resultSet->execute(["%" . $_POST['zoekveld'] . "%"]);
        } else {
            $resultSet = $connectie->query("SELECT * FROM `menu`");
        }

        $resultSet = $connectie->query("SELECT * FROM `menu`");

        /* een voor een
        $menuItem = $resultSet->fetch();
        var_dump($menuItem);
        */

        while ($item = $resultSet->fetch()) {
            echo "<div>
            <h4>" . $item['titel'] . "</h2>
            <p>" . $item['omschrijving'] . "</p>
            <p>" . $item['prijs'] . "</p>
            </div>";
        }

        ?>
        <h1>strong army wow</h1>
        <a href="login.php">
            <button id="login-redir">Inloggen</button>
        </a>
    </div>
</body>
</html>