<?php
    if(@$_GET["cnx"]=="try"){
        $mail=htmlentities(strip_tags($_POST['mail']));
        $pwd=htmlentities(strip_tags($_POST['pwd']));

        $rCnx=$db->prepare("SELECT * FROM ddapp_vmd_adm WHERE Mail = :Mail");
        $rCnx->execute(array('Mail'=>$mail));
        $dCnx=$rCnx->fetch();
        $rCnx->closeCursor();

        if(password_verify($pwd,$dCnx["Pwd"])){
            $_SESSION["ID"]=$dCnx["ID"];
            $_SESSION["mail"]=$dCnx["Mail"];
            $_SESSION["cnx"]=true;
            header("Location: index.php?p=admin&c=home");
        }else{
            $eCnx = "Connexion failed...";
        }
    }
 ?>
