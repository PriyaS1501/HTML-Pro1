<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

 function begnWith($str, $begnString) {
    // echo $str;
    // echo $begnString;
    //echo strcasecmp(substr($str, 0, $len), $begnString);
      $len = strlen($begnString);
      return strcasecmp(substr($str, 0, $len), $begnString) === 0;
   }
   
$str = file_get_contents('data.json');
$json = json_decode($str, true); 
$result=array();

$q = $_GET['q']; 

 foreach ($json as $key => $value) {
     if (isset($_GET['k'])) {
         if(!in_array($value['words'],$result))
        {
            array_push($result, $value['words']);
        }
        
     }else{
     if (begnWith( $value['words'],$q)) {
        if(!in_array($value['words'],$result))
        {
             array_push($result, $value['words']);
        }
     }
       
    }
 }

 echo json_encode($result); 

?>