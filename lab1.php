<?php
    include_once 'lab1connect.php';
    include_once 'user.php';

    $con = new DBconnector;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $city_name = $_REQUEST['city_name'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $user = new User ($first_name, $last_name, $city_name, $username, $password);


        if(!$user->validateForm())
        {
            $user->createFormErrorSessions();
            header("Refresh:0");
            die();
        }

        $res = $user->save();
        
        if($res)
        {
            echo "successful";
        }else{
            echo "error";
        }
        $con->closeDatabase();

    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Title goes</title>
<script type="text/javascript" src="validate.js"></script>
<link rel="stylesheet" type="text/css" href="validate.css">
</head>
<body>

    <form method="POST" name="user_details" id="user_details" onsubmit="return validateForm()" action="<?=$_SERVER['PHP_SELF']?>">
        <table align="center">
            <tr>
                <td>
                    <div id="form-errors">
                    <?php
                         session_start();
                         if(!empty($_SESSION['form_errors']))
                         {
                             echo " " . $_SESSION['form_errors'];
                             unset($_SESSION['form_errors']);
                         }
                    ?>
                </td>
            </tr>
            <tr>
                <td><input type="text" name="first_name"  required placeholder="First Name"/></td>
            </tr>

            <tr>
                <td><input type="text" name="last_name"  required placeholder="Last Name"/></td>
            </tr>
            
            <tr>
                <td><input type="text" name="city_name"  required placeholder="City"/></td>
            </tr>
            
            <tr>
                <td><input type="text" name="username" placeholder="Username"/></td>
                
            </tr>

            <tr>
                <td><input type="password" name="password" placeholder="Password"/></td>
                
            </tr>

            <tr>
                <td>
                    <input type="submit">
                </td>
            </tr>


            <tr>
                <td><a href="login.php">login</a></td>
                
            </tr>

        </table>
    </form>
</body>
</html>

