<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bell fa-fw"></i> Notifications
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div id="notifPanelListGroup" class="list-group">
            
        </div>
        <!-- /.list-group -->
        <button id="notifReadButton" type="button" class="btn btn-default btn-block"><i class="fa fa-check-circle-o"></i> Tout marquer comme lu</button>
    </div>
    
    <script id="notif_list_tmpl" type="text/x-jquery-tmpl">
        {{if notifs.length!=0}}
            {{each(i,item) notifs}}
                <a href="#" class="list-group-item">
                    {{if item.negative == 0}}
                        <span class="green-font"> 
                        {{if item.libelle == "CREATE"}}
                            <i class="fa fa-plus fa-fw"></i> Creation effectuée :                       
                        {{else item.libelle == "UPDATE"}}
                            <i class="fa fa-edit fa-fw"></i> Mis a jour effectuée :
                        {{else item.libelle == "REPAIRED"}}
                            <i class="fa fa-wrench fa-fw"></i> Réparation effectuée :
                        {{else item.libelle == "DELETE"}}
                            <i class="fa fa-remove fa-fw"></i> Suppression effectuée :
                        {{else item.libelle == "MAINTENANCE"}}
                            <i class="fa fa-server fa-fw"></i> Maintenance déclenchée :
                        {{/if}}
                    {{else}}
                        <span class="red-font">
                        {{if item.libelle == "MINOR"}}
                            <i class="fa fa-warning fa-fw"></i> Panne mineure survenue :
                        {{else item.libelle == "MAJOR"}}
                            <i class="fa fa-warning fa-fw"></i> Panne majeure survenue :
                        {{else item.libelle == "UNKNOWN"}}
                            <i class="fa fa-question fa-fw"></i> Statut inconnu détecté :
                        {{/if}}
                    {{/if}}
                    ${ item.nomequip }</span><br/>
                    <span class="subNotif">${ item.elapsedTime }</span>
                </a>
            {{/each}}
        {{/if}}
    </script>
    <!-- /.panel-body -->
</div>