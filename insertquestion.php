<?php 
session_start();
require_once('class.phpmailer.php');
	$con = mysqli_connect("localhost","username","password","dbname");
  $id = $_POST['id'];
  $a=1;
  $answers = $_POST['answers'];
  foreach($answers as $ans){
    $convert =addslashes($ans);
      $sql2 = "INSERT INTO `answersintension`(`id`, `userid`, `qid`, `answers`) VALUES ('','$id','$a','$convert')";
            $rs = mysqli_query($con,$sql2);
            $a++;
    }  
 // var_dump($id);

 $html = "";
 $query = "SELECT * FROM `qintension`";
  $re = mysqli_query($con,$query);
  while ($row = $re->fetch_assoc()) {
      $queston = $row['questions'];
      $qid = $row['id'];
      $html .= '<tr>
					<td style="width:100%; font-size:18px; ">
					<div style="padding: 10px 0px 5px 10px;font-size:18px; color:#000;font-family: Montserrat;font-weight: 600;">'.$queston.'</div>
					</td>
				</tr>';
	$query1 = "SELECT answers FROM `answersintension` WHERE userid = '$id' AND qid = '$qid'";
    $re1 = mysqli_query($con,$query1);
    
        $ans= $re1->fetch_assoc();
         $html .= '	<tr>					
					<td style="width:100%; font-size:16px; "><div style="font-size:16px; color:#000;font-family: Montserrat;padding: 0px 0px 20px 10px;">'.$ans['answers'].'</div></td>
				</tr>';
    }
  
  

  
    $mail = new PHPMailer(true); // the true param means it will throw exceptions on     errors, which we need to catch
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host = 'mail.arfeenkhan.com';  // Specify main and backup server
	$mail->Port = '26';
	$mail->SMTPAuth = 'true';                               // Enable SMTP authentication
	$mail->Username = 'xxxxxxxxxxxx';                            // SMTP username
	$mail->Password = 'xxxxxxxxxxxxxxxxxx';                           // SMTP password
	$mail->SMTPSecure = 'SSL/TLS';

	try 
	{
		$mail->SetFrom('Arfeenkhan@arfeenkhan.com', 'Arfeen Khan');
		$mail->AddAddress('ctfcoaches@gmail.com', '');
		//$mail->AddAddress($arr['Contact.Email'], $arr['Contact.FirstName']);
		$mail->AddAddress('harsh@arfeenkhan.com', '');
		//$mail->AddAddress('support@arfeenkhan.com', '');
	//	$mail->AddAddress('arfeenkhan@arfeenkhan.com', '');
		//$mail->AddAddress('onlinepayment@arfeenkhan.com', '');
            
		$mail->Subject = 'Coach To A Fortune  By Arfeen Khan';
		$mail->Body= '  
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if !mso]><!-- -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--<![endif]-->
	<title>Table</title>
<style type="text/css">
		html,body{
			min-width:260px;
			min-height:100%;
			padding:0;
			Margin:0 auto;
			background:#ffffff;
		}
		a img{
			border:none;
		}
		
		table,td{
			border-collapse:collapse;
			mso-table-lspace:0pt;
			mso-table-rspace:0pt;
		}
		
		
</style>
<!--[if !mso]><!-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,680,680i,800,800i,900,900i" rel="stylesheet">
	<!--<![endif]-->

</head>
 <body>
<!--[if mso]>
<table border="0" cellpadding="0" cellspacing="0" width="600" align="center" bgcolor="#ffffff" style="width:600px;"><tr><td>
<![endif]-->
<div style="Margin:0 auto; max-width:600px; min-width:260px; font:16px Trebuchet MS;background:#ffffff;">
	<div style="text-align:left; font-size:0; background:#ffffff;">
		<!--[if mso]>
		<table border="0" cellpadding="0" cellspacing="0" width="600" align="left" bgcolor="#ffffff" style="width:600px;"><tr><td style="width:100%; background:#ffffff;text-align:left">
		<![endif]-->
		<div style="display:inline-block; text-align:left; color:#112636; background:#ffffff; vertical-align:top; width:100%;">
		
			<table style="width:100%; border:2px dashed #000;">
				<tr>
					<th style="width:100%; border:2px dashed #000;font-size:22px; "><div style="padding:20px 0px;font-size:22px; color:#000;font-family: Montserrat;text-align:center;">Coach To A Fortune</div></th>
				</tr>
				
                '.$html.'
                
				
			</table>
		</div>
		<!--[if mso]>
		</td></tr></table>
		<![endif]-->
	</div>
</div>
		<!--[if mso]>
	</td></tr></table>
	<![endif]-->
</body>
</html>';
                              
                              $mail->IsHTML(true);
				$mail->Send();
			} 
			catch (phpmailerException $e) 
			{
				echo $e->errorMessage(); //Pretty error messages from PHPMailer
			} 
			catch (Exception $e) 
			{
				echo $e->getMessage(); //Boring error messages from anything else!
			}
  
    
             

?>

<script>
window.location.href = 'http://www.coachtofortune.com/intention/thankyou.html';
</script>
