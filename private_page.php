<?php


session_start();
if(!isset($_SESSION['username']))
{
    header("Location:login.php");
}

?>

<html>
    <head>
    <script type="text/javascript" src="validate.js"></script>
    <link rel="stylesheet" type="text/css" href="validate.css">

    </head>

    <body>
        <p>this is a private page</p>
        <p><a href="logout.php">logout</a></p>
    </body>
</html>