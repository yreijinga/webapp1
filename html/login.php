<?php 
    ob_start();
    include_once("connectie.php");
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
    <title>Login</title>
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
            <h1>Inloggen</h1>
            <div class="login-container">
                <form method="post" action="login.php">
                    <input class="form-txt" type="text" name="username" placeholder="Gebruikersnaam">
                    <input class="form-txt" type="password" name="password" placeholder="Wachtwoord">
                    <input class="submit" type="submit" name="login" value="Login">
                    <input class="submit" type="submit" name="signup" value="Registreren">
                </form>
            </div>
        </div>
    </main>
    <footer></footer>
</body>
</html>
<?php
if(isset($_POST['login'])){
$sql = "SELECT * FROM users WHERE username = :user AND passwd = :passwd";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":user", $_POST['username']);
$stmt->bindParam(":passwd", $_POST['password']);
$stmt->execute();
$user = $stmt->fetch();

if($user && $user['isAdmin'] == true){
    $_SESSION['admin'] = true;
    $_SESSION['loggedin'] = true;
    header('Location: index.php');
} else {
    $_SESSION['admin'] = false;
    $_SESSION['loggedin'] = true;
    header('Location: index.php');
}
} else if(isset($_POST['signup'])){
    header('Location: signup.php');
}


//    if(isset($_POST['login'])){
//        if($_POST['username'] == $result['username'] and $_POST['password'] == $result['password'] and $result['isAdmin'] == true){
//            $_SESSION['username'] = "admin";
//            echo '<div class=login-message>'."Wel admin".'</div>';
//            
//            
//        } else if($_POST['username'] == $result['username'] and $_POST['password'] == $result['password'] and $result['isAdmin'] == false) {
//            
//            echo '<div class=login-message>'."Geen admin".'</div>';
//        } else {
//            echo '<div class=login-message>'."Gebruiker bestaat niet!".'</div>';
//        }
//    }
?>