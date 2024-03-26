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
    <title>Product verwijderen</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <div class="edit-main">
        <div class="edit-con">
    <form class="edit-form" method="post">
        <?php
        echo "Je gaat product ".$_GET['id']." verwijderen.";
        ?>
        
        <input class="submit" type="submit" name="submit" value="Verwijderen">
        <?php
        if(isset($_POST['submit'])){
            $sql = "DELETE FROM menu WHERE :id";
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