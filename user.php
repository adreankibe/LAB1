<?php
include 'crud.php';
include 'authenticator.php';
include_once 'lab1connect.php';
class User implements Crud,Authenticator{
public $user_id;
public $first_name;
public  $last_name;
public $city_name;
public $username;
public $password;

    


    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    
    public function setCityName($city_name)
    {
        $this->city_name = $city_name;
    }

    public function getCityName()
    {
        return $this->city_name;
    }
   

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUserId($user_id)//setter
    {
        $this->user_id = $user_id;
    }

    public function getUserId()//getter
    {
        return $this->$user_id;
    }


    
     public function save($first_name, $last_name, $city_name, $username, $password)
        {
            $db = new DBconnector();
            $conn = $db->getConn();
            
            $res = mysqli_query($conn,"insert into user(first_name,last_name,user_city,username,password) VALUES('$first_name','$last_name','$city_name','$username','$password')");
            return $res;
        }
    


    public function readAll(){
        return null;
    }

    public function readUnique(){
        return null;
    }

    public function search(){
        return null;
    }

    public function update(){
        return null;
    }

    public function removeOne(){
        return null;
    }

    public function removeAll(){
        return null;
    }

    public function validateForm()
    {
        $fn = $this->first_name;
        $ln= $this->last_name;
        $city = $this->city_name;
        if($fn == "" || $ln == "" || $city == "" )
        {
            return false;
        }
            return true;
    }

    public function hashPassword(){
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);


    }
    public function isPasswordCorrect($username, $password)
        {
            $db = new DBconnector();
            $conn = $db->getConn();
            
            $res =  "SELECT id FROM user WHERE  username='$username' and  password='$password'";
            //$user_data = mysqli_fetch_array($result);
            $result = $conn->query($res);
            $user_data = mysqli_fetch_array($result);//row
            $count_row = $result->num_rows;
            if($count_row == 1)
            {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $user_data['id'];
                //header("Location:private_page.php");
                return true;
            }
            else{
                //header("Location:login.php");
                return false;
            }
        }

    public function createUserSession()
    {
       return $_SESSION['login'];
    }    
    

    public function getUser($user_id)
    {
        $db = new DBconnector();
        $conn = $db->getConn();
        $sql = "SELECT username FROM user WHERE id = '$user_id'";
        $result = $conn->query($sql);
        $user_data = mysqli_fetch_array($result);
        echo $user_data['username'];
    }
    public function logout()
    {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }

    public function createFormErrorSessions()
    {
        session_start();
        $_SESSION['form-errors'] = "all fields are required";
    }
}
?>