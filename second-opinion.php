<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';

if (!empty($_POST["captcha"])) {

$captchaCode = $_SESSION["code"];
$enteredcaptchaCode = $_POST['captcha'];


if($enteredcaptchaCode == $captchaCode){ 
    $fileNames = array();
    $max_allowed_file_size = 10000; // size in KB
    $totalSize = 0;
    $allowed_extensions = array("doc", "docx", "pdf","jpg","gif","png","jpeg");
    
    $total = count($_FILES['upfile']['name']);
    for( $i=0 ; $i < $total ; $i++ ) {
        /*
        //check file size
        $size_of_uploaded_file = $_FILES["upfile"]["size"][$i]/1024;//size in KBs
        
       
        $totalSize = $totalSize + $size_of_uploaded_file;
        

        if( $totalSize > $max_allowed_file_size){
             echo '<script type="text/javascript">window.alert(" Size of file should be less than 10 MB.");history.back();</script>';
              //$errors .= "\n Size of file should be less than $max_allowed_file_size";
              exit();
        }
        
        
        
      */
       $name_of_uploaded_file = $_FILES['upfile']['name'][$i];
       
      //get the file extension of the file
       $type_of_uploaded_file = substr($name_of_uploaded_file,   strrpos($name_of_uploaded_file, '.') + 1);
       
       $allowed_ext = false;
       
        for($j=0; $j<sizeof($allowed_extensions); $j++)
        {
          if(strcasecmp($allowed_extensions[$j],$type_of_uploaded_file) == 0)
          {
            $allowed_ext = true;
          }
        }
       
       
       if(!$allowed_ext)
        {
         echo '<script type="text/javascript">window.alert("The uploaded file is not supported file type-'.$name_of_uploaded_file.'");history.back();</script>';	
         exit();
        }
            
      //Get the temp file path
      $tmpFilePath = $_FILES['upfile']['tmp_name'][$i];
      if ($tmpFilePath != ""){
        //Setup our new file path
        $newFilePath = "uploads/" . $_FILES['upfile']['name'][$i];
    
        //Upload the file into the temp dir
        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
           array_push($fileNames,$newFilePath);
        }
      }
    }
    
    $total = count($_FILES['fileselect']['name']);
    for( $i=0 ; $i < $total ; $i++ ) {

      //Get the temp file path
      $tmpFilePath = $_FILES['fileselect']['tmp_name'][$i];
    
      
      if ($tmpFilePath != ""){
        //Setup our new file path
        $newFilePath = "uploads/" . $_FILES['fileselect']['name'][$i];
    
        //Upload the file into the temp dir
        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
           array_push($fileNames,$newFilePath);
        }
      }
    }
/*
//Get the uploaded file information
$name_of_uploaded_file =
    basename($_FILES['upfile']['name']);

//get the file extension of the file
$type_of_uploaded_file =
    substr($name_of_uploaded_file,
    strrpos($name_of_uploaded_file, '.') + 1);

$size_of_uploaded_file =
    $_FILES["upfile"]["size"]/1024;//size in KBs

//Settings

$allowed_extensions = array("doc", "docx", "pdf");

//Validations
if($size_of_uploaded_file > $max_allowed_file_size )
{
    echo '<script type="text/javascript">window.alert(" Size of file should be less than 2 MB.");history.back();</script>';
  //$errors .= "\n Size of file should be less than $max_allowed_file_size";
  exit();
}

//------ Validate the file extension -----
$allowed_ext = false;
for($i=0; $i<sizeof($allowed_extensions); $i++)
{
  if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0)
  {
    $allowed_ext = true;
  }
}

if(!$allowed_ext)
{
 // $errors .= "\n The uploaded file is not supported file type. ".
 // " Only the following file types are supported: ".implode(',',$allowed_extensions);
 echo '<script type="text/javascript">window.alert("The uploaded file is not supported file type-'.$name_of_uploaded_file.'");history.back();</script>';	
 exit();
}

$upload_folder = 'uploads/';
$path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
$tmp_path = $_FILES["uploaded_file"]["tmp_name"];

if(is_uploaded_file($tmp_path))
{
  if(!copy($tmp_path,$path_of_uploaded_file))
  {
   // $errors .= '\n error while copying the uploaded file';
     echo '<script type="text/javascript">window.alert("Error occured , please try again.");history.back();</script>';	
     exit();
  }
}
*/

$name=$_POST['name'];
$age=$_POST['age'];		
$gender=$_POST['gender'];
$emailid=$_POST['emailid'];	
$contact=$_POST['contact'];
$address=$_POST['address'];
$query=$_POST['query'];	
$captcha=$_POST['captcha'];

