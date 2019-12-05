<?php 
session_start();

/*
Reads the GET request initiated from the Ajax call and builds the Favourites VIEW.
*/

 // Get the query/loc from the get request and store it to a session array if not there already.
 
 // Set Vars.
  $q = $_GET['q'];
  
  // If Favourites Array is empty, declare it.
  if (empty($_SESSION['FavouritesArray'])){
      $_SESSION['FavouritesArray'] = [];
  }

  // If Fav. Location is not in the Session Array, push it and display the menu item "Favourites". Else, just display what's already in the array.
    if (!in_array($q, $_SESSION['FavouritesArray'])){
        
        array_push($_SESSION['FavouritesArray'], $q);
        
          echo"
        <a class=\"nav-link dropdown-toggle rounded px-1 py-1 my-1 ml-1\" id=\"dropdown04\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"Favourites\">Favourites</a>
        <div class=\"dropdown-menu\" id= \"dropdown-menu-fix\" aria-labelledby=\"dropdown04\">";
            
            for ($i=0; $i < sizeof($_SESSION['FavouritesArray']); $i++) {
          echo "<option class=\"dropdown-item\" value=\"" . $_SESSION['FavouritesArray'][$i] . "\" onclick=\"showData(this.value)\">" . $_SESSION['FavouritesArray'][$i] . "</option>";
         }
         
        echo "</div>";
        }
        
        else {
            
            echo"
        <a class=\"nav-link dropdown-toggle rounded px-1 py-1 my-1 ml-1\" id=\"dropdown04\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"Favourites\">Favourites</a>
        <div class=\"dropdown-menu\" id= \"dropdown-menu-fix\" aria-labelledby=\"dropdown04\">";
            
            for ($i=0; $i < sizeof($_SESSION['FavouritesArray']); $i++) {
          echo "<option class=\"dropdown-item\" value=\"" . $_SESSION['FavouritesArray'][$i] . "\" onclick=\"showData(this.value)\">" . $_SESSION['FavouritesArray'][$i] . "</option>";
         }
         
        echo "</div>";
    }
?>