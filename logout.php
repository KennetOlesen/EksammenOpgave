<?php 
    session_start(); 
    if(isset($_GET['logout'])){
    if($_GET['logout']==true){
        //logud
        session_destroy();
        header("location: index.php");
    } else {
        echo "fejl";
    }
}
?>
