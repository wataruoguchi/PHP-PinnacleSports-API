# PHP PinnacleSports API
A PHP client to use [the Pinnacle Sports API](http://www.pinnaclesports.com/en/api/manual)

## Usage
Please take a look `example.php`
```PHP
$client = new PinnacleSports\Client("USERID","PASSWORD");
```
Just change the `USERID` and `PASSWORD` to yours, then it should work.

* The Request Format: JSON
* The Response Format: XML or JSON depends on API

#### Resource
```
/
  Client.php
    - The PHP client
  example.php
    - Example how to use the client
```

### Ajax example
#### What's that?
It's an example how to use the PHP client through Ajax.

#### Resource
```
AjaxExample/
  index.html
    - Example HTML
  js/jquery.pinnacleSports.js
    - jQuery Plugin
    - It's used in the HTML
  AjaxCall.php
    - It's called by Javascript Ajax GET/POST
    - It calls Client.php
  Credentials.php
    - You need to make it
    - It just has two public variables ($user and $pass)
  AvoidIllegalAccess.php
    - Just made it quickly.  *Test is needed
```

#### happy coding :)
