/**
 * Created by arumoy on 26/2/15.
 */
function toggleStatus(id_me) {
    console.log("Clicked");
    var ov = $("#"+id_me);
    ov.click(function () {
        if(ov.hasClass("on")) {
            console.log("on found in "+id_me);
            ov.removeClass("on");
            console.log("on removed from "+id_me);
            ov.addClass("off");
            console.log("off added to "+id_me);
        } else {
            console.log("off found in "+id_me);
            ov.removeClass("off");
            console.log("off removed from "+id_me);
            ov.addClass("on");
            console.log("on added to "+id_me);
        }
    })
}