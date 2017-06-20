<?php
// Henter informationer fra varibles
$formUsername = $_POST['formUsername'];
$formPassword = $_POST['formPassword'];

// laver en forbindelse over til connect.php
require_once "connect.php";

// Hent de brugere ud som er blevet skrevet ind i databasen
$statement = $DBH->prepare("SELECT * FROM users WHERE dbUsername=?");
$statement->bindParam(1, $formUsername);
$statement->execute();

//hiver alle rækkerne ud af $statement som lagers i rows
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

//hvis brugeren ikke findes siger den echo, og går tilbage til index.php
if(empty($rows)){
    echo "<h1>Kan ikke finde bruger!<br>
    Prøv igen.</h1>";
    header("Refresh:3; url=Login.php");

// Vi kommer ind i else hvis brugernavn passer
}else{
    //Der findes brugere med det brugernavn, nu skal PW testes...
    //Kør et loop der tester hver række om dbPassword matcher formPassword
    foreach($rows as $row){
        if($row['dbPassword'] == $formPassword){
        //Sørg for at brugeren er logget ind og har "tilladelser"
        //starten en session hvor man kan lagere forskellige værdier i
            session_start();
            // i denne session vil jeg lagere en user som skal være lig med det brugeren har skrevet
            $_SESSION['username'] = $formUsername;
            //Hvis password også passer kommer vi tilbage til index.php
            header("location: index.php");
        }
    }
    //Kommer her ned hvis password ikke passer
    echo "<h1>Ikke korrekt password!<br>
    Prøv igen.</h1>";
    header("Refresh:3; url=Login.php");
}

$DBH = null;
?>
