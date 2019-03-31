<?php

session_start();

if($_POST["user"] != "" && $_POST["pass"]!="" ){
  
  if($_POST["user"] == "rajatSvN" && $_POST["pass"] == "hackNSUT" ){
  	$_SESSION['user_id'] = 1 ;
    echo "1";
    
  
  }else{
  
    // error
  if($_POST["user"] != "rajatSvN"){
  
    echo "You entered wrong username.<br>";
  
  }
    
    if($_POST["pass"] != "hackNSUT"){
    
      echo "You entered wrong password.<br>";
    
    }
  
  
  }
  
}else{


 echo "Error logging you in , Please try after some time!";


}


?>