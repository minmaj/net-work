
// init
$("#stuffcontent").hide();
$("#addform").hide();
$("#supptest").hide();
var lastStuffVisited;

function showstuffcontent(stuffName) {
    if ($("#homecontent").is(":visible"))
        $("#homecontent").hide("slow");
    if ($("#addform").is(":visible"))
        $("#addform").hide("slow");
    $("#stuffcontent").show("slow");
    $("#breadlist").html('<li><a onclick="showhomecontent()" href="#">NET-WORK</a></li><li class="active"><a href="#">' + stuffName + '</a></li>');
    lastStuffVisited = stuffName;
}

function showhomecontent() {
    if ($("#stuffcontent").is(":visible"))
        $("#stuffcontent").hide("slow");
    if ($("#addform").is(":visible"))
        $("#addform").hide("slow");
    $("#homecontent").show("slow");
    $("#breadlist").html('<li><a onclick="showhomecontent()" href="#">NET-WORK</a></li>');
}

function showaddform() {
    if ($("#homecontent").is(":visible"))
        $("#homecontent").hide("slow");
    if ($("#stuffcontent").is(":visible"))
        $("#stuffcontent").hide("slow");
    $("#addform").show("slow");
    $("#breadlist").append('<li class="active"><a href="#">Ajout d\'un enregistrement</a></li>');
}

$("#stuffTable").tablesorter();