<?php
    include("../config.php");
    include("../lib.php");

    $db = cnxDb($dbHost,$dbName,$port,$user,$pwd);

    if(@$_SERVER["PATH_INFO"]!="/"){
        $exstr = explode("/",$_SERVER["PATH_INFO"]);
        for($i=0;$i<count($exstr);$i++){
            if($exstr[$i]=="tol"){
                $tol=$exstr[$i+1];
            }
            if($exstr[$i]=="spe"){
                $spe=$exstr[$i+1];
            }
        }
    }

    if(@$spe){
        $resp = $db->prepare("SELECT * FROM ddapp_vmd_md WHERE FK_tol <= :tol AND FK_spe = :spe");
        $resp->execute(array("tol"=>$tol,"spe"=>$spe));
    }else if(@$tol){
        $resp = $db->prepare("SELECT * FROM ddapp_vmd_md WHERE FK_tol <= :tol");
        $resp->execute(array("tol"=>$tol));
    }else{
        $resp = $db->query("SELECT * FROM ddapp_vmd_md");
    }
    $data = $resp->fetchall();
    $resp->closeCursor();

    $dataJson = array();

    for($i=0;$i<count($data);$i++){
        $dataJson[$i] = array("ID"=>$data[$i]["ID"],"FirstName"=>$data[$i]["FirstName"],"LastName"=>$data[$i]["LastName"],"Street"=>$data[$i]["Street"],"House"=>$data[$i]["House"],"City"=>$data[$i]["City"],"Zip"=>$data[$i]["Zip"],"Country"=>$data[$i]["Country"],"Phone"=>$data[$i]["Phone"],"Web"=>$data[$i]["Web"],"Long"=>$data[$i]["Long"],"Latt"=>$data[$i]["Latt"],"Spe"=>$data[$i]["FK_spe"], "Tol"=>$data[$i]["FK_tol"]);
    }
    $outJson = json_encode($dataJson);
    echo $outJson;
