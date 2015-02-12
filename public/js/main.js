// init

$(document).ready(function() {

    updateTypesList(); // defined in live-update.js

    var lastStuffVisited;

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
                    if(data.nbEquipementEnPanne > 0){
                        $("#warning_message_equipement").html("<i class=\"fa fa-warning\"></i> Attention ! " + data.nbEquipementEnPanne + " " + typeEquipement.toLowerCase() + "(s) " + " actuellement en panne(s) !");
                        $("#warning_message_equipement").show("slow");
                    }
                    else{
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
     *  TODO COMMENTAIRE
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
     *  TODO COMMENTAIRE
     */
    $("#addStuffButton").click(function(e) {
        e.preventDefault();
        $("#form_title").text("Ajouter un équipement");
        $(".dynamic_content:visible").hide("slow", function() {
            $("#form").show("slow");
        });

        $('.home_link').off("click");
        $('.home_link').click(on_click_home_link);
    });

    /*
     * TODO COMMENTAIRE
     */
    $("#formAddButtonStuff").click(function(e) {
        e.preventDefault();

        var newStuff = new Object();
        newStuff.type = lastStuffVisited;

        $("#form form input, select, datalist").each(function(i, item) {
            if($(this).attr("id") !== undefined){
                fillStuff(newStuff, $(this))
            }
        });

        function fillStuff(newStuff, elem) {
            var key = elem.attr("id");
            if(elem.is("datalist")){
                newStuff[key] = elem.siblings("input").val();
            } else{
                newStuff[key] = elem.val();
            }
        }

        $.ajax({
            url: "administration/addStuff",
            type: 'POST',
            dataType: "json",
            data: newStuff,
            success: function(data) {
                //console.log(data);
            }
        });
    });

    /*
     *  TODO COMMENTAIRE
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
     *  TODO COMMENTAIRE
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
        getFailureStuff();
    }

    getFailureStuff();

    function getFailureStuff() {
        $.ajax({
            url: "administration/showFailureStuff",
            dataType: "json",
            success: createFailureStuffTable
        });
    }

    String.prototype.capitalize = function() {
        return this.charAt(0).toUpperCase() + this.slice(1);
    }

    function createFailureStuffTable(data) {
        $navTabs = $("<ul />").attr("class", "nav nav-tabs");
        $tabContent = $("<div />").attr("class", "tab-content");

        firstLoop = true;
        $.each(data, function(typePanne, equipements) {
            $navTabsList = $("<li />");
            // On rend le premier onglet du tableau actif
            if(firstLoop){
                $navTabsList.attr("class", "active");
            }

            $navTabsList.append($("<a />")
                    .attr("data-toggle", "tab")
                    .attr("href", "#" + typePanne)
                    .text("Panne " + typePanne));
            $navTabs.append($navTabsList);

            $thead = $("<thead />")
                    .append($("<tr />").attr("class", "blue-background")
                            .append($("<th />").text("ID"))
                            .append($("<th />").text("NOM"))
                            .append($("<th />").text("ETAT FONCTIONNEL"))
                            );
            $tbody = $("<tbody />");
            $.each(equipements, function(key, value) {
                $tbody.append($("<tr />").attr("class", "")
                        .append($("<td />")
                                .text(value.id))
                        .append($("<td />")
                                .text(value.nom))
                        .append($("<td />")
                                .text(value.etatFonctionnel)));

            });

            $tabHeader = $("<div />").attr("id", typePanne);
            if(firstLoop){
                $tabHeader.attr("class", "tab-pane fade active in");
            } else{
                $tabHeader.attr("class", "tab-pane fade");
            }
            $tabHeader
                    .append(
                            $("<h3 />")
                            .text("Panne(s) " + typePanne + "(s)"))
                    .append($("<div />")
                            .attr("class", "panel panel-default")
                            .append($("<table />")
                                    .attr("class", "table")
                                    .append($thead)
                                    .append($tbody)
                                    ));
            $tabHeader.appendTo($tabContent);
            firstLoop = false;
        });

        $defaultContent = $("#default_content");
        $defaultContent.children().remove();
        $navTabs.appendTo($defaultContent);
        $tabContent.appendTo($defaultContent);
    }

    $(".home_link").click(on_click_home_link);

    $("#stuffTable").tablesorter();

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
                    $headingEditModal = $('#headingEditModal');
                    $headingEditModal.children().remove();
                    $headingEditModal
                            .append($("<i />").attr("class", "fa fa-search-plus"))
                            .append($("<span />").attr("class", "EditModalTitle").text(" " + data.nom));
                    var stuff = {stuffDetail: data};

                    $('#bodyEditModal').html("");
                    $('#row_edit_tmpl').tmpl(stuff).appendTo('#bodyEditModal');

                    $("#commentFormGroup").hide();
                    $valueEtatFonctionnel = $("#valueEtatFonctionnel");

                    if(data.etatFonctionnel === "En arret de maintenance"){
                        $valueEtatFonctionnel.text("Mettre en marche l'équipement");
                    } else{
                        $valueEtatFonctionnel.text("Passer l'équipement en maintenance");
                    }

                    $("#checkboxMaintenance").change(function() {
                        if(data.etatFonctionnel === "En arret de maintenance"){ // Mettre en marche
                            equipementON = $(this).is(':checked');
                            console.log("on " + equipementON);
                            $("#checkboxMaintenance").data("marche", equipementON);
                        }

                        if(data.etatFonctionnel === "En marche"){ // Passer en arrêt de maintenance
                            equipementOFF = ($(this).is(':checked')) ? true : false;
                            console.log("off " + equipementOFF);
                            $("#checkboxMaintenance").data("maintenance", equipementOFF);
                        }

                        if($(this).is(':checked')){
                            $("#comment").val("");
                            $("#commentFormGroup").show();
                        } else{
                            $("#comment").val("");
                            $("#commentFormGroup").hide();
                        }
                    });
                    bindConfirmEditButton(idStuff);
                }
            });
        });
    }

    function bindConfirmEditButton(idStuff, equipementON, equipementOFF) {
        $('form#edit-form').on('submit', function(e) {
            e.preventDefault();

            var disabled = $(this).find(':input:disabled').removeAttr('disabled');
            var dataSerialize = $(this).serialize();
            disabled.attr('disabled', 'disabled');

            equipementON = $("#checkboxMaintenance").data("marche");
            equipementOFF = $("#checkboxMaintenance").data("maintenance");
            console.log(dataSerialize + "&idStuff=" + idStuff + "&equipementON=" + equipementON + "&equipementOFF=" + equipementOFF);
            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                dataType: "json",
                data: dataSerialize + "&idStuff=" + idStuff + "&equipementON=" + equipementON + "&equipementOFF=" + equipementOFF,
                sucess: function(data) {
                    //console.log(data);
                }
            });
        });
    }

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
     * NOTIFICATIONS WORK
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



    refreshNotifData();

    $("#notifReadButton").click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "administration/updateRead",
            type: 'POST',
            dataType: "json",
            success: function(data) {
                //console.log(data);
                refreshNotifData();
            }
        });
    });


    getDonutDataArray();

    /*
     *  TODO COMMENTAIRE
     */
    function getDonutDataArray() {
        $.ajax({
            url: "administration/donutData",
            type: 'POST',
            dataType: "json",
            success: function(data) {
                var donutData = [];
                for(var tmp in data){
                    donutData[tmp] = {
                        label: data[tmp].libelle,
                        value: data[tmp].value
                    };
                }
                Morris.Donut({
                    element: 'morris-donut-chart',
                    data: donutData,
                    colors: ['#6600CC', '#FF3300', '#FFCC00', '#61B329']
                });
            }
        });
    }
});

