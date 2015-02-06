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
    }

    $(".home_link").click(on_click_home_link);

    $("#stuffTable").tablesorter();

    // Donut relative code

    getDonutDataArray();

    function getDonutDataArray () {
        $.ajax({
            url: "administration/donutData",
            type: 'POST',
            dataType: "json",
            success: function (data) {
                    Morris.Donut({
                        element: 'morris-donut-chart',
                        data: data,
                        colors: ['#6600CC', '#FF3300', '#FFCC00', '#61B329']
                    });
            }
        });
    }
});

