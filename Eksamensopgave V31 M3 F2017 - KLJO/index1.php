<?php session_start(); ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<div class="wrapper">
    <header>
        <div class="logo"> <img class="img-responsive" src="img/header_img.jpg" alt=""> </div>
        <nav>
            <ul>

                <!--Tjek om bruger logget ind, hvis ja, så skriv "hej <bruger> samt log ud  knap  -->
                <?php
                /* isset checker om username er sat og !empty er ikke er tom */
                if(isset($_SESSION['username']) && !empty($_SESSION['username'])){ ?>
                    <li class="current"><a href="index.php">HOME</a></li>
                    <li><a href="#">PLANTER</a></li>
                    <li><a href="#">INDRETNING</a></li>
                    <div id="float-right">
                        <span>Hej</span>
                        <?php echo $_SESSION['username']; ?>
                        <li><a href="logout.php?logout=true">LOG UD</a></li>
                    </div>
                    <?php
                }else{
                ?>
                        <!--hvis brguer ikke logget ind vises nedenstående-->
                        <li class="current"><a href="index.php">HOME</a></li>
                        <li><a href="#">PLANTER</a></li>
                        <li><a href="#">INDRETNING</a></li>
                        <li><a href="Login.php">LOG IND</a></li>
            </ul>
            <?php
            }
            ?>
        </nav>
    </header>
    <main>
        <aside> <img class="img-responsive" src="img/frk_overspringshandling.jpg" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae quod, nemo ipsa molestias sint maiores vitae facilis illo delectus perferendis quaerat dolores neque veritatis? Officiis fuga ad molestiae voluptatibus dolore!</p>
            <hr>
            <div class="icons">
                <a href="#"> <i class="fa fa-instagram fa-2x" aria-hidden="true">
                    </i> </a>
                <a href="#"> <i class="fa fa-facebook-square fa-2x" aria-hidden="true">
                    </i> </a>
                <a href="#"> <i class="fa fa-flickr fa-2x" aria-hidden="true">
                    </i> </a>
                <a href="#"> <i class="fa fa-linkedin-square fa-2x" aria-hidden="true">
                    </i> </a>
            </div>
        </aside>

        <?php 
            if(isset($_SESSION['username']) && !empty($_SESSION['username']) ){ ?>
        <div>
            <h1>OPRET ET NYT INDLÆG</h1>
        </div>
        <div class="mainForm">
            <form action="insert.php" method="get" class="form-horizontal">
                <div class="form-group">
                    <label for="heading" class="control-label heading">Titel</label>
                    <div>
                        <input class="form-control" id="heading" type="text" name="heading" placeholder="Title på dit indlæg"> </div>
                </div>
                <div class="form-group">
                    <label for="imgSrc" class="control-label">Billednavn:</label>
                    <div>
                        <input class="form-control" id="imgSrc" type="text" name="imgSrc" placeholder="Navn på billede uden .jpg!">
                    </div>
                </div>
                <div class="form-group">
                    <label for="imgAlt" class="control-label">Alt tekst til billede</label>
                    <div>
                        <input class="form-control" id="imgAlt" type="text" name="imgAlt" placeholder="Billedets alt tekst">
                    </div>
                </div>
                <div class="form-group">
                    <label for="articleAuthor" class="control-label">Forfatterens Navn: </label>
                    <div>
                        <input class="form-control" id="AuthorName" type="text" name="articleAuthor" placeholder="Forfatterens Navn:"> </div>
                </div>
                <div class="form-group">
                    <label for="articleText" placeholder="Tekst" class="control-label">Artiklens tekst her:</label>
                    <div>
                        <input class="form-control" id="articleText" type="text" name="articleText" placeholder="Indlægets Tekst">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Udgiv indlæg" class="BTN">
                </div>
            </form>
        </div>

        <?php
        }
        ?>
            <!--Insert PHP function with 5 Forms and a BTN-->

            <section>
                <?php
                include "fetchdb.php";
            ?>
            </section>
    </main>
    <footer>
        <hr>
        <p>&copy; 2017 - WILDERNESS</p>
    </footer>
</div>
