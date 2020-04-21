<?php
include 'crud.php';
include_once 'lab1connect.php';
class user implements Crud{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;


    //initialize values
    function _construct($first_name, $last_name, $city_name)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->city_name = $city_name;
    }

    public function setUserId($user_id)//setter
    {
        $this->user_id = $user_id;
    }

    public function getUserId()//getter
    {
        return $this->$user_id;
    }

    
     public function save()
        {
            $first_name = $this->first_name;
            $last_name = $this->last_name;
            $city_name = $this->city_name;
            
            $res = "INSERT INTO user (first_name, last_name, city_name) VALUES ('$first_name', '$last_name', '$city_name')";
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

}
?>