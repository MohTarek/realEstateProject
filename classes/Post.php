<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post
 *
 * @author Mohamed
 */
class Post {
    private $postQueries;
    
    private $postID;
    private $ownerID;
    private $price ; 
    private $size ;
    private $address; 
    private $date ;
    private $postType ;
    
     //creater 
    //private $photo[]; 
    //private $video; 
     
    
    private $numOfRooms; 
    private $flatType;
    private $flatStatus;
    private $numOfFloors;
    
    private $companyPercentage;
    private $profit;
    
    private $counter; 
    
    
    public function __construct(  ){
        
        $this->postQueries= new PostQueries();
    }
    
    
    
    //------------------------------------------<<Setter & Getter>>-------------------------------------------------    
    public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
//------------------------------------------<<Fuctions>>--------------------------------------------------- 
    function deletePost($postID){
         $deletingPost =$this->Acc_queries->deletePost($postID);
        if($deletingPost){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    function addPost(){
        if($this->postQueries->addPost($ownerID , $price , $size , $address  , $date , $postType , $numOfFloors , $numOfRooms , $flatType , $flatStatus , $companyPercentage)){
            return TRUE;
        }
        else {
            return FALSE;
        }
        
    }
    
    function modifyPost($postID){
        if($this->postQueries->modifyPost($ownerID , $price , $size , $address  , $date , $postType , $numOfFloors , $numOfRooms , $flatType , $flatStatus , $companyPercentage)){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function searchPost($postID){
        
     return $this->postQueries->searchPost($postID) ;
   
     }
    
    public function listUserPosts($ownerID){
       return $this->postQueries->searchPost($ownerID) ;
    }
    
    public function searchPosts($address , $startSize , $endSize , $startPrice , $endPrice){
        return $this->postQueries->searchPost($address , $startSize , $endSize , $startPrice , $endPrice) ;
    }
}
