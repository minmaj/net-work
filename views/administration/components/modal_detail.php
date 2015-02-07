<div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="viewDetailsModalLabel">Vue détaillée d'un équipement</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div id="headingDetailsModal" class="panel-heading">

                    </div>
                    <div id="bodyDetailsModal" class="panel-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script id="row_details_tmpl" type="text/x-jquery-tmpl">
            <div class="row">
                <div class="col-lg-4">
                    <span style="font-weight:bold;">ID</span>
                </div>
                <div>
                    ${ stuffDetail.id }
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-4">
                    <span style="font-weight:bold;">Type</span>
                </div>
                <div>
                    ${ stuffDetail.type }
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-4">
                    <span style="font-weight:bold;">Nom</span>
                </div>
                <div>
                    ${ stuffDetail.nom }
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-4">
                    <span style="font-weight:bold;">Etat fonctionnel</span>
                </div>
                <div>
                    ${ stuffDetail.etatFonctionnel }
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-4">
                    <span style="font-weight:bold;">Etat technique</span>
                </div>
                <div>
                    ${ stuffDetail.etatTechnique }
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-4">
                    <span style="font-weight:bold;">Comment</span>
                </div>
                <div>
                    ${ stuffDetail.comment }
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-4">
                    <span style="font-weight:bold;">Fabriquant</span>
                </div>
                <div>
                    ${ stuffDetail.fabriquant }
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-4">
                    <span style="font-weight:bold;">Localisation</span>
                </div>
                <div>
                    ${ stuffDetail.localisation }
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-4">
                    <span style="font-weight:bold;">Adresse IP</span>
                </div>
                <div>
                    ${ stuffDetail.adresseIp }
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-4">
                    <span style="font-weight:bold;">Proprietaire</span>
                </div>
                <div>
                    ${ stuffDetail.proprietaire }
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-4">
                    <span style="font-weight:bold;">Numéro support</span>
                </div>
                <div>
                    ${ stuffDetail.numeroSupport }
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-4">
                    <span style="font-weight:bold;">Parent</span>
                </div>
                <div>
                    ${ stuffDetail.parent }
                </div>
            </div>
            <hr/>
    </script>
</div>


