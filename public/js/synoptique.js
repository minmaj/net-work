function useSynoptique() {
    $("#synoptique").click(function() {

        $(".dynamic_content:visible").fadeOut("slow").promise().done(function() {
            $("#title_content").text("Synoptique");
            $("#synoptique_content").fadeIn("slow");
            createCircle();
        });
    });

}

function createCircle()
{
    var svgNS = "http://www.w3.org/2000/svg";
    var myCircle = document.createElementNS(svgNS, "circle"); //to create a circle, for rectangle use rectangle
    myCircle.setAttributeNS(null, "id", "mycircle");
    myCircle.setAttributeNS(null, "cx", 100);
    myCircle.setAttributeNS(null, "cy", 100);
    myCircle.setAttributeNS(null, "r", 50);
    myCircle.setAttributeNS(null, "fill", "black");
    myCircle.setAttributeNS(null, "stroke", "none");

    document.getElementById("mySVG").appendChild(myCircle);
}


