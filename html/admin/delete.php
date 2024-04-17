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
$sql = "SELECT * FROM menu WHERE ID = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $_GET['id']);
$stmt->execute();
$result = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product verwijderen</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <div class="edit-main">
        <div class="edit-con">
    <form class="edit-form" method="post">
        <?php
        echo "Je gaat product ".$_GET['id'].", ".$result['naam']." verwijderen.";
        ?>
        
        <input class="submit" type="submit" name="submit" value="Verwijderen">
        <?php
        if(isset($_POST['submit'])){
            $sql = "DELETE FROM menu WHERE ID = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $_GET['id']);
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