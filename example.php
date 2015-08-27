<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Example</title>
</head>

<body>
  <?php
  require "Client.php";
  $client = new PinnacleSports\Client("USERID","PASSWORD");
  ?>

  <h1>Pinnacle Sports API v1.0</h1>
  <h2>Test Post Methods</h2>
  <h3>Get Parlay Line</h3>
  <?php
  $str = file_get_contents("GetParlayLine-RequestExample.json");
  $param = json_encode(json_decode($str, true));
  echo $client->post("line/parlay", $param);
  ?>
  <hr>

  <h2>Test Get Methods</h2>
  <h3>Get Sports</h3>
  <?php
  echo $client->get("sports");
  ?>
  <hr>

  <h3>Get Leagues</h3>
  <?php
  $param = array("sportid" => "3");
  echo $client->get("leagues", $param);
  ?>
  <hr>

  <h3>Get Feed</h3>
  <?php
  $param = array("sportid" => "29", "leagueid" => "1728-1792");
  echo $client->get("feed", $param);
  ?>
  <hr>

  <h3>Get Fixtures</h3>
  <?php
  $param = array("sportid" => "29", "leagueids" => "1728,1792,1817");
  echo $client->get("fixtures", $param);
  ?>
  <hr>

  <h3>Get Odds</h3>
  <?php
  $param = array("sportid" => "29", "leagueids" => "1728,1792,1817");
  echo $client->get("odds", $param);
  ?>
  <hr>

  <h3>Get Currencies</h3>
  <?php
  echo $client->get("currencies");
  ?>
  <hr>

  <h3>Get Client Balance</h3>
  <?php
  echo $client->get("client/balance");
  ?>
  <hr>

  <h3>Get Line</h3>
  <?php
  $param = array("sportid" => "29", "leagueId" => "1728", "eventId" => "308195882", "betType" => "SPREAD", "oddsFormat" => "DECIMAL", "periodNumber" => "0", "team" => "TEAM1", "handicap" => "-1");
  echo $client->get("line", $param);
  ?>
  <hr>

  <h3>Get Bets</h3>
  <?php
  $param = array("betlist" => "settled", "fromDate" => "2013-06-01", "toDate" => "2013-06-05");
  echo $client->get("bets", $param);
  ?>
  <hr>

  <h3>Get Inrunning</h3>
  <?php
  echo $client->get("inrunning");
  ?>
  <hr>

  <h3>Get Translations</h3>
  <?php
  $param = array("cultureCodes" => "de-DE", "baseTexts" => "Football");
  echo $client->get("translations", $param);
  ?>
  <hr>

</body>

</html>
