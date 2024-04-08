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
                </form>
            </div>
        </div>
    </main>
    <footer></footer>
</body>
</html>
<?php
    if(isset($_POST['login'])){
        if($_POST['username'] == "admin" and $_POST['password'] == "passwd"){
            $_SESSION['username'] = "admin";
            Header('Location: admin/index.php');
            exit();
        }
        else {
            echo '<div class=login-message>'."Gebruikersnaam en wachtwoord zijn fout!".'</div>';
        }
    }
?>