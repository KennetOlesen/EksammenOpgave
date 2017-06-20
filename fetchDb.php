<?php

// Bro til Databasen - The require_once statement is identical to require except PHP will check if the file has already been included
require_once "connect.php";

    // vælger alt fra articles tabel!
    $statement = $DBH->prepare("SELECT * FROM posts");
    $statement->execute();

            /*The PHP Data Objects (PDO) 
              API, er en softwaregrænseflade, der tillader et stykke software at interagere med andet software.*/
while ($row = $statement->fetch(PDO::FETCH_ASSOC)){ ?>

        <!--  Key->[heading] => Vaule -> [text inside the header]  -->
        <article>
            <h2>
                <?php echo $row['heading'] ?>
            </h2>
            <img src="img/<?php echo $row['imgSrc'] ?>.jpg" alt="<?php echo $row['imgAlt'] ?>" class="img-responsive">
         <b>   <p class="author">SKREVET AF: <b><?php echo $row['articleAuthor']; ?></b> DEN: <?php echo date('D-d-F Y'); ?>
            </p> </b>
            <p id="BrodTekst">
                <?php echo $row['articleText'] ?>
            </p>
        </article>
        <?php
}/*END WHILE*/

?>
