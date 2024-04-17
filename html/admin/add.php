<?php 
ob_start();

include_once("../connectie.php"); 
/** 
 * @var PDO $pdo 
*/
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true"){
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == "true"){

    } else {
        header('Location: ../index.php');
    }
} else {
    header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product toevoegen</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <div class="edit-main">
        <div class="edit-con">
    <form class="edit-form" method="post">
        <?php
        echo "Je gaat een product toevoegen.";
        ?>
        <input class="form-txt" type="text" name="naam" value="" placeholder="Naam">
        <input class="form-txt" type="text" name="desc" value="" placeholder="Beschrijving">
        <input class="form-txt" type="text" name="prijs" value="" placeholder="Prijs">
        <input class="submit" type="submit" name="submit" value="Toevoegen">
        <?php
        if(isset($_POST['submit'])){
            $sql = "INSERT INTO menu(naam, beschrijving, prijs) VALUES (:naam, :beschrijving, :prijs)";
            $stmt = $pdo->prepare($sql);
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