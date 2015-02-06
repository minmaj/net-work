<div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="viewDetailsModalLabel">Vue détaillée d'un équipement</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span id="detail_title">X</span>
                    </div>
                    <div class="panel-body">
                        <script id="row_stuff_table_tmpl" type="text/x-jquery-tmpl">
                            {{if stuff.length!=0}}
                                {{each(i,item) stuff}}
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p></p>
                                        </div>
                                        <div>
                                            <p></p>
                                        </div>
                                    </div>
                                {{/each}}
                            {{/if}}
                        </script>
                        <hr/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
