<?php
include_once("./Components/SystemLog.php");
//This page is for Error Handling 
//This only Show if user encounter an error in the web application

// only turn this on if you want to debug the error page and see all the error codes
$isdebugON = false; // currently debugging is off

if ($isdebugON) {
  header("Refresh: 5 ; url=ErrorPage.php");
  // this array is for debugging purposes only to test all error code
  $Codes = array(400, 401, 402, 403, 404, 405, 406, 407, 408, 409, 410, 411, 412, 413, 414, 415, 416, 417, 418, 421, 422, 423, 424, 500, 501, 502, 503, 504, 505);
  //randomly select one of the error codes for each page load
  $error_codes = $Codes[array_rand($Codes)];
} else{
  // if debug is off, get the error code from the url
  if (isset($_GET['error']) ) {
    $error_codes = $_GET['error'];
  } else {
    $error_codes = 0;
  }
  $fix = 0;
}

if (isset($error_codes)) {
  $code = $error_codes;

  switch ($code) {
    case 400:
      $default_code = 400;
      $code_title = "Bad Request";
      $default_message = "The server cannot or will not process the request due to an apparent client error.";
      break;
    case 401:
      $default_code = 401;
      $code_title = "Unauthorized";
      $default_message = "The request has not been applied because it lacks valid authentication credentials for the target resource.";
      break;
    case 402:
      $default_code = 402;
      $code_title = "Payment Required";
      $default_message = "Reserved for future use.";
      break;
    case 403:
      $default_code = 403;
      $code_title = "Forbidden";
      $default_message = "You don't have permission to access this page.";
      break;
    case 404:
      $default_code = 404;
      $code_title = "Not Found";
      $default_message = "The webpage might be temporarily down or it may have moved permanently to a new web address.";
      break;
    case 405:
      $default_code = 405;
      $code_title = "Method Not Allowed";
      $default_message = "A request method is not supported for the requested resource.";
      break;
    case 406:
      $default_code = 406;
      $code_title = "Not Acceptable";
      $default_message = "The requested resource is capable of generating only content not acceptable according to the Accept headers sent in the request.";
      break;
    case 407:
      $default_code = 407;
      $code_title = "Proxy Authentication Required";
      $default_message = "The client must first authenticate itself with the proxy.";
      break;
    case 408:
      $default_code = 408;
      $code_title = "Request Timeout";
      $default_message = "The server timed out waiting for the request.";
      break;
    case 409:
      $default_code = 409;
      $code_title = "Conflict";
      $default_message = "Indicates that the request could not be processed because of conflict in the request, such as an edit conflict.";
      break;
    case 410:
      $default_code = 410;
      $code_title = "Gone";
      $default_message = "Indicates that the resource requested is no longer available and will not be available again. This should be used when a resource has been intentionally removed and the resource should be purged. Upon receiving a 410 status code, the client should not request the resource in the future. Clients such as search engines should remove the resource from their indices.";
      break;
    case 411:
      $default_code = 411;
      $code_title = "Length Required";
      $default_message = "The request did not specify the length of its content, which is required by the requested resource.";
      break;
    case 412:
      $default_code = 412;
      $code_title = "Precondition Failed";
      $default_message = "The server does not meet one of the preconditions that the requester put on the request.";
      break;
    case 413:
      $default_code = 413;
      $code_title = "Payload Too Large";
      $default_message = "The server cannot process the request because the request payload is too large.";
      break;
    case 414:
      $default_code = 414;
      $code_title = "URI Too Long";
      $default_message = "The URI requested by the client is longer than the server is willing to interpret.";
      break;
    case 415:
      $default_code = 415;
      $code_title = "Unsupported Media Type";
      $default_message = "The media format of the requested data is not supported by the server, so the server is rejecting the request.";
      break;
    case 416:
      $default_code = 416;
      $code_title = "Range Not Satisfiable";
      $default_message = "The range specified by the Range header field in the request can't be fulfilled; it's possible that the range is outside the size of the target URI's data.";
      break;
    case 417:
      $default_code = 417;
      $code_title = "Expectation Failed";
      $default_message = "This HTTP status is used as an Easter egg in some websites, including Google.com.";
      break;
    case 418:
      $default_code = 418;
      $code_title = "I'm a teapot";
      $default_message = "I'm a teapot";
      break;
    case 421:
      $default_code = 421;
      $code_title = "Misdirected Request";
      $default_message = "The request was directed at a server that is not able to produce a response (for example because a connection reuse).";
      break;
    case 422:
      $default_code = 422;
      $code_title = "Unprocessable Entity";
      $default_message = "The request was well-formed but was unable to be followed due to semantic errors.";
      break;
    case 423:
      $default_code = 423;
      $code_title = "Locked";
      $default_message = "The resource that is being accessed is locked.";
      break;
    case 424:
      $default_code = 424;
      $code_title = "Failed Dependency";
      $default_message = "The request failed due to failure of a previous request (e.g., a PROPPATCH).";
      break;
    case 425:
      $default_code = 425;
      $code_title = "Too Early";
      $default_message = "Indicates that the server is unwilling to risk processing a request that might be replayed.";
      break;
    case 500:
      $default_code = 500;
      $code_title = "Internal Server Error";
      $default_message = "The server encountered an internal error or misconfiguration and was unable to complete your request.";
      break;
    case 501:
      $default_code = 501;
      $code_title = "Not Implemented";
      $default_message = "The server either does not recognize the request method, or it lacks the ability to fulfil the request.";
      break;
    case 502:
      $default_code = 502;
      $code_title = "Bad Gateway";
      $default_message = "The server was acting as a gateway or proxy and received an invalid response from the upstream server.";
      break;
    case 503:
      $default_code = 503;
      $code_title = "Service Unavailable";
      $default_message = "The server is temporarily unable to service your request due to maintenance downtime or capacity problems. Please try again later.";
      break;
    case 504:
      $default_code = 504;
      $code_title = "Gateway Timeout";
      $default_message = "The server was acting as a gateway or proxy and did not receive a timely response from the upstream server.";
      break;
    case 505:
      $default_code = 505;
      $code_title = "HTTP Version Not Supported";
      $default_message = "The server does not support the HTTP protocol version used in the request.";
      break;
    
      //TCPDF ERROR
    case 1000:
      $default_code = 1000;
      $code_title = "TCPDF ERROR";
      $default_message = "TCPDF requires the Imagick or GD extension to handle PNG images with alpha channel.";
      $fix = 1;
      break;

    default:
      $default_code = 404;
      $code_title = "Page Not Found";
      $default_message = "The webpage might be temporarily down or it may have moved permanently to a new web address.";
      break;
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="./Style/ErrorStyle.css" />
  <link rel="shortcut icon" href="./Images/ErrorIcon.svg" type="image/x-icon">
  <title><?php echo $code_title; ?></title>
</head>

<body>
  <div class="container">
    <div>
      <svg width="380px" height="500px" viewBox="0 0 837 1045" version="1.1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
          <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z"
            id="Polygon-1" stroke="#007FB2" stroke-width="6" sketch:type="MSShapeGroup"></path>
          <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z"
            id="Polygon-2" stroke="#EF4A5B" stroke-width="6" sketch:type="MSShapeGroup"></path>
          <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z"
            id="Polygon-3" stroke="#795D9C" stroke-width="6" sketch:type="MSShapeGroup"></path>
          <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z"
            id="Polygon-4" stroke="#F2773F" stroke-width="6" sketch:type="MSShapeGroup"></path>
          <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z"
            id="Polygon-5" stroke="#36B455" stroke-width="6" sketch:type="MSShapeGroup"></path>
        </g>
      </svg>
    </div>
    <div>
      <div class="message-box">
        <?php logMessage("Error", $code_title, $default_message); ?>
        <h1>
          <?php echo $default_code; ?>
        </h1>
        <p>
          <?php echo $default_message; ?>
        </p>
        <div class="buttons-con">
          <div class="action-link-wrap">
            <!--this will go to the previous page-->
            <a onclick="history.back(-1)" class="link-button link-back-button">Go Back</a>
            <?php 
              if ($fix == 1) { 
                echo '<a href="./Components/TCPDF/tcpdf_Fix.html" class="link-button">Here how to fix it</a>';
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>