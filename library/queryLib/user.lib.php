<?php
class user{
  //Singleton
  protected static $objInstance;

  public static function get(){
    if(!isset(self::$objInstance)){
      $class=__CLASS__;
      self::$objInstance=new $class;
    }
    return self::$objInstance;
  }
  
  public function getUserList($options=array())
  {
    $sql = "SELECT *
            FROM user";
    
    $result = database::doSelect($sql);
    return $result;
  }
  
  public function getUserDetail($userId, $options=array())
  {
    $sql = "SELECT *
            FROM user
            WHERE user_id=".$userId;
    
    $result = database::doSelectOne($sql);
    return $result;
  }
  
  public function insertUser($options=array())
  {
    $sql = "INSERT INTO user SET "; 
    foreach($options as $key=>$value){
      $sql .= $key."='".$value."', ";
    }    
    $sql = rtrim($sql, ", ");
	  
    $result = database::doInsert($sql);
    return $result;
  }
  
  public function updateUser($userId, $options=array())
  {
    $sql = "UPDATE user SET "; 
    foreach($options as $key=>$value){
      $sql .= $key."='".$value."', ";
    }    
    $sql = rtrim($sql, ", ");
    $sql .= "WHERE user_id =".$userId;
	  
    $result = database::doUpdate($sql);
    return $result;
  }
  
  public function deleteUser($userId, $options=array())
  {
    $sql = "DELETE FROM user
            WHERE user_id = ".$userId; 
    
	  $result = database::doDelete($sql);
    return $result;
  }
}