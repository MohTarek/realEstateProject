<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostQueries
 *
 * @author Mohamed
 */
class PostQueries {
    private $DB;
    
    public function __construct() {
        $this->DB=new Database();
        
    }
    
  //  --------------------------------------------------------------------------------------------
    
    function deletePost($PostID){
        $query = "DELETE FROM `account` WHERE $id = $PostID";
        $data= mysqli_query($this->DB->link, $query);
        return $data ;
    }
    
   function addPost($ownerID , $price , $size , $address  , $date , $postType , $numOfFloors , $numOfRooms , $flatType , $flatStatus , $companyPercentage){
        
        $data["ownerID"] = $ownerID;
        $data["counter"] = 0;
        $data["price"] = $price;
        $data["size"] =$size;
        $data["address"] =$address;
        $data["date"] =$date;
        $data["postType"] = $postType;
        $data["numOfFloors"] =$numOfFloors;
        $data["numOfRooms"] = $numOfRooms;
        $data["flatType"] = $flatType;

        $data["flatStstus"] = $flatStstus;
        $data["requestPostFlag"] =$companyPercentage;
        $data["profit"] = $price*$companyPercentage;

        $data["requestPostFlag"] = 1;
        $data["soldPostFlag"] = 0;
        
        
        $table = "Post";
        return $result=$this->DB->insert($table, $data);
    }
    
    
    
    function modifyPost($ownerID , $price , $size , $address  , $date , $postType , $numOfFloors , $numOfRooms , $flatType , $flatStatus , $postID ){
        
        
        $data["ownerID"] = $ownerID;
        $data["price"] = $price;
        $data["size"] =$size;
        $data["address"] =$address;
        $data["date"] =$date;
        $data["postType"] = $postType;
        $data["numOfFloors"] =$numOfFloors;
        $data["numOfRooms"] = $numOfRooms;
        $data["flatType"] = $flatType;
        $data["flatStstus"] = $flatStstus;
       
        $table = "Post";
        return $result=$this->DB->update($table, $data , "postID" , $postID );
        
        
    }
    
    function acceptPost($postID){
        
         $data["requestPostFlag"] = 0 ;
         $table = "Post";
         
         return $result=$this->DB->update($table, $data , "postID" , $postID );
    }
   
    
    function soldPost($postID){
        $data["soldPostFlag "] = 1 ;
        $table = "Post";
         
         return $result=$this->DB->update($table, $data , "postID" , $postID );
    }
    
    public function searchPost($postID){
        $query = "SELECT * FROM 'Post' where postID = $postID ";
        $data=$this->DB->get_row($query);
        return $data;
    }
    
    public function listUserPosts($ownerID){
        $query = "SELECT * FROM Post WHERE ownerID = $ownerID ";
        $result= mysqli_query($this->DB->link, $query);
        return $result;
    }
    
    public function searchPosts($address , $startSize , $endSize , $startPrice , $endPrice){
        $query="SELECT * FROM Post WHERE address = $address AND size BETWEEN $startSize AND $endSize AND price BETWEEN $startPrice AND $endPrice";
        $result= mysqli_query($this->DB->link, $query);
        return $result;
    }
}
