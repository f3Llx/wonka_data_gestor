<?php

// conexión con base de datos
require_once("util/functions.php");  
require_once("util/db_manager.php"); 

//get messages XD  
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->query("SET NAMES 'utf8'");
    $ImEmpty="";

$data = $pdo->query("SELECT * FROM `runners` LIMIT 0")->fetchAll();
// CONDICIONES
    if (isset($_POST['Search_me_this'])) {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->query("SET NAMES 'utf8'");
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
//QUERY ADULTO SI NO ESTA VACIO
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

}
// https://blog.fossasia.org/import-excel-file-data-in-mysql-database-using-php/

$modalScript7 = "<script>
$( document ).ready(function() {
    $('#login_failed').modal({show:true});
});
//</script>";


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
if (isset($_POST['Log_me_out'])) {
   
    // remove all session variables
    session_unset(); 
    
    // destroy the session 
    session_destroy(); 
    header('Location: index.php');


}



  














       
        



     


?>
