/**
 * Created by arumoy on 26/2/15.
 */
function toggleStatus(id_me) {
    var transitCall = new XMLHttpRequest();

    transitCall.onreadystatechange = function() {
        if(transitCall.readyState == 3) {
            //var pv0 = window.getComputedStyle(document.getElementById(id_me)).getPropertyValue('background');
            document.getElementById(id_me).style.background = 'orange';
        }

        if(transitCall.readyState == 1) {
            document.getElementById(id_me).style.background = 'lightblue';
        }

        if(transitCall.readyState == 2) {
            document.getElementById(id_me).style.background = 'blue';
        }

        if(transitCall.readyState == 4 && transitCall.status == 200) {
            if(transitCall.responseText == "on") {
                document.getElementById(id_me).style.background = 'green';
            } else if (transitCall.responseText == "off") {
                document.getElementById(id_me).style.background = 'red';
            } else {
                document.getElementById(id_me).style.background = 'grey';
            }
        }
    }
    var idString = "?id="+id_me;
    transitCall.open("GET","toggler.php"+idString,true);
    transitCall.send(null);
}


function blobReload(id_me) {
    console.log("sdfs");
    setInterval(function() {
        jQuery.ajax({
            url:"refresher.php?id="+id_me, type:"GET", success: function(data) {
                if(data == "on") {
                    document.getElementById(id_me).style.background = 'green';
                } else if (data == "off") {
                    document.getElementById(id_me).style.background = 'red';
                } else {
                    document.getElementById(id_me).style.background = 'grey';
                }
            }
        });
    }, 1000);
}