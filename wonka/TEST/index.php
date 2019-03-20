<?php

if(isset($_POST['submit'])){
    require 'dbconnect.php';
//    $host = 'localhost';
//    $user = 'root';
//    $password = '';
//    $db = 'csv';
//    $con = mysqli_connect( $host , $user, $password ) or die ( 'Could not connect to server' . mysqli_error ($con) );
//    mysqli_select_db( $con , $db ) or die ( 'Could not connect to database' . mysqli_error ($con) );

    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file,"r" );
    $c = 0 ; // define row count flag

    while (($csvData = fgetcsv($handle,1000,";")) !== false ){
        $firstName = $csvData[0];
        $lastName = $csvData[1];
        $sql = "INSERT INTO csv(firstName,lastName) VALUES ('$firstName', '$lastName')";
        $query = mysqli_query ($con, $sql);
        $c = $c + 1 ;
    }
    if ($query){
        echo "Csv data uploaded Sucessfully.";
    }else{
        echo "Error Occured";
    }
}
?>
<!DOCTYPE html>
<html>
<body>

<form role="form" action="index.php" method="post" enctype="multipart/form-data">
    Select csv file to upload:
    <input type="file" name="file" id="file">
    <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>