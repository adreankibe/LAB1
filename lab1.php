<?php
    include_once 'lab1connect.php';
    include_once 'user.php';

    $con = new DBconnector;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $city_name = $_REQUEST['city_name'];




        $user = new User ($first_name, $last_name, $city_name);
        $res = $user->save();
        
        if($res)
        {
            echo "successful";
        }else{
            echo "error";
        }

    }

?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Title goes</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table align="center">
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
                <td>
                    <input type="submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

