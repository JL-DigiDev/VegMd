<article class="row">
    <script src="scripts/mapfind.js"></script>
    <h1 class="offset-md-1 col-md-10 text-success border-bottom border-success"><a href="index.php?p=admin" class="text-success">Administration</a></h1>

    <div class="offset-md-1 col-md-10"><?php
        if(@$_SESSION['cnx']==true){
            $way = array("addVer","modVer","addDir","addMod");
            $c = htmlspecialchars(@$_GET["c"]);

            if(in_array($c,$way)){
                if(file_exists("model/$c.php")){
                    require("model/".$c.".php");
                }
                require("view/".$c.".php");
            }else{
                require("view/admHome.php");
            }
        }else{ ?>
        <form class="offset-md-4 col-md-4 alert alert-success" action="index.php?p=admin&amp;cnx=try" method="post">
            <?php if(@$eCnx){ ?>
            <div class="col-md-12 alert alert-danger"><?php echo $eCnx; ?></div>
            <?php } ?>
            <label for="mail" class="col-md-12">Mail</label><input type="text" name="mail" class="col-md-12" required />
            <label for="pwd" class="col-md-12">Password</label><input type="password" name="pwd" class="col-md-12" required />
            <button type="submit" class="btn btn-success offset-md-4 col-md-4">Connexion</button>
        </form>
        <?php }
    ?></div>
</article>
