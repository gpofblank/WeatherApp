<?php

/*
locationDropDown PHP function - displays a location dropdown menu anywhere in the DOM.
*/
function locationDropDown() {

  include_once("db_connection.php");

  try {

    // Construct the query for the db.
    $query = "SELECT DISTINCT location FROM weather_table";

    // Prepare the query.
    $stmt = $conn->prepare($query);

    // execute the query.
    $stmt->execute();
    $result = $stmt->fetchAll();

    echo "<div class=\"row my-3\">";
    echo "<div class=\"col-md-12 mx-auto\">";
    echo "<select class=\"form-control text-muted px-1 pb-2\" name=\"location\" id=\"locationDropDown\" onchange=\"showData(this.value)\" required>";
    echo "<option>Choose Location</option>";
    // Fill in - users.
    foreach ($result as $res) {
      echo "<option value=\"" . $res['location'] . "\">" . $res['location'] . "</option>";
    }
    echo "</select>";
    echo "</div>";
    echo "</div>";

    // close the connection to the DB;
    $stmt = null;
    $conn = null;
  }
  catch (PDOException $e) {
    print "Connection to DB failed!: " . $e->getMessage() . "<br/>";
    die();
  }
}

/*
humanReadableToday PHP function - takes an integer as an argument (from the date('w') function and displays it in a human readable fashion.
*/
function humanReadableToday(int $todayInt) {
    if ($todayInt === 0){
        return "Sun";
    } elseif ($todayInt === 1) {
        return "Mon";
    } elseif ($todayInt === 2) {
        return "Tue";
    } elseif ($todayInt === 3) {
        return "Wed";
    } elseif ($todayInt === 4) {
        return "Thu";
    } elseif ($todayInt === 5) {
        return "Fri";
    } elseif ($todayInt === 6) {
        return "Sat";
    } else {
        return "Error!";
    }
}

/*
showWeatherImage PHP function - takes a string as an argument and displays image based on the weather string.
*/
function showWeatherImage(string $todayWeather) {
    if ($todayWeather === "Rain") {
        return "img/rain.png";
    } elseif ($todayWeather === "Sun") {
        return "img/sun.png";
    } elseif ($todayWeather === "Snow") {
        return "img/snow.png";
    } else {
        return "Error!";
    }
}
?>
