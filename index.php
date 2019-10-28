<?php
    require("init.php");
    require("config.php");
    require("lib.php");

    require("head.php");
    require("menu.php");

    $db = cnxDb($dbHost,$dbName,$port,$user,$pwd);

    $way = array("add","mod","abo","contact","admin");
    $w = htmlspecialchars(@$_GET["p"]);

    if(in_array($w,$way)){
        if(file_exists("model/$w.php")){
            require("model/".$w.".php");
        }
        require("view/".$w.".php");
    }else{
        require("view/home.php");
    }

    require("foot.php");
 ?>
