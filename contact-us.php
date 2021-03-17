<?php
session_start();
if (!empty($_POST["captcha"])) {

$captchaCode = $_SESSION["code"];
$enteredcaptchaCode = $_POST['captcha'];


if($enteredcaptchaCode == $captchaCode){ 



$help=$_POST['help'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$emailid=$_POST['emailid'];
$phone=$_POST['phone'];
$message=$_POST['message'];
$captcha=$_POST['captcha'];


$to      = 'writetous@infigo.in';
$subject = 'Infigoeye : Contact us';
$message = 
"<table style='border:1px solid #e5e5e5' align='center' width='500' cellspacing='0' cellpadding='5' border='0'>
<tbody>
<tr>
<td align='center' valign='middle' bgcolor='#efefef'>
<table align='center' width='470' cellspacing='0' cellpadding='3' border='0'>
<tbody>

<tr>
<td align='center' valign='middle'><h1>Infigoeye : Contact us</h1></td>
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
<td width='175' height='35' ><strong>Help</strong></td>
<td width='35' height='35'>:</td>
<td width='365' height='35'>".$help."</td>
</tr>

<tr style='color:#666; font-size:12px;'>
<td width='175' height='35' ><strong>First Name</strong></td>
<td width='35' height='35'>:</td>
<td width='365' height='35'>".$fname."</td>
</tr>

<tr style='color:#666; font-size:12px;'>
<td height='35'><strong>Last Name</strong></td>
<td height='35'>:</td>
<td height='35'>".$lname."</td>
</tr>

<tr style='color:#666; font-size:12px;'>
<td height='35'><strong>Email id</strong></td>
<td height='35'>:</td>
<td height='35'>".$emailid."</td>
</tr>

<tr style='color:#666; font-size:12px;'>
<td height='35'><strong>Phone</strong></td>
<td height='35'>:</td>
<td height='35'>".$phone."</a> </td>
</tr>  

<tr style='color:#666; font-size:12px;'>
<td height='35'><strong>Message </strong></td>
<td height='35'>:</td>
<td height='35'>".$message."</a> </td>
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
$headers = '';	
$headers .= 'MIME-Version: 1.0' . "\r\n";  			
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 			
$headers .= "From: noreply@infigoeye.com\r\n";
$headers .= "CC: \r\n";
$headers .= "Bcc: designer@galagali.biz\r\n";
mail($to, $subject, $message, $headers);
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

