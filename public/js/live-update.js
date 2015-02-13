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

