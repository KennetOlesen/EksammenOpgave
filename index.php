<?php session_start(); ?>
    <!doctype html>
    <html class="no-js" lang="">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Line Andersen - Wilderness</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="CSS/styles.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!--Front end FrameWork - Kan være Bootstrap der er et reponsive web design som er lavet til at vises på mobiler først også op -->
        <!-- Add your site or application content here -->
        <div class="wrapper">
            <header>
               <!--En class med Logo og et img som har et link til forsiden " index.php "-->
                <div class="logo">
                    <a href="index.php"> <img class="img-responsive" src="img/header_img.jpg" alt=""></a>
                </div>
                <nav>
                    <ul>
                        <!--Tjek om bruger logget ind, hvis ja, så skriv "hej <bruger> samt log ud  knap  -->
                        <?php
                /* isset checker om username er sat og !empty er ikke er tom */
                if(isset($_SESSION['username']) && !empty($_SESSION['username'])){ ?>
                            <li class="current"><a href="index.php">HOME</a></li>
                            <li><a href="#">PLANTER</a></li>
                            <li><a href="#">INDRETNING</a></li>
                            <div id="float-right"> <span>Hej</span> <span>  <?php echo $_SESSION['username']; ?>,</span>
                                <li><a href="logout.php?logout=true">LOG UD</a></li>
                            </div>
                            <?php
                            }else{
                            ?>
                                <!--hvis bruger ikke logget ind vises nedenstående-->
                                <li class="current"><a href="index.php">HOME</a></li>
                                <li><a href="#">PLANTER</a></li>
                                <li><a href="#">INDRETNING</a></li>
                                <li><a href="Login.php">LOGIN</a></li>
                                <li><a href="Register.php">REGISTER</a></li>
                    </ul>
                    <?php
                    }
                    ?>
                </nav>
            </header>
            <main>
                <!--Aside med en text og carosel -->
                <aside> <img class="img-responsive mySlides" src="img/frk%20overspringshandling.jpg" alt="Line Andersen"> <img class="img-responsive mySlides" src="img/slide1.png" alt="Slider"> <img class="img-responsive mySlides" src="img/slide2.png" alt="Slider"> <img class="img-responsive mySlides" src="img/slide3.png" alt="Slider">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae quod, nemo ipsa molestias sint maiores vitae facilis illo delectus perferendis quaerat dolores neque veritatis? Officiis fuga ad molestiae voluptatibus dolore!</p>
                    <hr>
                    <!-- Icons Classes med  -->
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
                 /* isset checker om username er sat og !empty er ikke er tom */
            if(isset($_SESSION['username']) && !empty($_SESSION['username']) ){ ?>
                    <div>
                        <h1>OPRET ET NYT INDLÆG</h1> </div>
                    <!--Insert PHP function with 4 Forms and a BTN-->
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
                                    <input class="form-control" id="imgSrc" type="text" name="imgSrc" placeholder="Navn på billede uden .jpg!"> </div>
                            </div>
                            <div class="form-group">
                                <label for="imgAlt" class="control-label">Alt tekst til billede</label>
                                <div>
                                    <input class="form-control" id="imgAlt" type="text" name="imgAlt" placeholder="Billedets alt tekst"> </div>
                            </div>
                            <!-- En extra form det kan indholde blogger navn men den er ikke sat til at virke lige nu   -->
                            <!-- -->
                            <!--                            <div class="form-group">
                                <label for="articleAuthor" class="control-label">blogger navns</label>
                                <div>
                                    <input class="form-control" class="author" type="text" name="articleAuthor" placeholder="Bloggers Navn"> </div>
                            </div>-->
                            <div class="form-group">
                                <label for="articleText" placeholder="Tekst" class="control-label">Artiklens tekst her:</label>
                                <div>
                                    <textarea class="form-control" id="articleText" type="text" name="articleText" placeholder="Indlægets Tekst"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Udgiv indlæg" class="BTN"> </div>
                            </div>
                        </form>
                    </div>
                    <?php
        }
        ?>
           <!--Section har include Fetchdb som henter min article   -->
            <section>
            <?php
                include "fetchdb.php";
            ?>
            </section>
            </main>
            <!--Footer -->
            <footer>
                <hr>
                <p>&copy; 2017 - WILDERNESS</p>
            </footer>
        </div>
        <!--Jquery biblotek -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!--Mit Javascript som inholder mit JS carosel-->
        <script src="JS/javascript.js"></script>
        <script>
            window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')
        </script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function (b, o, i, l, e, r) {
                b.GoogleAnalyticsObject = l;
                b[l] || (b[l] = function () {
                    (b[l].q = b[l].q || []).push(arguments)
                });
                b[l].l = +new Date;
                e = o.createElement(i);
                r = o.getElementsByTagName(i)[0];
                e.src = 'https://www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e, r)
            }(window, document, 'script', 'ga'));
            ga('create', 'UA-XXXXX-X', 'auto');
            ga('send', 'pageview');
        </script>
    </body>

    </html>