<?php

// conexión con base de datos
require_once("util/functions.php");  
require_once("util/db_manager.php"); 
$_SESSION["i_have_searched_bruh"]="";
//get messages XD  
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->query("SET NAMES 'utf8'");
$ImEmpty="";
$data = $pdo->query("SELECT * FROM `runners` LIMIT 0")->fetchAll();
// CONDICIONES
    if (isset($_POST['Search_me_this'])) {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->query("SET NAMES 'utf8'");
    $_SESSION["i_have_searched_bruh"]="i_have";
    // MAIN Variables --> Modalidades
// FORMULARIO DE BUSQUEDAS
    //Nombre
        if(!empty($_POST['S_Nombre'])){
            $S_Nombre=$_POST['S_Nombre'];
        }else{$S_Nombre="";}
    //Apellido
        if(!empty($_POST['S_Apellido'])){
            $S_Apellido=$_POST['S_Apellido'];
        }else{$S_Apellido="";}
    // DNI
        if(!empty($_POST['S_Dni'])){
            $S_Dni= $_POST['S_Dni'];
        }else{$S_Dni="";}
    //LINEAS
        $LIMIT=$_POST['RowNumber'];
        $CurrentLIMIT="limit $LIMIT";
// MULTIPLES CODICIONES////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// QUERY ADULTO SI NO ESTA VACIO
            if(!empty($_POST['Adult'])){
                
                $Adult_Query="(SELECT * FROM `runners` WHERE `Nombre` LIKE '%$S_Nombre%' && `Dni` LIKE '%$S_Dni%' && `Apellido`LIKE '%$S_Apellido%' $CurrentLIMIT)";
            }
            else{
                $Adult_Query="";
            }
// QUERY VOLUNTARIO SI NO ESTA VACIO
            if(!empty($_POST['Volunteer'])){
                $union="UNION ALL";
               $Volunteer_Query="(SELECT * FROM `volunteers` WHERE `Nombre` LIKE '%$S_Nombre%' && `Dni` LIKE '%$S_Dni%' && `Apellido`LIKE '%$S_Apellido%' $CurrentLIMIT)";
            }
            else{
                $union="";
                $Volunteer_Query="";
            }
// QUERY JUVENILE SI  NO ESTA VACIO
            if(!empty($_POST['Juvenile'])){
                $union2="UNION ALL";
                $Juvenile_Query="(SELECT * FROM `juvenilerunners` WHERE `Nombre` LIKE '%$S_Nombre%' && `Dni` LIKE '%$S_Dni%' && `Apellido`LIKE '%$S_Apellido%' $CurrentLIMIT)";
            }else{
                $union2="";
                $Juvenile_Query="";
            }
// QUERY ADULTO SI ESTA VACIO
            if(empty($_POST['Adult'])&&!empty($_POST['Volunteer'])){
                $union="";
            }
// QUERY SI VOLUNTARIO ESTA VACIO
            if(!empty($_POST['Adult'])&&empty($_POST['Volunteer'])&&!empty($_POST['Juvenile'])){
                $union="";
            }
// QUERY SI ADULTO Y VOLUNTARIO ESTA VACIO
            if(empty($_POST['Adult'])&&empty($_POST['Volunteer'])&&!empty($_POST['Juvenile'])){
                $union="";
                $union2="";
            }
// QUERY SI Todo esta vacio
            if(empty($_POST['Adult'])&&empty($_POST['Volunteer'])&&empty($_POST['Juvenile'])){
                $union="";
                $union2="";
                $ImEmpty="SELECT * FROM `runners` LIMIT 0";
            }




//   __  __       _                                     
// |  \/  |     (_)                                    
// | \  / | __ _ _ _ __     __ _ _   _  ___ _ __ _   _ 
// | |\/| |/ _` | | '_ \   / _` | | | |/ _ \ '__| | | |
// | |  | | (_| | | | | | | (_| | |_| |  __/ |  | |_| |
// |_|  |_|\__,_|_|_| |_|  \__, |\__,_|\___|_|   \__, |
//                            | |                 __/ |
//                            |_|                |___/ 
$data = $pdo->query("$Adult_Query $union $Volunteer_Query $union2 $Juvenile_Query $ImEmpty")->fetchAll();
$_SESSION["data"]=$data;

}
// https://blog.fossasia.org/import-excel-file-data-in-mysql-database-using-php/

$modalScript7 = "<script>
$( document ).ready(function() {
    $('#login_failed').modal({show:true});
});
//</script>";

