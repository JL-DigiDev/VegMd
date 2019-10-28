<?php
    function sendMsg($pData,$pServ){
        $sKey="";
        $sResp=$pData["g-recaptcha-response"];
        $remIP=$pServ["REMOTE_ADDR"];

        $apiURL="https://www.google.com/recaptcha/api/siteverify?secret=$sKey&response=$sResp&remoteip=$remIP";
        $dResp=json_decode(file_get_contents($apiURL),true);

        if($dResp['success']==true){
            $lastName=htmlentities(strip_tags($pData["lastname"]));
            $firstName=htmlentities(strip_tags($pData["firstname"]));
            $mail=htmlentities(strip_tags($pData["email"]));
            $obj=htmlentities(strip_tags($pData["obj"]));
            $msg=nl2br(htmlentities(strip_tags($pData["message"])));

            mail('yourmail@mail.com',"[VegMD] $obj (de: $firstName $lastName)",$msg,'From: '.$mail);

            $stat = "true";
            return $stat;
        }else{
            $stat= "false";
            return $stat;
        }
    }

    if(@$_GET["a"]=="send"){
        $stat=sendMsg($_POST,$_SERVER);
    }
 ?>
