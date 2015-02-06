// init

$(document).ready(function() {

    var lastStuffVisited;

    $("a[data-categorie]").click(function(e) {
        e.preventDefault();

        var typeEquipement = $(this).data("categorie");
        // Affiche la liste des équipements pour un type donné
        $(".dynamic_content:visible").hide("slow").promise().done(function() {
            $.ajax({
                url: "administration/showStuff",
                type: 'POST',
                dataType: "json",
                data: "typeEquipement=" + typeEquipement,
                success: function(data) {
                    var stuff = {stuff: data.equipementList};
                    $('#stuffTable tbody > tr').remove();
                    $('#row_stuff_table_tmpl').tmpl(stuff).appendTo('#stuffTable tbody');

                    /*<div class="alert alert-warning" role="alert">Attention! 8 ordinateurs fixes sont actuellement en pannes!</div>*/
                    $("#warning_message_equipement").html("Attention ! " + data.nbEquipementEnPanne + " " + typeEquipement.toLowerCase() + "(s) " + "est/sont actuellement en panne(s)!");
                }
            });

            $("#equipment_table").show("slow");
        });

        $("#breadlist").html('<li><a class="home_link" href="#">NET-WORK</a></li><li class="active"><a href="#">'
                + $(this).attr("data-categorie")
                + '</a></li>');
        $("#title_content").text($(this).attr("data-categorie"));
        $('.home_link').off("click");
        $('.home_link').click(on_click_home_link);

    });

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

    $("#addStuffButton").click(function(e) {
        e.preventDefault();

        $(".dynamic_content:visible").hide("slow", function() {
            $("#form").show("slow");
        });

        $('.home_link').off("click");
        $('.home_link').click(on_click_home_link);
    });

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

    $(".home_link").click(on_click_home_link);

    $("#stuffTable").tablesorter();

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
                firstLoop = false;
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
                console.log(key + " : " + value.id);
                $tbody.append($("<tr />").attr("class", "")
                        .append($("<td />")
                                .text(value.id))
                        .append($("<td />")
                                .text(value.nom))
                        .append($("<td />")
                                .text(value.etatFonctionnel)));

            });

            $tabContent
                    .append($("<div />")
                            .attr("id", typePanne)
                            .attr("class", "tab-pane fade")
                            .append($("<h3 />")
                                    .text("Panne(s) " + typePanne + "(s)"))
                            .append($("<div />")
                                    .attr("class", "panel panel-default")
                                    .append($("<table />")
                                            .attr("class", "table")
                                            .append($thead)
                                            .append($tbody)
                                            )
                                    )
                            );
        });

        $defaultContent = $("#default_content");
        $defaultContent.children().remove();
        $navTabs.appendTo($defaultContent);
        $tabContent.appendTo($defaultContent);
    }

    // Donut relative code

    getDonutDataArray();

    function getDonutDataArray() {
        $.ajax({
            url: "administration/donutData",
            type: 'POST',
            dataType: "json",
            success: function(data) {
                Morris.Donut({
                    element: 'morris-donut-chart',
                    data: data,
                    colors: ['#6600CC', '#FF3300', '#FFCC00', '#61B329']
                });
            }
        });
    }
});

