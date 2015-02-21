function refreshFailureStuff() {
    if (typeof (EventSource) !== "undefined") {
        var eSource = new EventSource("sender/refreshFailureStuff");
        eSource.addEventListener("refreshFailureStuff", function(event) {
            var data = JSON.parse(event.data);
            $("#default_content table[data-failtype]").each(function(i, item) {
                $(this).find("tbody tr").remove();
                var failtype = $(this).attr("data-failtype");
                for (var i in data[failtype]) {
                    var stuff = '<tr><td>' + data[failtype][i].id + '</td><td>' + data[failtype][i].nom + '</td><td>' + data[failtype][i].type + '</td><td>' + data[failtype][i].etatFonctionnel + '</td></tr>';
                    $(this).find("tbody").append(stuff);
                }
            });
        });
    }
    else {
        alert("Whoops! Your browser doesn't receive server-sent events.");
    }
}

function updateTypesList() {
    if (typeof (EventSource) !== "undefined") {
        var eSource = new EventSource("sender/stuffCountBadges");
        eSource.addEventListener("stuffCountBadges", function(event) {
            $(JSON.parse(event.data)).each(function(i, item) {
                //console.log($("a[data-categorie='" + this.libelle + "']").find(".badge").text(this.occurence)); 
                $("a[data-categorie='" + this.libelle + "']").find(".badge").text(this.occurence);
            });

        });
    }
    else {
        alert("Whoops! Your browser doesn't receive server-sent events.");
    }
}

function refreshStuffTable(callback) {
    if (typeof (EventSource) !== "undefined") {
        var eSource = new EventSource("sender/refreshStuffTable");
        eSource.addEventListener("refreshStuffTable", function(event) {
            callback(JSON.parse(event.data));
        });
    }
    else {
        alert("Whoops! Your browser doesn't receive server-sent events.");
    }
}

function refreshNotifs() {
    if (typeof (EventSource) !== "undefined") {
        var eSource = new EventSource("sender/notifRefresh");
        eSource.addEventListener("refreshNotif", function(event) {
            var data = JSON.parse(event.data);
            var notif = {notifs: data};
            $('#notifPanelListGroup').html("");
            $('#notif_list_tmpl').tmpl(notif).appendTo('#notifPanelListGroup');
        });
    }
    else {
        alert("Whoops! Your browser doesn't receive server-sent events.");
    }
}

function refreshDonutsDataArray() {
    if (typeof (EventSource) !== "undefined") {
        var eSource = new EventSource("sender/donutData");
        eSource.addEventListener("donutData", function(event) {
            $("#morris-donut-chart").html("");
            var data = JSON.parse(event.data);
            var donutData = [];
            for (var tmp in data) {
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
        });
    }
    else {
        alert("Whoops! Your browser doesn't receive server-sent events.");
    }
}

