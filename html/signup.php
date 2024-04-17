<?php
ob_start();
include_once ("connectie.php");
/**
 * @var PDO $pdo
 */
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeren</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <header>
        <nav class="nav-login">
            <div class="return">
                <a onclick="history.back()"><- Go back</a>
            </div>
        </nav>
    </header>
    <main>
        <div class="main-login">
            <h1>Registeren</h1>
            <div class="login-container">
                <form method="post" action="signup.php">
                    <input class="form-txt" type="text" name="username" placeholder="Voer je gebruikersnaam in">
                    <input class="form-txt" type="password" name="password" placeholder="Voer je wachtwoord in">
                    <input class="form-txt" type="number" name="isadmin" placeholder="0 = geen admin, 1 = admin">
                    <input class="submit" type="submit" name="signup" value="Registreren">
                </form>
            </div>
        </div>
    </main>
    <footer></footer>
</body>

</html>
<?php
if (isset($_POST['signup'])) {
    $sql = "INSERT INTO users(username, passwd, isAdmin) VALUES (:user, :passwd, :isadmin)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":user", $_POST['username']);
    $stmt->bindParam(":passwd", $_POST['password']);
    $stmt->bindParam(":isadmin", $_POST['isadmin']);
    $stmt->execute();
    header('Location: index.php');
    exit;
}
?>