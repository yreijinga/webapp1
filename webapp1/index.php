<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="css/main.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="nav-header">
    </nav>
    <h1>PHP wow</h1>
    <div>
        <form>
            <input type="text" name="zoekveld"
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
    </div>
</body>
</html>