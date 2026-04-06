<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


    $my_name = htmlspecialchars($_POST['my_name']);
    $email =     htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);




        // Send email using PHPMailer
        $mail = new PHPMailer(true);
        
        try {
            // Server settings
            $mail->isSMTP();
            //  $mail->SMTPDebug = 2;
            $mail->Host = 'whm-market06.aos.rw'; // Updated to match SSL certificate CN
            $mail->SMTPAuth = true;
            $mail->Username = 'info@hgbsltd.co.rw';
            $mail->Password = 'vestina@@123';
            $mail->SMTPSecure = 'ssl'; // Use SSL for port 465
            $mail->isHTML(true);
            $mail->Port = 465;

            // Recipients
            $mail->setFrom($mail->Username, $my_name);
            $mail->addAddress('info@hgbsltd.rw','HGBSLTD'); // Add your own email address
            // $mail->addAddress('mujawaves@hgbsltd.rw','MUJAWINAMA VESTINE'); // Add your own email address
            $mail->addReplyTo($email,$my_name);
            $mail->addEmbeddedImage('img/company_logo.png', 'company_logo', 'company_logo.png');

            // Content
            $mail->Subject = $subject;
          



            $mail->Body = '
            <!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title></title>
            </head>

            
            <body style="margin: 0; padding: 0; font-family: Arial, sans-serif; font-size: 16px; line-height: 1.6;">
                <div class="email-wrapper" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc;">
                    <div class="header" style="background-color: #f2f2f2; padding: 10px 20px; text-align: center; display: flex; justify-content: center; align-items: center;">
                        <img class="" src="cid:company_logo" alt="Logo" style="width: 100px; margin-right: 2%;">
                        <h2>Client Message</h2>
                    </div>
                    <div class="content" style="padding: 20px;">
                       
                    
                        <ul>
                            <li><strong>Name:</strong>' . $my_name . '</li>
                            <li><strong>Email:</strong> ' . $email . '</li>
                            
                        </ul>
                        <p>' . $message . '</p>
                        <!-- <a href="[Link to Applicant Profile]" class="button" style="display: inline-block; background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; margin-top: 20px;">View Applicant Profile</a> -->
                    </div>
            
                </div>
            </body>
            
            </html>
            ';
            


            


            $mail->send();
            echo 'Message has been sent';

        } 
           
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
 
  

?>
