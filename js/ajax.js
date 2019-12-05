/*
showData AJAX function - takes the location that was picked by the user as an argument and initiates a GET query over to data.php. Returns the contents of data.php?q=$q to div with ID "responsecontainer". 
*/
function showData(loc) {
  // var definitions for welcome messages.
    var c = document.getElementById("container");
    var rc = document.getElementById("responsecontainer");
    var w1 = document.getElementById("welcome-message1");
    var w2 = document.getElementById("welcome-message2");

    if (loc == "") {
        document.getElementById("responsecontainer").innerHTML = "";
        return;
    } else if (loc === "Choose Location") {
      // add welcome messages and remove resp. container if "Choose Location" was selected from the dropdown menu.
        rc.classList.add('d-none');
        w1.classList.remove('d-none');
        w2.classList.remove('d-none');
        
    } else {
      // remove welcome messages, add resp. cont. and load the app.
        rc.classList.remove('d-none');
        w1.classList.add('d-none');
        w2.classList.add('d-none');

        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("responsecontainer").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","data.php?q="+loc,true);
        xmlhttp.send();
    }
}

/*
makeFavourite AJAX function - takes the "favourite" location that was picked by the user as an argument and initiates a GET query over to favourites.php. Returns the contents of favourites.php?q=$q to div with ID "responsecontainer". 
*/
function makeFavourite(favLoc) {
    if (favLoc == "") {
        document.getElementById("Favourites").innerHTML = "";
        return;
    } else {
        
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
         xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Favourites").innerHTML = this.responseText;
            }

        };
        
        xmlhttp.open("GET","favourites.php?q="+favLoc,true);
        xmlhttp.send();
    }
}
