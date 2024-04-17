<?php
ob_start();

include_once ("../connectie.php");
/** 
 * @var PDO $pdo 
 */
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == "true") {

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
    <title>Product aanpassen</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
    <div class="edit-main">
        <div class="edit-con">
            <form class="edit-form" method="post">
                <?php
                echo "Je gaat product " . $_GET['id'] . ", " . $result['naam'] . " bijwerken";
                ?>
                <input class="form-txt" type="text" name="naam" value="<?php echo $result['naam'] ?>" placeholder="Naam">
                <input class="form-txt" type="text" name="desc" value="<?php echo $result['beschrijving'] ?>" placeholder="Beschrijving">
                <input class="form-txt" type="text" name="prijs" value="<?php echo $result['prijs'] ?>" placeholder="Prijs">
                <input class="submit" type="submit" name="submit" value="Aanpassen">
                <?php
                if (isset($_POST['submit'])) {
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