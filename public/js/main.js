// init

$(document).ready(function () {

    var lastStuffVisited;

    $("a[data-categorie]").click(function (e) {
        e.preventDefault();

        typeEquipement = $(this).data("categorie");
        // Affiche la liste des équipements pour un type donné
        $.ajax({
            url: "administration/showStuff",
            type: 'POST',
            datatype: "json",
            data: "typeEquipement=" + typeEquipement,
            success: function (data) {
                /*<div class="alert alert-warning" role="alert">Attention! 8 ordinateurs fixes sont actuellement en pannes!</div>*/
                $("#warning_message_equipement").html("Attention ! " + data.nbEquipementEnPanne + " " + typeEquipement.toLowerCase() + "(s) " + "est/sont actuellement en panne(s)!");

                console.log(data["nbEquipementEnPanne"]);
                $panel = $("<div />").attr("class", "panel panel-default");
                $panel.html("<pre><code>" + JSON.stringify(data) + "</pre></code>");
                $panel.appendTo("#main_content");
            }
        });

        $(".dynamic_content").hide("slow", function () {
            setTimeout(function () {
                $("#equipment_table").show("slow");
            }, 1);
        });
        $("#breadlist").html('<li><a class="home_link" href="#">NET-WORK</a></li><li class="active"><a href="#">'
                + $(this).attr("data-categorie")
                + '</a></li>');
        $("#title_content").text($(this).attr("data-categorie"));
        $('.home_link').off("click");
        $('.home_link').click(on_click_home_link);

    });

    $("#backHomeButton").click(function (e) {
        e.preventDefault();
        $(".dynamic_content").hide("slow", function () {
            setTimeout(function () {
                $("#default_content").show("slow");
            }, 1);
        });
        $("#title_content").text("Dashboard");
        $("#breadlist").html('<li><a class="home_link" href="#">NET-WORK</a></li>');
        $('.home_link').off("click");
        $('.home_link').click(on_click_home_link);
    });

    $("#addStuffButton").click(function (e) {
        e.preventDefault();

        var dfd = $.Deferred();

        $(".dynamic_content").hide("slow", function () {
            setTimeout(function () {
                $("#form").show("slow");
            }, 1);
        });

        $('.home_link').off("click");
        $('.home_link').click(on_click_home_link);
    });

    function on_click_home_link(e) {
        e.preventDefault();
        $(".dynamic_content").hide("slow", function () {
            setTimeout(function () {
                $("#default_content").show("slow");
            }, 1);
        });
        $("#title_content").text("Dashboard");
        $("#breadlist").html('<li><a class="home_link" href="#">NET-WORK</a></li>');
        $('.home_link').off("click");
        $('.home_link').click(on_click_home_link);
    }

    $(".home_link").click(on_click_home_link);

    $("#stuffTable").tablesorter();
    
    // Donut relative code
    
    function getDonutSegment(segmentLabel, segmentValue) {
        var donutObject = {};
        donutObject[label] = segmentLabel;
        donutObject[value] = segmentValue;
        return donutObject;
    }
    Morris.Donut({
    element: 'morris-donut-chart',
    data: [
      {label: "Fonctionnel", value: 8},
      {label: "En panne mineure", value: 5},
      {label: "En panne majeure", value: 3},
      {label: "Inconnu", value: 1}
    ],
    colors: ['#61B329','#FFCC00','#FF3300','#6600CC']
    });
});

