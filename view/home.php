<article class="row">
    <h1 class="offset-md-1 col-md-10 text-success border-bottom border-success">Carte des médecins</h1>
    <div class="offset-sm-1 col-sm-10 offset-md-1 col-md-7" id="map">

    </div>

    <div class="col-md-3">
        <button class="btn btn-success dropdown-toggle col-md-12" type="button" id="selectSpe" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Spécialisation
        </button>
        <div class="dropdown-menu col-md-11" aria-labelledby="selectSpe">
            <a class="dropdown-item mdType" onclick="loadAjax('vgr')">Tout voir</a>
            <a class="dropdown-item mdType" onclick="loadAjax('vgr',1)">Généraliste</a>
            <a class="dropdown-item mdType" onclick="loadAjax('vgr',2)">Pédiatre</a>
            <a class="dropdown-item mdType" onclick="loadAjax('vgr',3)">Gynécologue</a>
            <a class="dropdown-item mdType" onclick="loadAjax('vgr',4)">Psychiatre</a>
            <a class="dropdown-item mdType" onclick="loadAjax('vgr',5)">Psychologue</a>
            <a class="dropdown-item mdType" onclick="loadAjax('vgr',6)">Diététicien</a>
        </div>

        <div class="col-md-12 text-success border border-success rounded mt-2 pt-1">
            <label for="veg" class=""><input type="checkbox" name="veg" id="selectTol" onclick="selectTol('vgl')" /> Uniquement Végétaliens</label>
        </div>

        <div id="mdLoad"></div>
    </div>
</article>
