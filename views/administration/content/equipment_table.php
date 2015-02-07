<div id="equipment_table" class="dynamic_content" style="display: none">
    <div id="warning_message_equipement" class="alert alert-warning" role="alert" style="display: none"></div>

    <div class="panel panel-default"> 
        <table id="stuffTable" class="table tablesorter">
            <thead>
                <tr class="blue-background">
                    <th>ID</th>
                    <th>NOM</th>
                    <th>ETAT FONCTIONNEL</th>
                    <th>ETAT TECHNIQUE</th>
                    <th class="buttonColumn"></th>
                </tr>
            </thead>
            <tbody>

            <script id="row_stuff_table_tmpl" type="text/x-jquery-tmpl">
                {{if stuff.length!=0}}
                    {{each(i,item) stuff}}
                        <tr>
                            <td>${ item.id }</td>
                            <td><span style="font-weight: bold;">${ item.nom }</span></td>
                            <td>${ item.etatFonctionnel }</td>
                            {{if item.etatTechnique == "En panne mineure"}}
                                <td><span class="label label-default">${ item.etatTechnique }</span></td>                          
                            {{else item.etatTechnique == "En panne majeure"}}
                                <td><span class="label label-warning">${ item.etatTechnique }</span></td>
                            {{else item.etatTechnique == "En panne critique"}}
                                <td><span class="label label-danger">${ item.etatTechnique }</span></td>
                            {{else item.etatTechnique == "Fonctionnel"}}
                                <td><span class="label label-info">${ item.etatTechnique }</span></td>
                            {{else}}
                                <td>${ item.etatTechnique }</td>
                            {{/if}}
                            <td class="buttonColumn">
                                <button type="button" class="btn btn-default btn-xs buttonView"
                                        data-toggle="modal"
                                        data-target="#viewDetailsModal"
                                        data-categorie=${ item.id }>
                                    <i class="fa fa-search-plus"></i> View details
                                </button>
                                <button type="button" class="btn btn-info btn-xs buttonEdit"
                                        data-categorie=${ item.id }>
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <button type="button" class="btn btn-danger btn-xs buttonDelete"
                                        data-toggle="modal"
                                        data-target="#suppressionModal"
                                        data-categorie=${ item.id }>
                                    <i class="fa fa-times"></i> Delete
                                </button>
                            </td>
                        </tr>
                    {{/each}}
                {{/if}}
            </script>

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





