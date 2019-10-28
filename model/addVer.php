<?php
    function getWait($db){
        $rWait=$db->query("SELECT * FROM ddapp_vmd_wait W JOIN ddapp_vmd_usemod U ON W.ID = U.WtID WHERE U.WtID != 0");
        $dWait=$rWait->fetchAll();
        $rWait->closeCursor();
        return $dWait;
    }

    if(@$_GET['a']=="transfert"){
        $rTsft=$db->prepare("SELECT * FROM ddapp_vmd_wait W JOIN ddapp_vmd_usemod U ON W.ID = U.WtID WHERE W.ID=:ID");
        $rTsft->execute(array("ID"=>$_GET['i']));
        $dTsft=$rTsft->fetch();
        $rTsft->closeCursor();

        $wtToMd=$db->prepare("INSERT INTO ddapp_vmd_md(FirstName,LastName,Street,House,City,Zip,Country,Phone,Web,`Long`,Latt,FK_spe,FK_tol) VALUES(:FirstName,:LastName,:Street,:House,:City,:Zip,:Country,:Phone,:Web,:Long,:Latt,:FK_spe,:FK_tol)");
        $wtToMd->execute(array("FirstName"=>$dTsft["FirstName"],"LastName"=>$dTsft["LastName"],"Street"=>$dTsft["Street"],"House"=>$dTsft["House"],"City"=>$dTsft["City"],"Zip"=>$dTsft["Zip"],"Country"=>$dTsft["Country"],"Phone"=>$dTsft["Phone"],"Web"=>$dTsft["Web"],"Long"=>$dTsft["Long"],"Latt"=>$dTsft["Latt"],"FK_spe"=>$dTsft["FK_spe"],"FK_tol"=>$dTsft["FK_tol"]));
        $wtToMd->closeCursor();

        $rMd=$db->prepare("SELECT ID FROM ddapp_vmd_md WHERE FirstName=:FirstName AND LastName=:LastName AND Street=:Street AND House=:House AND City=:City AND Zip=:Zip AND Country=:Country AND Phone=:Phone AND Web=:Web AND `Long`=:Long AND Latt=:Latt");
        $rMd->execute(array("FirstName"=>$dTsft["FirstName"],"LastName"=>$dTsft["LastName"],"Street"=>$dTsft["Street"],"House"=>$dTsft["House"],"City"=>$dTsft["City"],"Zip"=>$dTsft["Zip"],"Country"=>$dTsft["Country"],"Phone"=>$dTsft["Phone"],"Web"=>$dTsft["Web"],"Long"=>$dTsft["Long"],"Latt"=>$dTsft["Latt"]));
        $dMd=$rMd->fetch();
        $rMd->closeCursor();

        $rUm=$db->prepare("UPDATE ddapp_vmd_usemod SET MdID=:MdID, WtID=:WtID WHERE uID=:uID");
        $rUm->execute(array("MdID"=>$dMd["ID"],"WtID"=>0,"uID"=>$_GET['i']));
        $rUm->closeCursor();
    }

    $waitMd=getWait($db);
?>
