<?php
/**
 * Author : Lakshmi Sudha
 * Date   : 21-04-2018
 * Desc   : This is a controller file for userList Action 
 */
class userListAction extends baseAction{
  
  public function execute()
  {
    $userLib = autoload::loadLibrary('queryLib', 'user');
    $result = array();
	
	$result = $userLib->getUserList();
    
    $this->setResponse('SUCCESS');
    return $result;
  }  
}