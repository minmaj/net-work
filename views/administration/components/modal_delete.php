<div class="modal fade" id="suppressionModal" tabindex="-1" role="dialog" aria-labelledby="suppressionModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="suppressionModalLabel">Voulez-vous vraiment supprimer ?</h4>
            </div>
            <div class="modal-body">
                <div id="bodyDeleteModal" class="panel-body">
                        
                </div>
            </div>
        </div>
    </div>
    
    <script id="row_delete_tmpl" type="text/x-jquery-tmpl">
        <div class="row"><div class="alert alert-info" role="alert">Êtes-vous surs de vouloir supprimer l'équipement <span style="font-weight:bold;">${ stuff.nom }</span> ? </div></div>
        <div class="row">
            <div class="col-lg-4">
                <button type="button" class="btn btn-success confirmDeleteButton" data-dismiss="modal" data-category=${ stuff.id }>Oui</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </script>
</div>