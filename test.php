<?php
include('smtp/PHPMailerAutoload.php');
$name='cust_name'; 
                $comp_name='comp_name'; 
                $email='cust_email';
                $mobile='cust_mobile';
                $website='website';
                $bdate='bdate';
        
                $time='time';
                $remarks='remarks';
        
        
                $added_on=date('Y-m-d h:i:s');
    

                $date=date_create(date("Y-m-d"));
                $submit_date = date_format($date,"jS-M-Y ");
            
            
            
            // Mail
            
            $to_email = 'basant.mallick@digiclawmedia.com'; 
     
 
            $Subject = "Free Consultation Enquiry - " .$name; 
         
            $htmlContent = ' 
                        <!doctype html>
                        <html>
                            <head>
                              <meta charset="UTF-8">
                              <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            </head>
                            <body>
                                <section class="lg:px-24 px-4 lg:pt-24 pt-4 ">
                                 
                                 <p class="mt-2 text-sm">Enquiries Details are as follows:</p>
                                
                                    
                                    
                                    		<p>Name:'.$name.'</p>
                                    		<p>Company Name: '.$comp_name.'</p>
                                            <p>Website: '.$website.'</p>
                                            <p>Phone Number: '.$mobile.'</p>
                                            <p>Email Address: '.$email.'</p>
                                            <p>Date: '.$bdate.'</p>
                                            <p>Time Slot: '.$time.'</p>
                                            <p>Message:'.$remarks.'</p> 
                                    
                                </section>
                            </body>
                        </html>';  


echo smtp_mailer($to_email,$Subject,$htmlContent);


function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "mail.carbon-reduction.co.uk";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "no-reply@carbon-reduction.co.uk";
	$mail->Password = "Sh{wtOJJl_G!";
	$mail->SetFrom("no-reply@carbon-reduction.co.uk");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>