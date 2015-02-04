<div id="form" class="dynamic_content" style="display: none;">

    <!-- Formulaire d'ajout -->
    <div class="panel panel-primary">
        <div class="panel-heading">Ajout d'un équipement</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nom">Nom:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nom" placeholder="Entrez un nom">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="fabriquant">Fabriquant:</label>
                    <div class="col-sm-10"> 
                        <input type=text list=fabriquant >
                        <datalist id=fabriquant >
                            <option> DOGE CORP.
                            <option> AMAZING CORP.
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="ad-physique">Adresse Physique:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ad-physique" placeholder="Entrez une adresse">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="ad-ip">Adresse IP:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ad-ip" placeholder="Entrez une adresse IP">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="prop">Propriétaire:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prop" placeholder="Entrez une adresse">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="localisation">Localisation:</label>
                    <div class="col-sm-10"> 
                        <input type=text list=localisation >
                        <datalist id=localisation >
                            <option> DOGE LAND
                            <option> SUCH WOW COUNTRY
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="numero">Numéro :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="numero" placeholder="Entrez le numéro de téléphone">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="technique">Localisation:</label>
                    <div class="col-sm-10"> 
                        <input type=text list=technique >
                        <datalist id=technique >
                            <option> OK
                            <option> NON
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="fonctionnel">Localisation:</label>
                    <div class="col-sm-10"> 
                        <input type=text list=fonctionnel >
                        <datalist id=fonctionnel >
                            <option> ok
                            <option> non
                        </datalist>
                    </div>
                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-8">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Ajouter
                        </button>
                        <button id="backStuffButton" type="button" class="btn btn-primary" >
                            <i class="fa fa-reply"></i> Annuler
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>