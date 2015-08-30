<?php
/**
 * PHP Pinnacle Sports API Client, Ajax Call Example
 *
 * @author Wataru Oguchi @watarutwt
 * GitHub: https://github.com/wataruoguchi/PHP-PinnacleSports-API
 */

// For security
require_once "AvoidIllegalAccess.php";
// Get UserID and Password
require_once "Credentials.php";
// API Client
require_once "../Client.php";

$credentials = new Credentials();
$client = new PinnacleSports\Client($credentials->user, $credentials->pass);

// GET method
if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $keys = array_keys($_GET);
  if(isset($keys[0])) {
    // generate function name by first argument of $_GET
    $funcName = $keys[0];
    try {
      // Queue the request
      echo $client->$funcName($_GET["data"]);
      return;
    } catch (Exception $e) {
      $error = '{"error": "Function is not found."}';
      echo json_encode($error);
      return false;
    }
  }
}
// POST method
elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
  if(isset($_POST["operation"], $_POST["data"])) {
    // generate function name by first argument of $_POST
    $funcName = $_POST["operation"];
    try {
      // Queue the request
      echo $client->$funcName(json_encode($_POST["data"]));
      return;
    } catch (Exception $e) {
      $error = '{"error": "Function is not found."}';
      echo json_encode($error);
      return false;
    }
  }
}
$error = '{"error": "Illegal request."}';
echo json_encode($error);
return false;
?>
