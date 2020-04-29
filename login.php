<?php
session_start();
    include_once 'lab1connect.php';
    include_once 'user.php';

    $user = new User();
    $conn = new DBconnector;
    if(isset($_POST['btn-login']))
    {
       
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = $user->isPasswordCorrect($username, $password);
        if($login)
        {
            header("location:private_page.php");
        }else{
            echo "error could not log in";
        }
       

        
       
    }
    ?>

    <html>
        <head>
            <title>login</title>
           
            <link rel="stylesheet" type="text/css" href="validate.css">
        </head>
        <body>
           
        <form method="POST" name="login" id="login" action="<?=$_SERVER['PHP_SELF']?>">
            <table>
                <tr>
                    <td><input type="text" name="username" placeholder="Username" required/></td>
                
                </tr>

                <tr>
                    <td><input type="password" name="password" placeholder="Password" required/></td>
                
                </tr>

                <tr> 
                    <td><button type="submit" name="btn-login"><strong>LOGIN</strong></td>
                    <a href="lab1.php">register</a>
                </tr>
            
            </table>
            </form>
            
        
        
        </body>

    </html>    