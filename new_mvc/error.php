<?php
// include_once ("./includes/serverHeader.php");

$status=$_SERVER['REDIRECT_STATUS'];
 
$codes=array(
      400 => array('400 Bad Request', 'The request cannot be fulfilled due to bad syntax.'),
      401 => array('401 Login Error', 'It appears that the password and/or user-name you entered was incorrect. Click <a href="index.php?action=login"> here </a> to login.'),
      404 => array('404 Missing', 'We\'re sorry, but the page you\'re looking for is missing.'),
      405 => array('405 Method Not Allowed', 'The method specified in the Request-Line is not allowed for the specified resource.'),
      408 => array('408 Request Timeout', 'Your browser failed to send a request in the time allowed by the server.'),
      414 => array('414 URL To Long', 'The URL you entered is longer than the maximum length.'),
      500 => array('500 Internal Server Error', 'The request was unsuccessful due to an unexpected condition encountered by the server.'),
      502 => array('502 Bad Gateway', 'The server received an invalid response from the upstream server while trying to fulfill the request.'),
      504 => array('504 Gateway Timeout', 'The upstream server failed to send a request in the time allowed by the server.'),
);

$errortitle=$codes[$status][0];
$message=$codes[$status][1];

if($errortitle==false){
       $errortitle="Bad request";
       $message="Oo- pss!..,Something went wrong.";
}
 
?>
<!doctype html> 
<html>
<head>
<title><?php echo("$errortitle");?></title>

</head>
<body>

    <div id="content">
        <h1><?php echo $errortitle; ?></h1>
        <p><?php echo $message; ?></p>
        
        <br>
        <?php //echo "Click <a href='index.php?action=login'> here </a> to login."?>
    </div>
<!-- Insert headers here. -->

</body>
</html>
<!-- Insert footers here. -->

  