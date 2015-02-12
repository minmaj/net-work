<div class="modal fade" id="viewEditModal" tabindex="-1" role="dialog" aria-labelledby="viewEditModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title" id="viewEditModalLabel">Modification d'un équipement</h4>
      </div>
      <div class="modal-body">
        <div class="panel panel-primary">
          <div id="headingEditModal" class="panel-heading">

          </div>
          <div id="bodyEditModal" class="panel-body">

          </div>
        </div>
      </div>
    </div>
  </div>

  <script id="row_edit_tmpl" type="text/x-jquery-tmpl">
    <div id="bodyEditModal" class="panel-body">
        <form id="edit-form" class="form-horizontal" role="form" action="administration/editStuff" method="post">
          <div class="form-group">
            <label class="control-label col-sm-4" for="nom">Nom : </label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nom" id="nom" value="${ stuffDetail.nom }">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="type">Type : </label>
            <div class="col-sm-7">
              <select class="form-control" name="type" id="type">
                <option value="Imprimante" {{if stuffDetail.type == "Imprimante"}}selected="selected"{{/if}}>Imprimante</option>
                <option value="Ordinateur fixe" {{if stuffDetail.type == "Ordinateur fixe"}}selected="selected"{{/if}}>Ordinateur fixe</option>
                <option value="Ordinateur portable" {{if stuffDetail.type == "Ordinateur portable"}}selected="selected"{{/if}}>Ordinateur portable</option>
                <option value="Routeur" {{if stuffDetail.type == "Routeur"}}selected="selected"{{/if}}>Routeur</option>
                <option value="Serveur" {{if stuffDetail.type == "Serveur"}}selected="selected"{{/if}}>Serveur</option>
                <option value="Telephone" {{if stuffDetail.type == "Telephone"}}selected="selected"{{/if}}>Telephone</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="fabriquant">Fabriquant : </label>
            <div class="col-sm-7"> 
              <input type=text class="form-control" name="fabriquant" id="fabriquant" value="${ stuffDetail.fabriquant }" >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="ad-physique">Adresse Physique : </label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="ad-physique" name="ad-physique" value="${ stuffDetail.adressePhysique }">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="ad-ip">Adresse IP : </label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="ad-ip" name="ad-ip" value="${ stuffDetail.adresseIp }">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="prop">Propriétaire : </label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="prop" name="prop" value="${ stuffDetail.proprietaire }">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="localisation">Localisation : </label>
            <div class="col-sm-7"> 
              <input type="text" class="form-control" id="localisation" name="localisation" value="${ stuffDetail.localisation }">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="numero">Numéro : </label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="numero" name="numero" value="${ stuffDetail.numeroSupport }">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4" for="technique">Etat technique : </label>
            <div class="col-sm-7"> 
              <input type="text" class="form-control" id="technique" name="technique" value="${ stuffDetail.etatTechnique }" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="fonctionnel">Etat fonctionnel : </label>
            <div class="col-sm-7"> 
              <input type="text" class="form-control" id="fonctionnel" name="fonctionnel" value="${ stuffDetail.etatFonctionnel }" disabled>            
            </div>
          </div>
          
          <div class="form-group">
            <label class="checkbox-inline col-sm-7">
                <input type="checkbox" id="checkboxMaintenance" data-marche=false data-maintenance=false name="checkboxMaintenance" value="">
                <span id="valueEtatFonctionnel"></span>
            </label>
          </div>
  
          <div class="form-group" id="commentFormGroup">
            <label class="control-label col-sm-4" for="parent">Commentaire : </label>
            <div class="col-sm-7"> 
              <textarea type="text" class="form-control" id="comment" name="comment"></textarea>
            </div>
          </div>          
  
          <div class="form-group">
            <label class="control-label col-sm-4" for="parent">Identifiant parent : </label>
            <div class="col-sm-7"> 
              <input type="text" class="form-control" id="parent" name="parent" value="${ stuffDetail.parent }" >
            </div>
          </div>
  
          <div style='margin-top: 20px;' class="form-group"> 
            <div class="col-sm-offset-2 col-sm-8">
              <button id="formEditButtonStuff" type="submit" class="btn btn-success">
                <i class="fa fa-check"></i> Sauvegarder
              </button>
              <button id="closeEditStuffModal" type="button" class="btn btn-primary" data-dismiss="modal">
                <i class="fa fa-close"></i> Annuler
              </button>
            </div>
          </div>
        </form>
    </div>
  </script>
</div>


