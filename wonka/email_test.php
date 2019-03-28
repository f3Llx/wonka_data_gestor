<?php
// the message

require("src/Exception.php");
require("src/PHPMailer.php");
require("src/SMTP.php");

if (isset($_POST['sendMail'])) {
    
 $contacts = array(
	array("name"=>"Theodore","email"=>"icse48@yandex.com"),
	array("name"=>"Fitzgerald","email"=>"48icse@gmail.com"),
	array("name"=>"Ronan","email"=>"ficexomor@world-travel.online"),
	array("name"=>"Hashim","email"=>"ficexomor@world-travel.online"),
	array("name"=>"Jackson","email"=>"ficexomor@world-travel.online"),
	array("name"=>"Dustin","email"=>"ficexomor@world-travel.online"),
	array("name"=>"Mohammad","email"=>"ficexomor@world-travel.online"),
	array("name"=>"Vaughan","email"=>"ficexomor@world-travel.online"),
	array("name"=>"Caleb","email"=>"ficexomor@world-travel.online"),
	array("name"=>"Orlando","email"=>"beterinoe@gmail.com")
);

 foreach($contacts as $contact){
    require("src/Mail.php");
    sendEmail(cleanStr($contact['name']), $contact['email'], $message);
}
}
function cleanStr($value){
    $value = str_replace('Â', '', $value);
    $value = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value);
    return $value;
}
function sendEmail($email, $name,$message) {
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    //Enable SMTP debugging. 
    $mail->SMTPDebug = 3;                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = 'send.one.com';
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = 'info@wonkaproducciones.com';
    $mail->Password = 'onewillywonka';                          
    //If SMTP requires TLS encryption then set it
    //$mail->SMTPSecure = "tls";                           
    //Set TCP port to connect to 
    $mail->Port = 2525;                                   
    
    $mail->From = "info@wonkaproducciones.com";
    $mail->FromName = "WONKA PRODUCCIONES";
    
    $mail->smtpConnect(
        array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        )
    );
    
    $mail->addAddress("$name","$email");
    
    $mail->isHTML(true);
    
    $mail->Subject = "Subject Text";
    $mail->Body = $message;
    $mail->AltBody = "This is the plain text version of the email content";
    
    if(!$mail->send()) 
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } 
    else 
    {
        echo "Message has been sent successfully";
    }

 }


?>
<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <fieldset>

          <!-- Form Name -->
          <legend>Configuracion de usuario</legend>

          <!-- Password input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="passwordinput">test time</label>
            <div class="col-md-4">
              
              <input class="w3-button w3-right" type="Submit" name="sendMail" value="OK!" >
            </div>
            
          </div>

          </fieldset>
        </form>
        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <fieldset>
          

$mail = new PHPMailer\PHPMailer\PHPMailer();
//Enable SMTP debugging. 
$mail->SMTPDebug = 0;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = 'smtp.mailtrap.io';
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = 'fdc7d5b94b8fce';
$mail->Password = '7392d912c61c93';                          
//If SMTP requires TLS encryption then set it
//$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 2525;                                   

$mail->From = "48icse@gmail.com";
$mail->FromName = "Full Name";

$mail->smtpConnect(
    array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    )
);

$mail->addAddress("48icse@gmail.com", "Recepient Name");

$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}





