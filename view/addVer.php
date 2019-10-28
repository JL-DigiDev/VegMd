<article class="col-md-6 float-left alert alert-secondary" id="ctrlMap">
</article>
<article class="col-md-6 float-right">
<?php
    $i = 1;
    foreach($waitMd as $el){
        ?><div class="alert alert-success col-md-12" id="<?php echo $i; ?>"><?php
        echo "<h2>[$i] ".$el["LastName"]." ".$el["FirstName"]."</h2>".$el["Street"]." ".$el["House"]." ".$el["Zip"]." ".$el["City"]." ".$el["Country"]."<br>";
        echo "Phone: ".$el["Phone"]." || Web: ".$el["Web"]."<br>";
        echo "<button type='button' class='btn btn-warning col-md-3' onclick=\"viewCoord(".$el["Long"].",".$el["Latt"].")\">View Map</button>";
        echo "<a href='index.php?p=admin&amp;c=addVer&amp;a=transfert&amp;i=".$el["ID"]."' class='btn btn-success offset-md-1 col-md-3'>Add Md</a>";
        ?><section class="alert alert-warning">Add by:<?php
            echo $el["uLastName"]." ".$el["uFirstname"]." [".$el["email"]."]"; ?>
        </section>
    </div><?php
        $i++;
    }
 ?>
</article>
