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
  echo $client->getParlayLine($param);
  ?>
  <hr>

  <h2>Test Get Methods</h2>
  <h3>Get Sports</h3>
  <?php
  echo $client->getSports();
  ?>
  <hr>

  <h3>Get Leagues</h3>
  <?php
  $param = array("sportid" => "3");
  echo $client->getLeagues($param);
  ?>
  <hr>

  <h3>Get Feed</h3>
  <?php
  $param = array("sportid" => "29", "leagueid" => "1728-1792");
  echo $client->getFeed($param);
  ?>
  <hr>

  <h3>Get Fixtures</h3>
  <?php
  $param = array("sportid" => "29", "leagueids" => "1728,1792,1817");
  echo $client->getFixtures($param);
  ?>
  <hr>

  <h3>Get Odds</h3>
  <?php
  $param = array("sportid" => "29", "leagueids" => "1728,1792,1817");
  echo $client->getOdds($param);
  ?>
  <hr>

  <h3>Get Currencies</h3>
  <?php
  echo $client->getCurrencies();
  ?>
  <hr>

  <h3>Get Client Balance</h3>
  <?php
  echo $client->getClientBalance();
  ?>
  <hr>

  <h3>Get Line</h3>
  <?php
  $param = array("sportid" => "29", "leagueId" => "1728", "eventId" => "308195882", "betType" => "SPREAD", "oddsFormat" => "DECIMAL", "periodNumber" => "0", "team" => "TEAM1", "handicap" => "-1");
  echo $client->getLine($param);
  ?>
  <hr>

  <h3>Get Bets</h3>
  <?php
  $param = array("betlist" => "settled", "fromDate" => "2013-06-01", "toDate" => "2013-06-05");
  echo $client->getBets($param);
  ?>
  <hr>

  <h3>Get Inrunning</h3>
  <?php
  echo $client->getInrunning();
  ?>
  <hr>

  <h3>Get Translations</h3>
  <?php
  $param = array("cultureCodes" => "de-DE", "baseTexts" => "Football");
  echo $client->getTranslations($param);
  ?>
  <hr>

</body>

</html>
