<?php

    include_once 'lab1connect.php';
    include_once 'user.php';


    $con = new DBconnector;
    if(isset($_POST['btn-login']))
    {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        //$user = new User ();
        $user = new User ($first_name='', $last_name='', $city_name='', $username, $password);


        $instance = $user->create();
        $instance->setPassword($password);
        $instance->setUsername($username);

        if($instance->isPasswordCorrect())
        {
            $instance->login();
            $con->closeDatabase();
            $instance->createUserSession();
        }else{
            $con->closeDatabase();
            header("Location:login.php");
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
                </tr>
            
            </table>
            </form>
            
        
        
        </body>

    </html>    