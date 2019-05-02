<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>WONKA DATABASE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/main.css" />
    <link type="text/css" rel="stylesheet" href="css/hover.css" />
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="shortcut icon" href="img/FAVICON.png?resize=16,16&amp;format=ico">
</head>


<?php
require_once("main.php");
?>

<body>
    <!-- FRONT END...  -->
   
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
        <form class="form" role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
            <center><img  src="img/logo.png" alt="wonka" class="w3-animate-left"></center>
            <h1 class="w3-center w3-animate-right">Database Gestor</h1>
                <input id="emailInput" name="username_log" placeholder="username" class="form-control form-control-sm w3-animate-bottom" type="text" required="">
            </div>
            <div class="form-group w3-animate-bottom">
                <input id="passwordInput" name="password_log" placeholder="password" type="password" class="form-control form-control-sm" type="text" required="">
            </div>
            <div class="form-group w3-animate-bottom">
                <center>
                    <button class="btn  hvr-bounce-to-top" type="submit" name="Log_me_in">log_in</button>
                </center>
            </div>
            
        </form>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>

    <!-- Modal ERRORS -->
    <div id="modal1" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" type="button" >&times;</button>
      </div>
      <div class="modal-body">
      <h4>There are some errors...</h4>
          <h5>You might want to check:</h5>
            <?php
                // errores
                echo "<h5>" . $name_err . "</h5>";
                echo "<h5>" . $surname_err . "</h5>";
                echo "<h5>" . $username_err . "</h5>";
                echo "<h5>" . $email_err . "</h5>";
            ?>
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#register" data-dismiss="modal" >Try again</button>
      </div>
    </div>
  </div>
</div>
  <!-- Modal end -->
  <!-- Modal ERRORS -->
  <div id="login_failed" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" type="button" >&times;</button>
      </div>
      <div class="modal-body">
      <center>
      <img  src="img/logo.png" alt="Smiley face" >
      <h4>Login Failed</h4>
      <h5>Username or Password not correct...</h5>
      </center>    
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#register" data-dismiss="modal" >Try again</button>
      </div>
    </div>
  </div>
</div>
  <!-- Modal end -->
</body>




</html>
