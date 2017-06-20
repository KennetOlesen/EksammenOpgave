<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Line Andersen - Wilderness</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="logo">
                <a href="index.php"> <img class="img-responsive" src="img/header_img.jpg" alt=""></a>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="#">PLANTER</a></li>
                    <li><a href="#">INDRETNING</a></li>
                    <li><a href="Login.php">LOG IND</a></li>
                    <li class="current"><a href="Register.php">REGISTER</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <!--Opret system! -->
            <div class="logIn">
                <!-- $_SERVER[PHP_SELF]  Tager alt den data du har skrevet og sender til den samme side som bruger med method post så du sender til datan til Register.php med det hele. -->
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="user" class="label">Fornavn</label>
                    <input type="text" id="uname" name="fornavn" placeholder="Indtast fornavn">
                    <label for="user" class="label">Efternavn</label>
                    <input type="text" id="uname" name="efternavn" placeholder="Indtast efternavn">
                    <label for="user" class="label">Indtast Ønskede Brugernavn:</label>
                    <input type="text" id="uname" name="username" placeholder="Indtast Dit Brugernavn">
                    <label for="password">Indtast Ønskede Password:</label>
                    <input type="text" id="pword" name="password" placeholder="Indtast Dit Password her">
                    <label for="password2">Indtast Dit Password Igen:</label>
                    <input type="text" id="pword" name="password2" placeholder="Indtast Dit Password igen">
                    <input type="submit" value="Opret" class="BTNlogIN"> </form>
            </div>
            <!-- Tjek om der er blevet indtastet nogetm hvis ikke, så gør intet - vis ingen php -->
            <?php 
                if(isset($_POST['username'])){
                /*Her laver vi nogen varibles som skal hente POST[username],POST[Password],POST[password2]*/
                    $formFornavn = $_POST['fornavn'];
                    $formEfternavn = $_POST['efternavn'];
                    $formUsername = $_POST['username'];
                    $formPassword = $_POST['password'];
                    $formPassword2 = $_POST['password2'];
                
                //hvis de to indtastninger af password ikke matcher
                //  !=  "! står for Not " og "= står for lige med "
                    if($formPassword != $formPassword2){
                        echo "Dine Passwords matchede ikke, PRØV IGEN!";
                    //hvis de matcher, fortsætter vi
                    } else {
                        require_once "connect.php";
                    
                    //vælg alt fra users tabellen hvor indtastet brugernavn matcher DB
                     $statement = $DBH->prepare("SELECT * FROM users WHERE dbUsername=?");
                     $statement->bindParam(1, $formUsername);
                     $statement->execute();
                    
                    // hvis der ikke allerede findes en bruger med det indtastede brugernavn, opret ny bruger
                     if(empty($row=$statement->fetch())){
                            $statement = $DBH->prepare("INSERT INTO users (dbFornavn, dbEfternavn, dbUsername, dbPassword) values(?, ?, ?, ?)");
                            $statement->bindParam(1, $formFornavn);
                            $statement->bindParam(2, $formEfternavn);
                            $statement->bindParam(3, $formUsername);
                            $statement->bindParam(4, $formPassword);
                            $statement->execute();
                            echo "SUCCES!!!";
                            header("location: login.php");
                        } else {
                         echo "Der findes allrede en bruger med dit brugernavn, PRØV IGEN!";
                        }
                 }
                }?>
        </main>
        <footer>
            <hr>
            <p>&copy; 2017 - WILDERNESS</p>
        </footer>
    </div>
</body>

</html>