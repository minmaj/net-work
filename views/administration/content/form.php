<div id="form" class="dynamic_content" style="display: none;">

    <!-- Formulaire d'ajout -->
    <div class="panel panel-primary">
        <div class="panel-heading"><span id="form_title"></span></div>
        <div class="panel-body">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="nom">Nom:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nom" value="" placeholder="Entrez un nom">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="fabriquant">Fabriquant:</label>
                    <div class="col-sm-7"> 
                        <input type=text name="fabriquant" value="" class="form-control" placeholder="Entrez le fabriquant">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="ad-physique">Adresse Physique:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="ad-physique" value="" placeholder="Entrez une adresse">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="ad-ip">Adresse IP:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="ad-ip" value="" placeholder="Entrez une adresse IP">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="prop">Propriétaire:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="prop" value="" placeholder="Entrez le propriétaire">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="localisation">Localisation:</label>
                    <div class="col-sm-7"> 
                        <input type="text" name="localisation" value="" class="form-control" placeholder="Entrez le lieu">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="numero">Numéro :</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="numero" value=""  placeholder="Entrez le numéro de téléphone">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="categorie_parent">Type de l'equipement parent :</label>
                    <div class="col-sm-7"> 
                        <select class="form-control" id="categorie_parent" name="categorie_parent" >
                            <option value="-1">Sélectionner le type d'équipement parent</option>
                            <?php foreach ($viewModel->get("typeEquipements") as $typeEquipement) { ?>
                                <option value='<?php echo $typeEquipement->getLibelle(); ?>'><?php echo $typeEquipement->getLibelle(); ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="parent">Equipement parent :</label>
                    <div class="col-sm-7"> 
                        <select class="form-control" id="parent" name="parent">
                            <option value="-1">Sélectionner d'abord le type d'équipement</option>
                            <script id="parent_stuff_form_tmpl" type="text/x-jquery-tmpl">
                                {{if stuffsByType.length!=0}}
                                    {{each(i,item) stuffsByType}}
                                        <option value="${item.id}">${item.nom}</option>
                                    {{/each}}
                                {{/if}}
                            </script>
                        </select>
                    </div>
                </div>
                <div style='margin-top: 20px;' class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-8">
                        <button id="formAddButtonStuff" type="submit" class="btn btn-default">
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