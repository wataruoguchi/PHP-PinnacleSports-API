<?php
namespace PinnacleSports;

/**
 * PHP Pinnacle Sports API Client
 *
 * @author Wataru Oguchi @watarutwt
 * GitHub: https://github.com/wataruoguchi/PHP-PinnacleSports-API
 */
class Client
{
  /**
   * Pinnacle Sports API Base url
   */
  const BASE_URL = "https://api.pinnaclesports.com/v1/";

  /**
   * @var string or null
   */
  private $credentials;

  /**
   * Constructor
   * @param string $userid
   * @param string $password
   */
  public function __construct($userid, $pass = null) {
    // Credentials: <Base64 value of UTF-8 encoded “username:password”>
    $this->credentials = base64_encode($userid . ":" . $pass);
  }

  /**
   * Determine JSON format
   * @param string $string
   */
  private function isJson($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
  }

  /**
   * Convert XML format to JSON format
   * @param string $arg
   */
  private function returnJsonFormat($arg) {
    // If the argument is not JSON, converts it to JSON
    if ($this->isJson($arg)) {
      // JSON
      $ret = $arg;
    } else {
      // XML -> JSON
      $xmlDocument = simplexml_load_string($arg);
      $ret = json_encode($xmlDocument);
    }
    return $ret;
  }

  /**
   * Generate HTTP header
   */
  private function getHTTPHeader() {
    // Build the header
    $header[] = "Content-type: application/json";
    $header[] = "Authorization: Basic " . $this->credentials;
    return $header;
  }

  /**
   * Create API query and execute a GET/POST request
   * @param string $httpMethod GET/POST
   * @param string $endpoint
   * @param string $options
   */
  private function apiCall($httpMethod, $endpoint, $options) {
    // Create URL
    $api_url = self::BASE_URL . $endpoint;
    // POST method or GET method
    if(strtolower($httpMethod) === "post") {
      $jsonOptions = $this->returnJsonFormat($options);
    } else {
      if(count($options) > 0) {
        $api_url .= "?" . http_build_query($options);
      }
    }

    // Set up a CURL channel.
    $httpChannel = curl_init();

    // Prime the channel
    curl_setopt($httpChannel, CURLOPT_URL, $api_url);
    curl_setopt($httpChannel, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($httpChannel, CURLOPT_HTTPHEADER, $this->getHTTPHeader());
    // Unless you have all the CA certificates installed in your trusted root authority, this should be left as false.
    curl_setopt($httpChannel, CURLOPT_SSL_VERIFYPEER, false);
    // POST method
    if(strtolower($httpMethod) === "post") {
      curl_setopt($httpChannel, CURLOPT_POST, true);
      curl_setopt($httpChannel, CURLOPT_POSTFIELDS, $jsonOptions);
    }
    // This fetches the initial feed result. Next we will fetch the update using the fdTime value and the last URL parameter
    $response = curl_exec($httpChannel);
    curl_close($httpChannel);

    // Return JSON
    return $this->returnJsonFormat($response);
  }

  /**
   * Call GET request
   * @param string $endpoint
   * @param string $options
   */
  public function get($endpoint, $options = null) {
    return $this->apiCall("get", $endpoint, $options);
  }

  /**
   * Call POST request
   * @param string $endpoint
   * @param string $options
   */
  public function post($endpoint, $options = null) {
    return $this->apiCall("post", $endpoint, $options);
  }
}
?>