//_____                     _                              
//(____ \       _           (_)                        _    
// _   \ \ ____| |_  ____    _ ____  ____   ___   ____| |_  
//| |   | / _  |  _)/ _  |  | |    \|  _ \ / _ \ / ___)  _) 
//| |__/ ( ( | | |_( ( | |  | | | | | | | | |_| | |   | |__ 
//|_____/ \_||_|\___)_||_|  |_|_|_|_| ||_/ \___/|_|    \___)
//                                  |_|  
// IMPORTACION DE DATOS
if (isset($_POST['import'])) {
    $file = $_FILES['file']['tmp_name'];
    if(!empty($file)){
        $handle = fopen($file,"r" );
        $c = 0 ; // define row count flag
        $ClearDefynings = 0 ; 
    
         while (($csvData = fgetcsv($handle,1000,";")) !== false ){
             $Nombre_f = $csvData[0];
             $Apellido_f = $csvData[1];
             $Telefono_f = $csvData[2];
             $Email_f = $csvData[3];
             $Dni_f = $csvData[4];
             $Birthdate_f = $csvData[5];
             $Comment_f = $csvData[6];
             $type_f=$_POST['modality'];
             $ClearDefynings=$ClearDefynings+1;
             if($ClearDefynings>=2){
             insertBULK($type_f,$Nombre_f, $Apellido_f,$Telefono_f,$Email_f,$Dni_f,$Birthdate_f,$Comment_f);
             $c = $c + 1 ;
            }
             
   }
   $modalSuccess = "<script> $( document ).ready(function() { $('#insert').modal({show:true});})</script>";
   echo $modalSuccess;
   echo"<script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        </script>";
    }else{
    $modalEMpty = "<script> $( document ).ready(function() { $('#empty').modal({show:true});})</script>";
    echo$modalEMpty;
        echo"<script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        </script>";
    }   
}
// LOGS IN Y OUT
if (isset($_POST['Log_me_in'])) {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $username_log = $_POST['username_log'];
    $password_log = hash_my_thing(($_POST['password_log']));
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sqlgenial   = "SELECT COUNT(*) AS LOG FROM wonka_user WHERE username='$username_log' && password='$password_log';";
    $querygenial  = $conn->query($sqlgenial);
    $countqgenial = $querygenial->fetch();
    $querygenial->closeCursor();
    if($countqgenial['LOG']==1) {
        $_SESSION["username"] =$username_log ;
       
        header('Location: registered.php');
        
    } else {
        echo $modalScript7;
    }


}
// LOG OUT
if (isset($_POST['Log_me_out'])) {
   
    // remove all session variables
    session_unset(); 
    
    // destroy the session 
    session_destroy(); 
    header('Location: index.php');


}
// update dark
if (isset($_POST['dark_me'])) {
   $current_user_id=$_SESSION["current_user_id"];
   if(isset($_POST['dark_me_I'])){
    $dark_mode="1";
    update_my_dark($current_user_id, $dark_mode);
    header('Location: registered.php');
    
   }
   if(!isset($_POST['dark_me_I'])){
    $dark_mode="0";
    update_my_dark($current_user_id, $dark_mode);
    header('Location: registered.php');
   } 
}
if (isset($_POST['update_my_pass'])) {
    
    
   if(empty($_POST['password_update_input'])){
    $modalSuccess = "<script> $( document ).ready(function() { $('#empty_pass').modal({show:true});})</script>";
    echo $modalSuccess;
   }else{$current_user_id=$_SESSION["current_user_id"];
    $new_edited_password=hash_my_thing($_POST['password_update_input']);
    update_my_password($current_user_id, $new_edited_password);
    $modalSuccess2 = "<script> $( document ).ready(function() { $('#successfull_pass').modal({show:true});})</script>";
    echo $modalSuccess2;
    }
 }













//https://docs.bitnami.com/aws/apps/processmakerenterprise/troubleshooting/send-mail/
// mail https://www.w3schools.com/php/php_ref_mail.asp
//https://www.youtube.com/watch?v=PWijPoiDqzc

if (isset($_POST['email_SEND'])) {
   // ALL POST FORM VALUES
   //Email_Subject
   $Email_Subject=$_POST['Email_Subject'];
   //Mail_Event
   $Mail_Event=$_POST['Mail_Event'];
   //Mail_Date
   $Mail_Date=$_POST['Mail_Date'];
   //Mail_User_Custom_Phrase
   $Mail_User_Custom_Phrase=$_POST['Mail_User_Custom_Phrase'];
   //Mail_Subscribe_LINK
   $Mail_Subscribe_LINK=$_POST['Mail_Subscribe_LINK'];
   //Mail_Main_TEXT
   $Mail_Main_TEXT=$_POST['Mail_Main_TEXT'];
   //Stop_this_is_a_test
   // the message
   
   

require("src/Exception.php");
require("src/PHPMailer.php");
require("src/SMTP.php");

 foreach($_SESSION["data"] as $contact){
    $subject=$_POST['Email_Subject'];
    require("src/Mail.php");
    sendEmail($contact['Nombre'], $contact['Email'], $message,$subject);
}
}

function sendEmail($email, $name,$message,$subject) {
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    //Enable SMTP debugging. 
    $mail->SMTPDebug = 0;                               
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
    $mail->CharSet = 'UTF-8';                      
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
    
    $mail->Subject = "$subject";
    $mail->Body = $message;
    $mail->AltBody = "This is the plain text version of the email content";
    
    if(!$mail->send()) 
    {
        echo " <div class='alert alert-danger alert-dismissible'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>OOPS!</strong>a habido un error :( con el usuario $name" . $mail->ErrorInfo."</div>";
        
    } 
    else 
    {
        echo " <div class='alert alert-success alert-dismissible'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>Perfecto!</strong> El mail se envio correctamente a el usuario $name!
      </div>";
        
    }

 }

 

 

 




       
        



     


?>