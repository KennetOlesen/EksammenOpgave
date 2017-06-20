<?php 
/*Varibles with a method called GET*/
session_start();
$heading = $_GET['heading'];
$imgSrc = $_GET['imgSrc'];
$imgAlt = $_GET['imgAlt'];
$articleAuthor = $_SESSION['username'];
$articleText = $_GET['articleText'];

/*database connecting og INSERT INTO database tabel articles og den skal så fylde ud af de felter som er lavet i databasen */
require_once "connect.php";
/* Values " ? " er Placeholders for PDO prepare statment for at folk ikke kan lave en SQL Injertsion som - 1; DROP TABLE - Det gør at - Den vil sige 1; som siger 1 også lukker den og derefter drop table = smide hele table væk */
$statement = $DBH->prepare("INSERT INTO posts ( heading, imgSrc, imgAlt, articleAuthor, articleText) values(?, ?, ?, ?, ?)");
/*Disse statement fylder ud spørgmåltegn i values*/
$statement->bindParam(1, $heading);
$statement->bindParam(2, $imgSrc);
$statement->bindParam(3, $imgAlt);
$statement->bindParam(4, $articleAuthor);
$statement->bindParam(5, $articleText);
$statement->execute();

/*Ender på start siden igen*/

header("location: index.php");
?>