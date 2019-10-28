<?php
    function cnxDb($dbHost,$dbName,$port,$user,$pwd){
        try{
            $cnxDb = new PDO("mysql:host=".$dbHost.";port=".$port.";dbname=".$dbName,$user,$pwd);
            $cnxDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $cnxDb;
        }catch(Exception $e){
            die("Error :".$e->getMessage());
        }
    }

    function changeLang(){
        $lang = $_SESSION["lang"];
        switch($lang){
            case "fr":
                $lang="en";
                break;
            case "en":
                $lang="fr";
                break;
            default:
                $lang="fr";
                break;
        }
        $_SESSION["lang"]=$lang;
        if(isset($_GET["p"])){
            $url="index.php?p=".$_GET["p"];
        }else{
            $url="index.php";
        }
        header("Refresh:0,".$url);
    }
 ?>
