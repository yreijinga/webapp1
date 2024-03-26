<?php 
ob_start();

include_once("../connectie.php"); 
/** 
 * @var PDO $pdo 
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product aanpassen</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <div class="edit-main">
        <div class="edit-con">
    <form class="edit-form" method="post">
        <?php
        echo "Je gaat product ".$_GET['id'].", bijwerken";
        ?>
        <input class="form-txt" type="text" name="naam" value="" placeholder="Naam">
        <input class="form-txt" type="text" name="desc" value="" placeholder="Beschrijving">
        <input class="form-txt" type="text" name="prijs" value="" placeholder="*4.20*">
        <input class="submit" type="submit" name="submit" value="Aanpassen">
        <?php
        if(isset($_POST['submit'])){
            $sql = "UPDATE menu SET naam = :naam, beschrijving = :beschrijving, prijs = :prijs WHERE ID = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $_GET['id']);
            $stmt->bindParam(":naam", $_POST['naam']);
            $stmt->bindParam(":beschrijving", $_POST['desc']);
            $stmt->bindParam(":prijs", $_POST['prijs']);
            $stmt->execute();
            header('Location: index.php');
            exit;
        }
        ?>
    </form>
        </div>
    </div>
</body>
</html>