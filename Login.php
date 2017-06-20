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
                    <li class="current"><a href="Login.php">LOG IND</a></li>
                    <li><a href="Register.php">REGISTER</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <!--login system! -->
            <div class="logIn">
                <form action="checkUser.php" method="post">
                    <label for="user" class="label">BRUGERNAVN: </label>
                    <input type="text" id="uname" name="formUsername" placeholder="Indtast Dit Brugernavn">
                    <label for="">PASSWORD: </label>
                    <input type="password" id="pword" name="formPassword" placeholder="Indtast Dit Password..">
                    <input type="submit" value="Log in" class="BTNlogIN"> </form>
            </div>
        </main>
        <footer>
            <hr>
            <p>&copy; 2017 - WILDERNESS</p>
        </footer>
    </div>
</body>

</html>