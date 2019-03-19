<?php

// conexión con base de datos
require_once("util/functions.php");  
require_once("util/db_manager.php"); 

//get messages XD  
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->query("SET NAMES 'utf8'");
    $data = $pdo->query("SELECT * FROM `runners` LIMIT 0")->fetchAll();
if (isset($_POST['Search_me_this'])) {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->query("SET NAMES 'utf8'");
    $data = $pdo->query("SELECT * FROM `runners` LIMIT 25")->fetchAll();

// okey esto se hace con un union, para unificar las tablas ;) poco a poco niño
}


$modalScript7 = "<script>
$( document ).ready(function() {
    $('#login_failed').modal({show:true});
});
//</script>";



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
if (isset($_POST['Log_me_out'])) {
   
    // remove all session variables
    session_unset(); 
    
    // destroy the session 
    session_destroy(); 
    header('Location: index.php');


}



  














       
        



     


?>
