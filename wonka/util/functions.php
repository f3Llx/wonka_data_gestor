<?php

                                 //[¨-___-*\__|FUNCIONES|__/*-___-¨]\\
                                //___________________________________\\

//Inserta informacion a travez de un archivo csv.
function insertBULK($type_f,$Nombre_f, $Apellido_f,$Telefono_f,$Email_f,$Dni_f,$Birthdate_f,$Comment_f) {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = 'wonka_main';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->exec("SET NAMES utf8");("SET NAMES utf8");
        $sql_insertCurrent_info = "INSERT INTO $type_f(Nombre,Apellido,Telefono,Email,Dni,Birthdate,Comment) VALUES ('$Nombre_f','$Apellido_f','$Telefono_f','$Email_f','$Dni_f','$Birthdate_f','$Comment_f')";
        $conn->exec($sql_insertCurrent_info);
        }
    catch(PDOException $e)
        {
        echo $sql_insertCurrent_info . "<br>" . $e->getMessage();
        }
    
    $conn = null;
}
// desuscribe el dude
function Unsuscribe_user($Unsuscribing_user_mail) {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = 'wonka_main';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql_insertCurrent_info = "DELETE FROM runners WHERE `Email`='$Unsuscribing_user_mail';
                                   DELETE  FROM juvenilerunners WHERE `Email`='$Unsuscribing_user_mail';
                                   DELETE  FROM volunteers WHERE `Email`='$Unsuscribing_user_mail';";
        $conn->exec($sql_insertCurrent_info);

        }
    catch(PDOException $e)
        {
        echo $sql_insertCurrent_info . "<br>" . $e->getMessage();
        }
    
    $conn = null;
}
//Actualiza la contraseña.
function update_my_password($username_id, $new_edited_password) {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = 'wonka_main';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql_insertCurrent_info = "UPDATE `wonka_user` SET `password` = '$new_edited_password' WHERE `wonka_user`.`id` = '$username_id';";
        $conn->exec($sql_insertCurrent_info);

        }
    catch(PDOException $e)
        {
        echo $sql_insertCurrent_info . "<br>" . $e->getMessage();
        }
    
    $conn = null;
}
//Actualiza el modo oscuro.
function update_my_dark($username_id, $dark_mode) {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = 'wonka_main';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql_insertCurrent_info = "UPDATE `wonka_user` SET `dark` = '$dark_mode' WHERE `wonka_user`.`id` = '$username_id';";
        $conn->exec($sql_insertCurrent_info);

        }
    catch(PDOException $e)
        {
        echo $sql_insertCurrent_info . "<br>" . $e->getMessage();
        }
    
    $conn = null;

}

// FUNCIONES
function validate_name($name){
    if(empty($name)){
        return 1;
    }
    elseif(preg_match('/^[a-zA-Z ]*$/', $name)){
        return 0;
    }
    else{
        return 2;
    }
}

function validate_surname($surname){
    if(empty($surname)){
        return 1;
    }elseif(preg_match('/^[a-zA-Z ]*$/',$surname)){
        return 0;
    }else{
        return 2;
    }
}

function validate_email($Email){
    if(empty($Email)){
        return 1;
    }elseif(filter_var($Email, FILTER_VALIDATE_EMAIL)){
        return 0;
    }else{
        return 2;
      
    }
}
// Le añade encriptado a una variable ("para las contraseñas")
function hash_my_thing($hashedPassword){
    $hashedPassword=sha1($hashedPassword);
    return $hashedPassword;
}


