<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    if(isset($_POST['submit_button'])) {

        $dsn = 'mysql:dbname=webapplicatie;host=127.0.0.1';
        $user = 'root';
        $password = '';

        $dbh = new PDO($dsn, $user, $password);




        $titel = $_POST['titel'];
        $omschrijving = $_POST['omschrijving'];
        $prijs = $_POST['prijs'];


        $statement =  $dbh->prepare("INSERT INTO menu(titel, omschrijving, prijs) VALUES (?, ?, ?)");
        $statement->execute([$titel, $omschrijving, $prijs]);
    }   else {
            echo "Voer een nummer in";
    }

?>


    <form method="post" action="add.php">
        Titel: <input type="text" name="titel">
        Omschrijving: <input type="text" name="omschrijving">
        Prijs: <input type="text" name="prijs">
        <button type="submit" name="submit_button">Toevoegen</button>
</body>
</html>