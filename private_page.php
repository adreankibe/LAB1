<?php


session_start();
include_once 'user.php';
$user = new User();
$id = $_SESSION['id'];
if(!$user->createUserSession())
{
    header("location:login.php");
}
if (isset($_GET['q']))
{
    $user->logout();
    header("location:login.php");
}
?>

<html>
    <head>
    <script type="text/javascript" src="validate.js"></script>
    <link rel="stylesheet" type="text/css" href="validate.css">

    </head>

    <body>
    <h1>Hello<br><?php $user->getUser($id);?></h1>
        <p>this is a private page</p>
        
        <div id="header"><a href="private_page.php?q=logout">LOGOUT</a></div>

    </body>
</html>