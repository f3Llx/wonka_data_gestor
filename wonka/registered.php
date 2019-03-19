<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Icsitter</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/main.css" />
    <link type="text/css" rel="stylesheet" href="css/hover.css" />
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>
</head>


<?php
require_once("main.php");
//$This_user_ID=$_SESSION["username"];
//$iduser_find = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//$user_id = $iduser_find->query("SELECT id FROM `icsitter_user` WHERE `username`='$This_user_ID';")->fetch(Pdo::FETCH_COLUMN);
//$user_img = $iduser_find->query("SELECT username_img_url FROM `icsitter_user` WHERE `username`='$This_user_ID';")->fetch(Pdo::FETCH_COLUMN);




if(empty($_SESSION["username"])){
    header("Location: index.php");
}
?>

<body>
    <div class="w3-bar bg-navBar divs_css w3-animate-top"style="background-color:rgb(255, 131, 149)">
        <a href="#" class="w3-bar-item w3-button">Wonka</a>
        <a class="w3-right w3-button"><?php echo $_SESSION["username"];?></i></a>
        <a class="w3-right ">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input class="w3-button" type="Submit" name="Log_me_out" value="Cerrar Sesion">
            </form></i></a>
    </div>

    <br><br><br>
    <!-- FRONT END...  -->
    <div class="container-fluid">
        <div class="row firebg divs_css3">

            <div class="col-md-12 w3-animate-zoom">
                <center>
                    <h1 style="color:rgb(255, 5, 162);font-size:60px" >Wonka Database </span></h1>
                </center>
                
                <center>
                    <div class="row">
		                <div class="col-md-2">
		                </div>
		                <div class="col-md-2">
		                </div>
		                <div class="col-md-2">
                        <div><span id="R" style="cursor: pointer;font-size:50px" class="glyphicon glyphicon-refresh"></div>
		                </div>
		                <div class="col-md-2">
                        <div><span style="cursor: pointer;font-size:50px" class="glyphicon glyphicon-search"  class="btn btn-info btn-lg" data-toggle="modal" data-target="#searchModal"></div>
		                </div>
		                <div class="col-md-2">
		                </div>
		                <div class="col-md-2">
		                </div>
	                </div>
                </center>
                
            </div>
        </div>
        <br>

    <table class="table table-striped w3-animate-opacity">
    <thead>
      <tr>
        <th class="Nombre_t">Nombre <span id="N" style="cursor: pointer" class="glyphicon glyphicon-eye-close"></span></p></th>
        <th class="Apellido_t">Apellido <span id="A" style="cursor: pointer" class="glyphicon glyphicon-eye-close"></span></p></th>
        <th class="Email_t">Email <span id="E" style="cursor: pointer" class="glyphicon glyphicon-eye-close"></span></p></th>
        <th class="Telefono_t">Telefono <span id="T" style="cursor: pointer" class="glyphicon glyphicon-eye-close"></span></p></th>
        <th class="Dni_t">Dni <span id="D" style="cursor: pointer" class="glyphicon glyphicon-eye-close"></span></p></th>
        <th class="Birthdate_t">Nacimiento <span id="B" style="cursor: pointer" class="glyphicon glyphicon-eye-close"></span></p></th>
        <th class="Comment_t">Evento <span id="C" style="cursor: pointer" class="glyphicon glyphicon-eye-close"></span></p></th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach($data as $row){?>
        <tr> 
            <td class="Nombre_a"> <?=$row['Nombre']?></td>
            <td class="Apellido_a"> <?=$row['Apellido']?></td>
            <td class="Email_a"> <?=$row['Email']?></td>
            <td class="Telefono_a"> <?=$row['Telefono']?></td>
            <td class="Dni_a"> <?=$row['Dni']?></td>
            <td class="Birthdate_a"> <?=$row['Birthdate']?></td>
            <td class="Comment_a"> <?=$row['Comment']?></td>
        </tr>
        
     </div>
     <?php } ?> 
    </tbody>
    </table>
    </div>





<!-- Modal -->
<div id="searchModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Atributos de Busqueda</h4>
      </div>
      <div class="modal-body">
       
      <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <fieldset>
            <!-- Form Name -->
            <legend>Tu busqueda</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">nombre</label>  
              <div class="col-md-4">
              <input id="textinput" name="S_Nombre" type="text" placeholder="Nombre" class="form-control input-md">
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Apellido</label>  
              <div class="col-md-4">
              <input id="textinput" name="S_Apellido" type="text" placeholder="Apellido" class="form-control input-md">
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Dni</label>  
              <div class="col-md-4">
              <input id="textinput" name="S_Dni" type="text" placeholder="Dni" class="form-control input-md">
              </div>
            </div>
            
            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="selectbasic">Numero de lineas</label>
              <div class="col-md-4">
                <select id="selectbasic" name="selectbasic" class="form-control">
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                  <option value="150">150</option>
                  <option value="200">200</option>
                  <option value="9999">All</option>
                </select>
              </div>
            </div>
                
            <!-- Multiple Checkboxes -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="checkboxes">Modalidad</label>
              <div class="col-md-4">
              <div class="checkbox">
                <label for="checkboxes-0">
                  <input type="checkbox" name="checkboxes" id="checkboxes-0" value="Adult"checked required>
                  Corredores
                </label>
            	</div>
              <div class="checkbox">
                <label for="checkboxes-1">
                  <input type="checkbox" name="checkboxes" id="checkboxes-1" value="Juvenile">
                  Corredores Infantiles
                </label>
            	</div>
              <div class="checkbox">
                <label for="checkboxes-2">
                  <input type="checkbox" name="checkboxes" id="checkboxes-2" value="Volunteer">
                  Voluntarios
                </label>
            	</div>
              </div>
            </div>
            <input class="w3-button w3-right" type="Submit" name="Search_me_this" value="BUSCAR">







            </fieldset>
        </form>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>


</body>
<script>
$( "#N" ).click(function() {
  $( ".Nombre_t" ).hide( "slow");
  $( ".Nombre_a" ).hide( "slow");
});
$( "#A" ).click(function() {
  $( ".Apellido_t" ).hide( "slow");
  $( ".Apellido_a" ).hide( "slow");
});
$( "#E" ).click(function() {
  $( ".Email_t" ).hide( "slow");
  $( ".Email_a" ).hide( "slow");
});
$( "#T" ).click(function() {
  $( ".Telefono_t" ).hide( "slow");
  $( ".Telefono_a" ).hide( "slow");
});
$( "#B" ).click(function() {
  $( ".Birthdate_t" ).hide( "slow");
  $( ".Birthdate_a" ).hide( "slow");
});
$( "#C" ).click(function() {
  $( ".Comment_t" ).hide( "slow");
  $( ".Comment_a" ).hide( "slow");
});
$( "#D" ).click(function() {
  $( ".Dni_t" ).hide( "slow");
  $( ".Dni_a" ).hide( "slow");
});
$('#R').click(function() {
    location.reload();
});


</script>


</html>
