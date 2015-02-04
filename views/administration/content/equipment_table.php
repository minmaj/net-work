<div id="equipment_table" class="dynamic_content" style="display: none">
    <div class="alert alert-warning" role="alert">Attention! 8 ordinateurs fixes sont actuellement en pannes!</div>

    <div class="panel panel-default"> 
        <table id="stuffTable" class="table tablesorter">
            <thead>
                <tr class="blue-background">
                    <th>ID</th>
                    <th>NOM</th>
                    <th>FABRIQUANT</th>
                    <th>ADRESSE IP</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="warning-row">
                    <td>1</td>
                    <td>YOLO</td>
                    <td>DOGE CORP.</td>
                    <td>127.0.0.1</td>
                    <td>
                        <button type="button" class="btn btn-default btn-xs"
                                data-toggle="modal"
                                data-target="#viewDetailsModal">
                            <i class="fa fa-search-plus"></i> View details
                        </button>
                        <button type="button" class="btn btn-info btn-xs">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-xs"
                                data-toggle="modal"
                                data-target="#suppressionModal">
                            <i class="fa fa-times"></i> Delete
                        </button>
                    </td>
                </tr>
                <tr class="valid-row">
                    <td>2</td>
                    <td>SWAG</td>
                    <td>DOGE CORP.</td>
                    <td>127.0.0.1</td>
                    <td>
                        <button type="button" class="btn btn-default btn-xs"
                                data-toggle="modal"
                                data-target="#viewDetailsModal">
                            <i class="fa fa-search-plus"></i> View details
                        </button>
                        <button type="button" class="btn btn-info btn-xs">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-xs"
                                data-toggle="modal"
                                data-target="#suppressionModal">
                            <i class="fa fa-times"></i> Delete
                        </button>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bouton d'ajout -->
    <button id="addStuffButton" type="button" class="btn btn-success" style="margin-bottom: 10px;">
        <i class="fa fa-plus"></i> Ajouter
    </button>
    <button id="backHomeButton" type="button" class="btn btn-primary" style="margin-bottom: 10px;">
        <i class="fa fa-reply"></i> Retour
    </button>

    <hr />
</div>