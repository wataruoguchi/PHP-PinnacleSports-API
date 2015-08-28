<?php 
// Avoid direct access
if (array_shift(get_included_files()) === __FILE__) die('You cannot call directly.');

// Avoid access from different domain
$url = parse_url($_SERVER["HTTP_REFERER"]);
$host = $url['host'];
if ($host != $_SERVER["SERVER_NAME"]) {
  die('You cannot access.');
}
?>
