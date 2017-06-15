<?php 

$host = "localhost";
$dbName = "wilderness";
$User = "root";
$Pass = "";

/*PDO real name ( The PHP Data Objects ) */

/*try = It will try and do this code and if it fails it will go down to catch where it will come up with a error*/
try{
    /* new PDO - mysql driver*/
    $DBH = new PDO("mysql:dbname=$dbName;host=$host;charset=utf8", $User, $Pass);
    /*uses a method that shows and lets us handle the error message*/
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "SOMTHING WENT WRONG!! FIX ME!: <br>";
    echo $e->getMessage();
}
    

?>