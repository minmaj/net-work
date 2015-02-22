// init

$(document).ready(function() {
    
    /*
     * A noter !
     * $(...).tmpl(param) où tmpl est une fonction permettant de :
     * - 1) Chercher un element du DOM renvoye par JQuery sur lequel une 
     * fonction d'analyse de template, cad "tmpl" (voir vendor/jquery.tmpl.min.js) 
     * est appelee
     * - 2) transferer "param" au template pour l'utiliser
     */

    var lastStuffVisited;

    refreshFailureStuff(); // defined in live-update.js
    updateTypesList(); // defined in live-update.js
    refreshNotifs(); // defined in live-update.js
    refreshDonutsDataArray(); // defined in live-update.js

    useSynoptique(); // defined in synoptique.js

    /*
     * Rafraichit le tableau des équipements de la vue courante (donc en fonction
     * du lastStuffVisited)
     */
    refreshStuffTable(function(data) {
        data = data[lastStuffVisited];
        var stuff = {stuff: data};
        $('#stuffTable tbody > tr').remove();
        $('#row_stuff_table_tmpl').tmpl(stuff).appendTo('#stuffTable tbody');
        bindButtonView();
        bindButtonEdit();
        bindButtonDelete();
    });

    /*
     * Bouton pour lancer la simulation de mise en pannes 
     * et autres modifications sur les équipements
     */
    function bindSimulationButton(e) {
        e.preventDefault();
        $("#run_simulation").unbind("click");
        $("#default_simulation_msg").hide();
        $("#running_simulation_msg").show();
        $.ajax({
            url: "administration/launchSimulation",
            type: 'GET',
            dataType: "json",
            success: function(data) {
                console.log(data);
                $("#run_simulation").click(bindSimulationButton);
                $("#default_simulation_msg").show();
                $("#running_simulation_msg").hide();
            }
        });
    }

    $("#run_simulation").click(bindSimulationButton);


    /*
     * Lorsqu'on clique sur un element de la liste des categories d'equipement,
     * le contenu principal courant disparait avec une animation de fondu lent
     * puis une requete ajax est emise a l'adresse administration/showStuff 
     * (controller = administration & action = showStuff) pour recuperer sous
     * format JSON la liste des equipements par la categorie concernee
     */
    $("a[data-categorie]").click(function(e) {
        e.preventDefault();

        var typeEquipement = $(this).data("categorie");
        lastStuffVisited = typeEquipement;
        // Affiche la liste des équipements pour un type donné
        $(".dynamic_content:visible").fadeOut("slow").promise().done(function() {
            $.ajax({
                url: "administration/showStuff",
                type: 'POST',
                dataType: "json",
                data: "typeEquipement=" + typeEquipement,
                success: function(data) {
                    var stuff = {stuff: data.equipementList};
                    $('#stuffTable tbody > tr').remove();
                    $('#row_stuff_table_tmpl').tmpl(stuff).appendTo('#stuffTable tbody');
                    bindButtonView();
                    bindButtonEdit();
                    bindButtonDelete();

                    /*<div class="alert alert-warning" role="alert">Attention! 8 ordinateurs fixes sont actuellement en pannes!</div>*/
                    if (data.nbEquipementEnPanne > 0) {
                        $("#warning_message_equipement").html("<i class=\"fa fa-warning\"></i> Attention ! " + data.nbEquipementEnPanne + " " + typeEquipement.toLowerCase() + "(s) " + " actuellement en panne(s) !");
                        $("#warning_message_equipement").show("slow");
                    }
                    else {
                        $("#warning_message_equipement").html("");
                        $("#warning_message_equipement").hide("slow");
                    }
                }
            });

            $("#equipment_table").fadeIn("slow");
        });

        $("#breadlist").html('<li><a class="home_link" href="#">NET-WORK</a></li><li class="active"><a href="#">'
                + $(this).attr("data-categorie")
                + '</a></li>');
        $("#title_content").text($(this).attr("data-categorie"));
        $('.home_link').off("click");
        $('.home_link').click(on_click_home_link);

    });

    /*
     *  Bouton de retour a la page d'accueil
     */
    $("#backHomeButton").click(function(e) {
        e.preventDefault();
        $(".dynamic_content:visible").hide("slow", function() {
            $("#default_content").show("slow");
        });
        $("#title_content").text("Dashboard");
        $("#breadlist").html('<li><a class="home_link" href="#">NET-WORK</a></li>');
        $('.home_link').off("click");
        $('.home_link').click(on_click_home_link);
    });

    /*
     *  Bouton d'ajout qui affiche le formulaire d'ajout d'un equipement
     */
    $("#addStuffButton").click(function(e) {
        e.preventDefault();

        $('#warning_message_add_equipement').hide();
        $('#success_message_add_equipement').hide();

        $("#form_title").text("Ajouter un équipement");
        $(".dynamic_content:visible").hide("slow", function() {
            $("#form").show("slow");
        });

        $('.home_link').off("click");
        $('.home_link').click(on_click_home_link);
    });

    /*
     * Bouton d'ajout depuis le formulaire d'ajout d'equipement qui envoie
     * les données en ajax au serveur. Le serveur doit traiter cette requete
     * par l'ajout d'un nouvel equipement dans la BD ou renvoyer une erreur si
     * l'ajout a echoue
     * 
     */
    $("#formAddButtonStuff").click(function(e) {
        e.preventDefault();

        var newStuff = $("#form form").serialize() + "&type=" + lastStuffVisited;
        $('#warning_message_add_equipement').hide();
        $('#success_message_add_equipement').hide();

        $.ajax({
            url: "administration/addStuff",
            type: 'POST',
            dataType: "json",
            data: newStuff,
            success: function(data) {
                if (data.error !== false) {
                    $('#warning_message_add_equipement').text(data.error).show();
                } else {
                    $('#success_message_add_equipement').show();
                }
            }
        });

        $(this).closest('form').find("input[type=text], textarea").val("");

    });

    $('#form').submit(function(e) {
        e.preventDefault();
    });

    /*
     *  Dans le formulaire d'ajout, si on souhaite assigner l'identifiant d'un equipement
     *  parent, il faut d'abord preciser sa categorie
     */
    $("#categorie_parent").change(function() {
        var typeEquipement = $(this).val();
        $.ajax({
            url: "administration/showStuff",
            type: 'POST',
            dataType: "json",
            data: "typeEquipement=" + typeEquipement,
            success: function(data) {
                var stuffs = {stuffsByType: data.equipementList};
                $('#parent option').remove();
                $('#parent_stuff_form_tmpl').tmpl(stuffs).appendTo('#parent');

            }
        });
    });

    /*
     *  Le clique du lien d'accueil situé sur le fil d'ariane (breadcrumb)
     *  provoquera l'affichage du contenu d'accueil
     */
    function on_click_home_link(e) {
        e.preventDefault();
        $(".dynamic_content:visible").hide("slow", function() {
            $("#default_content").show("slow");
        });
        $("#title_content").text("Dashboard");
        $("#breadlist").html('<li><a class="home_link" href="#">NET-WORK</a></li>');
        $('.home_link').off("click");
        $('.home_link').click(on_click_home_link);
    }

    $(".home_link").click(on_click_home_link);

    /*
     * Mets au majuscule la premiere lettre d'une chaine de caractere
     * 
     * @returns {String.prototype@call;slice|String.prototype@call;charAt@call;toUpperCase}
     */
    String.prototype.capitalize = function() {
        return this.charAt(0).toUpperCase() + this.slice(1);
    }

    /*
     * Affiche le detail d'un equipement sous forme d'une fenetre modale 
     * lors d'un clique sur le bouton "detail" depuis le tableau des equipements
     */
    function bindButtonView() {
        $(".buttonView").click(function(e) {
            e.preventDefault();
            var idStuff = $(this).data("categorie");

            $.ajax({
                url: "administration/detailsData",
                type: 'POST',
                dataType: "json",
                data: "idStuff=" + idStuff,
                success: function(data) {
                    console.log(data.nom);
                    $('#headingDetailsModal').html("<i class=\"fa fa-search-plus\"></i><span class=\"detailsModalTitle\"> " + data.nom + "</span>");
                    var stuff = {stuffDetail: data};
                    $('#bodyDetailsModal').html("");
                    $('#row_details_tmpl').tmpl(stuff).appendTo('#bodyDetailsModal');
                }
            });
        });

    }

    /*
     * Affiche un formulaire d'edition d'un equipement sous forme d'une 
     * fenetre modale lors d'un clique sur le bouton "detail" depuis le tableau 
     * des equipements
     */
    function bindButtonEdit() {
        $(".buttonEdit").click(function(e) {
            e.preventDefault();
            var idStuff = $(this).data("categorie");

            $.ajax({
                url: "administration/detailsData",
                type: "POST",
                dataType: "json",
                data: "idStuff=" + idStuff,
                success: function(data) {
                    var headingEditModal = $('#headingEditModal');
                    headingEditModal.children().remove();
                    headingEditModal
                            .append($("<i />").attr("class", "fa fa-search-plus"))
                            .append($("<span />").attr("class", "EditModalTitle").text(" " + data.nom));
                    var stuff = {stuffDetail: data};

                    $('#bodyEditModal').html("");
                    $('#row_edit_tmpl').tmpl(stuff).appendTo('#bodyEditModal');
                    $("#commentFormGroup").hide();

                    etat = (data.etatFonctionnel === "En arret de maintenance") ? "Mettre en marche l'équipement" : "Passer l'équipement en maintenance";
                    $("#valueEtatFonctionnel").text(etat);

                    var passerEquipementEnMarche = false;
                    var passerEquipementEnMaintenance = false;

                    $("#checkboxMaintenance").change(function() {
                        if (data.etatFonctionnel === "En arret de maintenance") { // Mettre en marche
                            passerEquipementEnMarche = $(this).is(':checked');
                            console.log("passerEquipementEnMarche " + passerEquipementEnMarche);
                            $("#checkboxMaintenance").data("marche", passerEquipementEnMarche);
                        } else { // Passer en arrêt de maintenance
                            passerEquipementEnMaintenance = $(this).is(':checked');
                            console.log("passerEquipementEnMaintenance " + passerEquipementEnMaintenance);
                            $("#checkboxMaintenance").data("maintenance", passerEquipementEnMaintenance);
                        }

                        var commentFormGroup = $("#commentFormGroup");
                        $("#comment").val("");
                        if ($(this).is(':checked')) {
                            commentFormGroup.show();
                        } else {
                            commentFormGroup.hide();
                        }
                    });
                    bindConfirmEditButton(idStuff, passerEquipementEnMarche, passerEquipementEnMaintenance);
                }
            });
        });
    }

    /*
     * Permet d'envoyer les donnees d'edition d'equipement en ajax au serveur,
     * apres avoir clique sur le bouton de confirmation
     * 
     * 
     * @param idStuff
     * @param passerEquipementEnMarche
     * @param passerEquipementEnMaintenance
     */
    function bindConfirmEditButton(idStuff, passerEquipementEnMarche, passerEquipementEnMaintenance) {
        $('form#edit-form').on('submit', function(e) {
            e.preventDefault();
            console.log("ok");

            var disabled = $(this).find(':input:disabled').removeAttr('disabled');
            var dataSerialize = $(this).serialize();
            disabled.attr('disabled', 'disabled');

            passerEquipementEnMarche = $("#checkboxMaintenance").data("marche");
            passerEquipementEnMaintenance = $("#checkboxMaintenance").data("maintenance");

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                dataType: "json",
                data: dataSerialize + "&idStuff=" + idStuff + "&passerEquipementEnMarche=" + passerEquipementEnMarche + "&passerEquipementEnMaintenance=" + passerEquipementEnMaintenance,
                success: function(data) {
                    console.log("data : " + data);
                    if (data.comment !== "" || data.nom !== "") { // Afficher les messages d'erreurs
                        var errorMsgPanel = $("#errorMsgPanel");
                        errorMsgPanel.attr("class", "alert alert-danger").attr("role", "alert");
                        var msgError = $("<ul />");
                        if (data.comment !== "") { // Champ commentaire non rempli alors qu'il le devrait
                            msgError.append($("<li />").text(data.comment));
                        }

                        if (data.nom !== "") { // Champ nom non rempli
                            msgError.append($("<li />").text(data.nom));
                        }
                        errorMsgPanel.html(msgError);
                    } else {
                        $("#viewEditModal").modal("hide");
                    }
                },
                error: function(resultat, statut, erreur) {
                    console.log(resultat.comment + " - " + resultat.nom + " - " + statut + " - " + erreur);
                }
            });
        });
    }

    /*
     * Affiche une fenetre de confirmation de suppression d'un equipement 
     * lors du clique sur le bouton de suppression depuis le tableau des equipements
     * 
     */
    function bindButtonDelete() {
        $(".buttonDelete").click(function(e) {
            e.preventDefault();
            var idStuff = $(this).data("categorie");

            $.ajax({
                url: "administration/detailsData",
                type: 'POST',
                dataType: "json",
                data: "idStuff=" + idStuff,
                success: function(data) {
                    var stuff = {stuff: data};
                    $('#bodyDeleteModal').html("");
                    $('#row_delete_tmpl').tmpl(stuff).appendTo('#bodyDeleteModal');
                    bindConfirmDeleteButton(idStuff);
                }
            });
        });
    }

    /*
     * Envoie l'ordre de suppression de l'equipement en ajax au serveur
     */
    function bindConfirmDeleteButton(idStuffToDelete) {
        $(".confirmDeleteButton").click(function(e) {
            e.preventDefault();

            $.ajax({
                url: "administration/deleteStuff",
                type: "POST",
                dataType: "json",
                data: "idStuff=" + idStuffToDelete
            });
        });
    }

    /*
     * Rafraichit les notifications en demandant les donnees au serveur en ajax
     */
    function refreshNotifData() {
        $.ajax({
            url: "administration/notifData",
            type: 'POST',
            dataType: "json",
            success: function(data) {
                //console.log(data);
                var notif = {notifs: data};
                $('#notifPanelListGroup').html("");
                $('#notif_list_tmpl').tmpl(notif).appendTo('#notifPanelListGroup');
            }
        });
    }

    /*
     * Envoie en ajax l'ordre de marquer les notifications comme etant lues
     */
    $("#notifReadButton").click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "administration/updateRead",
            type: 'POST',
            dataType: "json",
            success: function(data) {
                $('#notifPanelListGroup').fadeOut("slow");
                refreshNotifData();
                $('#notifPanelListGroup').fadeIn("slow");
            }
        });
    });

});

