<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>session</title>
  </head>
  <body>

<?php

session_start();

?>

<h3>this is a session<h3>

<?php

$_SESSION["favcolor"] = "yellow";
print_r($_SESSION)

?>

<hr>
  </body>
</html>