//$to      = 'mbhairav@gmail.com';
$to      = 'appointments@infigo.in';
$subject = 'Infigoeye : Second Opinion';
$message = 
"<table style='border:1px solid #e5e5e5' align='center' width='500' cellspacing='0' cellpadding='5' border='0'>
<tbody>
<tr>
<td align='center' valign='middle' bgcolor='#efefef'>
<table align='center' width='470' cellspacing='0' cellpadding='3' border='0'>
<tbody>

<tr>
<td align='center' valign='middle'><h1>Infigoeye :  Second Opinion</h1></td>
</tr>

<tr>
<td>
<table width='470' cellspacing='0' cellpadding='5' border='1'>
<tbody> 


<tr>
<td bgcolor='#ffffff'>
<table style='color:#949494' align='center' width='430' cellspacing='0' cellpadding='0' border='0'>
<tbody>
<tr>
<td style='color:#464646;font-weight:bold;font-size:13px;' colspan='3' height='35'>The enquiry details are below:</td>
</tr>

<tr style='color:#666; font-size:12px;'>
<td width='175' height='35' ><strong>Patient Name</strong></td>
<td width='35' height='35'>:</td>
<td width='365' height='35'>".$name."</td>
</tr>


<tr style='color:#666; font-size:12px;'>
<td height='35'><strong>Age</strong></td>
<td height='35'>:</td>
<td height='35'>".$age."</a> </td>
</tr>

<tr style='color:#666; font-size:12px;'>
<td height='35'><strong>Gender</strong></td>
<td height='35'>:</td>
<td height='35'>".$gender."</td>
</tr>

<tr style='color:#666; font-size:12px;'>
<td height='35'><strong>Email id</strong></td>
<td height='35'>:</td>
<td height='35'>".$emailid."</a> </td>
</tr>  

<tr style='color:#666; font-size:12px;'>
<td height='35'><strong>Contact</strong></td>
<td height='35'>:</td>
<td height='35'>".$contact."</a> </td>
</tr> 


<tr style='color:#666; font-size:12px;'>
<td height='35'><strong>Address</strong></td>
<td height='35'>:</td>
<td height='35'>".$address."</a> </td>
</tr> 


<tr style='color:#666; font-size:12px;'>
<td height='35'><strong>Query</strong></td>
<td height='35'>:</td>
<td height='35'>".$query."</a> </td>
</tr> 

</tbody>
</table>
</td>
</tr>
<tr>
<td style='color:#464646;font-size:15px;line-height:18px;font-family:'Century Gothic'' align='center' bgcolor='#f7f7f7'>We hope that this Enquiry will help your <strong style='color:#177dbd'>Business Grow</strong></td></tr>
<tr><td style='color:#464646;font-size:18px;line-height:28px;font-family:'Century Gothic' align='center' height='70' bgcolor='#f7f7f7'>
<strong style='color:#177dbd'> Always Taking Sustained Efforts Towards Your Business Development</strong></td></tr> </tbody></table></td>
</tr>

</tbody>
</table>
</td>
</tr>
<tr>
<td style='font-size:10px;color:rgb(153,153,153)' align='center' valign='middle' height='35'>Website designed and Developed By Galagali Multimedia </td>
</tr>
</tbody></table>";
/*
$headers = '';	
$headers .= 'MIME-Version: 1.0' . "\r\n";  			
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 			
$headers .= "From: noreply@infigoeye.com\r\n";
$headers .= "CC: \r\n";
$headers .= "Bcc: designer@galagali.biz\r\n";*/
//mail($to, $subject, $message, $headers);

$mail = new PHPMailer(true);
$mail->isHTML(true);   
//$mail->IsSMTP(); // enable SMTP
$mail->setFrom('noreply@infigoeye.com');
$mail->Subject   = $subject;
$mail->Body      = $message;
$mail->AddAddress($to);
$mail->AddBCC("designer@galagali.biz");
//$mail->AddBCC("mbhairav@gmail.com");
foreach($fileNames as $item) {
    $mail->addAttachment($item); 
}
 $mail->send();
echo '<script type="text/javascript">  window.alert("Thank You For Contacting Us.");</script>';
echo '<script type="text/javascript">window.location = "index.html"</script>';
}

else{
echo '<script type="text/javascript">window.alert("Captcha code not matched, please try again.");history.back();</script>';	
}
}
else
{
echo '<script type="text/javascript">  window.alert("Please Fill a Form."); history.back();</script>';
exit;}
?>

