function updateTypesList() {
    if (typeof (EventSource) !== "undefined") {
        var eSource = new EventSource("sender/stuffCountBadges");
        eSource.addEventListener("stuffCountBadges", function(event) {
            $(JSON.parse(event.data)).each(function(i,item){
               //console.log($("a[data-categorie='" + this.libelle + "']").find(".badge").text(this.occurence)); 
            });
            
        });
    }
    else {
        alert("Whoops! Your browser doesn't receive server-sent events.");
    }
}

