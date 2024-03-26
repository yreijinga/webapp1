<?php include_once("../connectie.php"); 
/** 
 * @var PDO $pdo 
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminpaneel</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <div class="adminpanel">
        <h1>Adminpaneel</h1>
        <div class="add-bttn">
            <a href="add.php">Product toevoegen</a>
        </div>
        <div class="menu-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Beschrijving</th>
                    <th>Prijs</th>
                    <th>Aanpassen</th>
                    <th>Verwijderen</th>
                </tr>
            </thead>
            <tbody>
    <?php 
    $sql = "SELECT * FROM menu";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    while($result = $stmt->fetch()){
    echo "<tr>";
    echo "<td>" . '<div class=product-id>' .$result['id']. '</div>' . "</td>";
    echo "<td>" . '<div class=product-name>' .$result['naam']. '</div>' . "</td>";
    echo "<td>" . '<div class=product-desc>' .$result['beschrijving']. '</div>' . "</td>";
    echo "<td>" . '<div class=product-price>' ."€ ".$result['prijs']. '</div>' . "</td>";
    echo "<td>" . "<a href='edit.php?id=".$result['id']."'>Aanpassen</a>" . "</td>";
    echo "<td>" . "<a href='delete.php?id=".$result['id']."'>Verwijderen</a>" . "</td>";
    echo "</tr>";
    }
    ?>
    </table>
        </div>
    </div>
</body>
</html>