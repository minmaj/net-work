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
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="control-label col-sm-4" for="nom">Nom:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="nom" value="${ stuffDetail.nom }">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="fabriquant">Fabriquant:</label>
            <div class="col-sm-7"> 
              <input type=text class="form-control" id="fabriquant" value="${ stuffDetail.fabriquant }" >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="ad-physique">Adresse Physique:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="ad-physique" value="${ stuffDetail.adressePhysique }">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="ad-ip">Adresse IP:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="ad-ip" value="${ stuffDetail.adresseIp }">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="prop">Propriétaire:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="prop" value="${ stuffDetail.proprietaire }">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="localisation">Localisation:</label>
            <div class="col-sm-7"> 
              <input type="text" list="localisation" >
              <datalist id=localisation >
                <option> DOGE LAND
                <option> SUCH WOW COUNTRY
              </datalist>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="numero">Numéro :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="numero" value="${ stuffDetail.telephone }">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4" for="technique">Etat technique :</label>
            <div class="col-sm-7"> 
                <input type="text" class="form-control" id="etatTechnique" value="${ stuffDetail.etatTechnique }" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="fonctionnel">Etat fonctionnel :</label>
            <div class="col-sm-7"> 
                <input type="text" class="form-control" id="etatFonctionnel" value="${ stuffDetail.etatFonctionnel }" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="categorie_parent">Type de l'equipement parent :</label>
            <div class="col-sm-7"> 

            </div>

          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="parent">Equipement parent :</label>
            <div class="col-sm-7"> 

            </div>
          </div>
          <div style='margin-top: 20px;' class="form-group"> 
            <div class="col-sm-offset-2 col-sm-8">
                <button id="formEditButtonStuff" type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Sauvegarder
                </button>
                <button id="closeEditStuffModal" type="button" class="btn btn-primary" >
                    <i class="fa fa-close"></i> Annuler
                </button>
            </div>
        </div>
          
        </form>
    </div>
  </script>
</div>


