<?php
session_start();

include_once('db_connection.php');
include_once('functions.php');

/*
Reads the GET request initiated from the Ajax call and builds the Data VIEW.
*/
try {

  // get the query from the get request.
  $q = $_GET['q'];

  // Construct the query for the db.
  $query = "SELECT * FROM weather_table WHERE location=:location";

  // Prepare the query.
  $stmt = $conn->prepare($query);

  // Bind the location.
  $stmt->bindValue(':location', $q, PDO::PARAM_STR);

  // Execute the query.
  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result) {

    // Set vars.
    $location = $result[0]['location'];
    $today = date('w');
    $weatherToday = $result[$today]['weather'];
    $maxTempToday = $result[$today]['temp_max'];
    $minTempToday = $result[$today]['temp_min'];
    $precipitation = $result[$today]['precipitation'];
    $humidity = $result[$today]['humidity'];
    $wind = $result[$today]['wind'];

    // Display data (make the view).
    echo "
<div class=\"container rounded-top bg-light\">
    <div class=\"row pb-5\">
        <div class=\"col text-left ml-2\">
        <h2 class=\"pt-5 my-1\">$location</h2>
        <p class=\"my-1\">" . humanReadableToday($today) . "</p>
        <p class=\"my-1\">$weatherToday</p>
            <div class=\"clearfix\">
            <img src=\"" . showWeatherImage($weatherToday) . "\" class=\"float-left d-inline\" alt=\"weather today\" height=\"50\" width=\"50\">
            <h2 class=\"my-1 d-inline\"><b>$maxTempToday</b></h2>
            <h2 class=\"d-inline\"><sup><b>&#176C</b>|&#176F<sup></h2>
        </div>
        </div>

        <div class=\"col text-left pt-3\">
                    <button type=\"button\" class=\"btn btn-outline-dark float-right\" onclick=\"makeFavourite(this.value)\" value=\"" . $q . "\">Make Favourite</button>
        <p class=\"pt-5 my-1\">Precipitation: $precipitation</p>
        <p class=\"my-1\">Humidity: $humidity</p>
        <p class=\"my-1\">Wind: $wind</p>
        </div>

    </div>
</div>";

    // loop through all of the days and print the 7-day forecast in a card-footer style.
echo "
<div class=\"card-footer bg-light\">
              <div class=\"row py-2\">";

              for ($i=0; $i < 8 ; $i++) {
                  if ($today == 7) {
                      $today = 0;
                  } 
                    echo "<div class=\"col\">
                      <div class=\"weather-day vertical-align\">
                        <div class=\"vertical-align-middle font-size-16\">
                          <div class=\"mb-10\">" . $result[$today]['week_day'] . "</div>
                          <img src=\"" . showWeatherImage($result[$today]['weather']) . "\" alt=\"weather today\" height=\"50\" width=\"50\">
                          <p>" . $result[$today]['temp_max'] . "°" . " " . $result[$today]['temp_min'] . "°
                          </p>
                        </div>
                      </div>
                    </div>
                    ";
                    $today++;
              }
echo "
                </div>
            </div>";

  // close the connection to the DB;
  $stmt = null;
  $conn = null;

    }
}
catch (PDOException $e) {
  print "Connection to DB failed!: " . $e->getMessage() . "<br/>";
  die();
}
?>
