<?php
    // Starting $_SESSION Variables
    session_start();
    if(@$_SESSION["lang"]==""||@$_SESSION["lang"]==null){
        $_SESSION["lang"]="fr";
    }
    $lang=$_SESSION["lang"];
 ?>
