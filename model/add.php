<?php
    function sendMd($db,$pData,$pServ){
        $sKey="";
        $sResp=$pData["g-recaptcha-response"];
        $remIP=$pServ["REMOTE_ADDR"];

        $apiURL="https://www.google.com/recaptcha/api/siteverify?secret=$sKey&response=$sResp&remoteip=$remIP";
        $dResp=json_decode(file_get_contents($apiURL),true);

        if($dResp['success']==true){
            $mdLastName=htmlentities(strip_tags($pData["lastname"]));
            $mdFirstName=htmlentities(strip_tags($pData["firstname"]));
            $mdStreet=htmlentities(strip_tags($pData["street"]));
            $mdHouse=htmlentities(strip_tags($pData["house"]));
            $mdCity=htmlentities(strip_tags($pData["city"]));
            $mdZip=htmlentities(strip_tags($pData["zip"]));
            $mdPhone=htmlentities(strip_tags($pData["phone"]));
            $mdWeb=htmlentities(strip_tags($pData["web"]));
            $mdLong=htmlentities(strip_tags(@$pData["long"]));
            $mdLatt=htmlentities(strip_tags(@$pData["latt"]));
            $mdSpe=$pData["spe"];
            $mdTol=$pData["tol"];
            $usLastName=htmlentities(strip_tags($pData["lastnameSend"]));
            $usFirstName=htmlentities(strip_tags($pData["firstnameSend"]));
            $usMail=htmlentities(strip_tags($pData["email"]));

            $mdSend=$db->prepare("INSERT INTO ddapp_vmd_wait(FirstName,LastName,Street,House,City,Zip,Phone,Web,`Long`,Latt,FK_spe,FK_tol) VALUES(:FirstName,:LastName,:Street,:House,:City,:Zip,:Phone,:Web,:Long,:Latt,:FK_spe,:FK_tol)");
            $mdSend->execute(array("FirstName"=>$mdFirstName,"LastName"=>$mdLastName,"Street"=>$mdStreet,"House"=>$mdHouse,"City"=>$mdCity,"Zip"=>$mdZip,"Phone"=>$mdPhone,"Web"=>$mdWeb,"Long"=>$mdLong,"Latt"=>$mdLatt,"FK_spe"=>$mdSpe,"FK_tol"=>$mdTol));
            $mdSend->closeCursor();

            $wtSend=$db->prepare("SELECT ID FROM ddapp_vmd_wait WHERE FirstName=:FirstName AND LastName=:LastName AND Street=:Street AND House=:House AND City=:City AND Zip=:Zip");
            $wtSend->execute(array("FirstName"=>$mdFirstName,"LastName"=>$mdLastName,"Street"=>$mdStreet,"House"=>$mdHouse,"City"=>$mdCity,"Zip"=>$mdZip));
            $wtng=$wtSend->fetch();
            $waiting=$wtng["ID"];
            $wtSend->closeCursor();

            $usSend=$db->prepare("INSERT INTO ddapp_vmd_usemod(email,uFirstname,uLastName,IP,WtId) VALUES(:email,:FirstName,:LastName,:IP,:WtId)");
            $usSend->execute(array("email"=>$usMail,"FirstName"=>$usFirstName,"LastName"=>$usLastName,"IP"=>$remIP,"WtId"=>$waiting));
            $usSend->closeCursor();

            $stat = "true";
            return $stat;
        }else{
            $stat= "false";
            return $stat;
        }
    }

    function searchTol($db){
        $rTol=$db->query("SELECT * FROM ddapp_vmd_tol");
        $dTol=$rTol->fetchAll();
        $rTol->closeCursor();
        return $dTol;
    }

    function searchSpe($db){
        $rSpe=$db->query("SELECT * FROM ddapp_vmd_spe");
        $dSpe=$rSpe->fetchAll();
        $rSpe->closeCursor();
        return $dSpe;
    }

    $tol=searchTol($db);
    $spe=searchSpe($db);

    if(@$_GET["a"]=="send"){
        $stat=sendMd($db,$_POST,$_SERVER);
    }
 ?>
