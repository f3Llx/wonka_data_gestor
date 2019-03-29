<?php
// Start the session
session_start();
require_once("util/db_manager.php");
$current_user=$_SESSION["username"];
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$user_darkMode_new = $pdo->query("SELECT `dark` FROM `wonka_user` WHERE `username`= '$current_user';")->fetch();
if($user_darkMode_new['0']==0){
  $_SESSION["current_user_theme"]="css/main.css";
  $checked="";
}else{
  $_SESSION["current_user_theme"]="css/main1.css";
  $checked="checked";  
  
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  
    <title>WONKA DATABASE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/FAVICON.png?resize=16,16&amp;format=ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="<?php echo $_SESSION["current_user_theme"]; ?>" />
    <link type="text/css" rel="stylesheet" href="css/Sliders.css" />
    <link type="text/css" rel="stylesheet" href="css/hover.css" />
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>

</head>


<?php



$user_id_new = $pdo->query("SELECT `id` FROM `wonka_user` WHERE `username`= '$current_user';")->fetch();

$_SESSION["current_user_id"]=$user_id_new['0'];
echo"<br><br><br><br><br>";


require_once("main.php");





if(empty($_SESSION["username"])){
    header("Location: index.php");
    
}

      
     
        
?>

<body>
<nav class="navbar barra   navbar-default navbar-fixed-top" role="navigation" >
  <div class="navbar-header"  >
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>    
  </div>
  <a class="navbar-brand" href=""><span class="color_nav_logo">WONKA<span></a>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-left">
    <li><a href=""class="w3-bar-item hvr-bounce-to-bottom nav_bar_button"  data-toggle="modal" data-target="#import_me">Importar datos <span class="glyphicon glyphicon-upload"></span></a></li>
    
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
      
      <!-- ...Dropdown start...  -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle  hvr-bounce-to-bottom nav_bar_button" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $_SESSION["username"];?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input class="w3-button" type="Submit" name="Log_me_out" value="Cerrar Sesion"><span class="glyphicon glyphicon-log-out"></span>
                </form>
                <a href=""class="w3-button"  data-toggle="modal" data-target="#settings">Configuracion <span class="glyphicon glyphicon-cog"></span></a>
            
        </div>
      </li>
      <!-- ...Dropdown end...  -->
      <li><p>&ensp;&ensp;&ensp;</p></li>
    </ul>
  </div>
</nav>
    </div>

    <br><br><br>
    <!-- FRONT END...  -->
    <div class="container-fluid">
        <div class="row firebg divs_css3">

            <div class="col-md-12 w3-animate-zoom">
                <center>
                    <h1  class="tittle_h1">Wonka Database </span></h1>
                </center>

                <center>
                    <div class="row">
		                <div class="col-md-2">
		                </div>
		                <div class="col-md-2">
		                </div>
		                <div class="col-md-2">
                        <div class="w3-animate-right"><span id="R"  class=" rotateRefresh glyphicon glyphicon-refresh hvr-grow main_buttons"></div>
		                </div>
		                <div class="col-md-2">
                        <div class="w3-animate-left"><span  class="w3-animate-opacity glyphicon glyphicon-search hvr-grow main_buttons"  class="btn btn-info btn-lg " data-toggle="modal" data-target="#searchModal"></div>
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
          <p class="w3-animate-left"> <?php 
          if(!empty($_SESSION["i_have_searched_bruh"])){
            if(count($data)==0){
              echo"No se han encontrado resultados :(";
            }else{
              echo "Monstrando ".count($data)." resultados";
            }
          }

          
           
          ?> </p>
          <!-- EMPIEZA BOTON EMAIL !-->
          <?php if(!empty($_SESSION["i_have_searched_bruh"])){
              echo"<div class='w3-right w3-animate-right'><a href=''class='mail_button hvr-bounce-to-bottom2 nav_bar_button'  data-toggle='modal' data-target='#email_this'>&nbsp; Mail&nbsp; <span class='glyphicon glyphicon-send'>&nbsp;</span></a></div>";}?>
            <!-- ACABA BOTON EMAIL !-->
    <table class="table  w3-animate-bottom">
    <thead>
      <tr>
        <?php
        if(!empty($_SESSION["i_have_searched_bruh"])){
          echo"<th class='Nombre_t'>Nombre <span id='N' style='cursor: pointer' class='glyphicon glyphicon-eye-close'></span></p></th>
          <th class='Apellido_t'>Apellido <span id='A' style='cursor: pointer' class='glyphicon glyphicon-eye-close'></span></p></th>
          <th class='Email_t'>Email <span id='E' style='cursor: pointer' class='glyphicon glyphicon-eye-close'></span></p></th>
          <th class='Telefono_t'>Telefono <span id='T' style='cursor: pointer' class='glyphicon glyphicon-eye-close'></span></p></th>
          <th class='Dni_t'>Dni <span id='D' style='cursor: pointer' class='glyphicon glyphicon-eye-close'></span></p></th>
          <th class='Birthdate_t'>Nacimiento <span id='B' style='cursor: pointer' class='glyphicon glyphicon-eye-close'></span></p></th>
          <th class='Comment_t'>Evento <span id='C' style='cursor: pointer' class='glyphicon glyphicon-eye-close'></span></p></th>";
        }
        ?>
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
                <select id="selectbasic" name="RowNumber" class="form-control">
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                  <option value="150">150</option>
                  <option value="200">200</option>
                  <option value="9999">Todos</option>
                </select>
              </div>
            </div>
                
            <!-- Multiple Checkboxes -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="checkboxes">Modalidad</label>
              <div class="col-md-4">
              <div class="checkbox">
                <label for="checkboxes-0">
                  <input type="checkbox" name="Adult" id="checkboxes-0" value="Adult"checked>
                  Corredores
                </label>
            	</div>
              <div class="checkbox">
                <label for="checkboxes-1">
                  <input type="checkbox" name="Juvenile" id="checkboxes-1" value="Juvenile">
                  Corredores Infantiles
                </label>
            	</div>
              <div class="checkbox">
                <label for="checkboxes-2">
                  <input type="checkbox" name="Volunteer" id="checkboxes-2" value="Volunteer">
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
<!-- Modal IMPORTAR -->
<div id="import_me" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Wonka IMPORT Manager</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <fieldset>

          <!-- Form Name -->
          <legend>.CSV.</legend>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">Selecciona modalidad</label>
            <div class="col-md-4">
              <select id="selectbasic" name="modality" class="form-control">
                <option value="runners">Corredor</option>
                <option value="juvenilerunners">Corredor Infatil</option>
                <option value="volunteers">Voluntario</option>
              </select>
            </div>
          </div>
          <hr>
          <!-- File Button --> 
            <div class="form-group">
              <label class="col-md-4 control-label" for="filebutton">Solo .CSV</label><br>
              <div class="col-md-4">
              <input type="file" name="file" id="file" class="w3-left"><br>
              <input type="submit" value="importar!" name="import" class="w3-left" id="importado_click">
              </div>
            </div>
          </fieldset>
        </form>
        <!-- Loading fake animation for dummyes --> 
      <div id="loading_fake" style="display:none;">
      <div class="thecube">
			<div class="cube c1"></div>
			<div class="cube c2"></div>
			<div class="cube c4"></div>
      <div class="cube c3"></div>
      <!-- end of the fakery lmao --> 
    </div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
  <!-- Modal -->
  <div id="empty" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Error</h4>
      </div>
      <div class="modal-body">
        <section class="c-container">
            
            <div class="o-circle c-container__circle o-circle__sign--failure">
              <div class="o-circle__sign"></div>  
            </div>   
            <p>El Archivo .csv a importar no puede estar vacio.</p>
          </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
  <!-- Modal -->
  <div id="empty_pass" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Error</h4>
      </div>
      <div class="modal-body">
        <section class="c-container">
            
            <div class="o-circle c-container__circle o-circle__sign--failure">
              <div class="o-circle__sign"></div>  
            </div>   
            <p>La contraseña no puede estar vacia.</p>
          </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="insert" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Perfecto!</h4>
      </div>
      <div class="modal-body">
        <section class="c-container">
            
            <div class="o-circle c-container__circle o-circle__sign--success">
              <div class="o-circle__sign"></div>  
            </div>   
            <p><?php echo"Enhorabuena!,Se han insertado/actualizado $c datos correctamente!"; ?></p>
          </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="successfull_pass" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Perfecto!</h4>
      </div>
      <div class="modal-body">
        <section class="c-container">
            
            <div class="o-circle c-container__circle o-circle__sign--success">
              <div class="o-circle__sign"></div>  
            </div>   
            <p>Tu contraseña se ha modificado correctamente</p>
          </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="settings" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Configuracion</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <fieldset>

          <!-- Form Name -->
          <legend>Configuracion de usuario </legend>

          <!-- Password input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="passwordinput">Contraseña</label>
            <div class="col-md-4">
              <input id="passwordinput" name="password_update_input" type="password" placeholder="Contraseña" class="form-control input-md">
              <input class="w3-button w3-right" type="Submit" name="update_my_pass" value="OK!" >
            </div>
            
          </div>

          </fieldset>
        </form>
        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <fieldset>

          <!-- Form Name -->
      
          <!-- Password input-->
          <div class="form-group">
            
            <label class="col-md-4 control-label" for="passwordinput">Modo Oscuro</label>
            <div class="col-md-4">
              <!-- Rounded switch -->
                <label class="switch">
                  <input type="checkbox" name="dark_me_I" value="1"<?php echo $checked; ?>>
                  <span class="slider round"></span>
                </label>
                <input class="w3-button w3-right" type="Submit" name="dark_me" value="OK!" >
            </div>
            
          </div>

          </fieldset>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="email_this" class="modal fade" role="dialog">
  <div class="modal-dialog">
  
}

    <!-- Modal content-->
<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enviar mails//Wonka Plantilla</h4>
      </div>
      <div class="modal-body">
                <div class="container-fluid">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <span class="text-info">ASUNTO</span>
                <input type="text" name="Email_Subject"  placeholder="ASUNTO" required value="<?php echo  $_SESSION["Email_Subject"]; ?>">
          	<div class="row">
          		<div class="col-md-12" >
              <center><img align='center' alt='Image' border='0' class='center autowidth' src='https://i.imgur.com/Z3AdyGe.png' style='outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; clear: both; height: auto; float: none; border: none; width: 100%; max-width: 200px; display: block;' title='Image' width='64' /></a>
              <input type="text" name="Mail_Photo"  placeholder="LINK DE IMAGEN" required value="<?php echo  $_SESSION["Mail_Photo"]; ?>">
              </center>
          		</div>
          	</div>
          	<div class="row">
          		<div class="col-md-12">
              <div style="background-color:pink">  
              
              <h3 class="text-center">
                Evento
              <input type="text" name="Mail_Event"  placeholder="EVENTO" required value="<?php echo  $_SESSION["Mail_Event"]; ?>">
          			</h3>
          			<h3 class="text-center">
                Fecha&nbsp;
                <input type="text" name="Mail_Date"  placeholder="FECHA" required value="<?php echo  $_SESSION["Mail_Date"]; ?>">
                </h3>
                </div>   
                <div>
                  <center><p class="lead">
          			Hola, <strong>USUARIO </strong><input required type="text" name="Mail_User_Custom_Phrase" placeholder="Texto por defecto" value="<?php echo  $_SESSION["Mail_User_Custom_Phrase"]; ?>"><br></small>
          			</p></center>
          			<p>
                <center><textarea required class="d-none" name="Mail_Main_TEXT"placeholder="(Texto de ejemplo'Editame')"><?php echo  $_SESSION["Mail_Main_TEXT"]; ?></textarea></center>
                </p>
                <center><a href='http://www.corriendoporvegueta.com/' style='-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: rgb(255, 49, 227); border-radius: 24px; -webkit-border-radius: 24px; -moz-border-radius: 24px; width: auto; width: auto; border-top: 1px solid rgb(255, 49, 227); border-right: 1px solid rgb(255, 49, 227); border-bottom: 1px solid rgb(255, 49, 227); border-left: 1px solid rgb(255, 49, 227); padding-top: 5px; padding-bottom: 5px; font-family: 'Arial', Georgia, Times, 'Times New Roman', serif; text-align: center; mso-border-alt: none; word-break: keep-all;' target='_blank'><span style='padding-left:25px;padding-right:25px;font-size:14px;display:inline-block;'><span style='font-size: 16px; line-height: 32px;'><span data-mce-style='font-size: 14px;' style='font-size: 14px; line-height: 28px;'>Inscribete</span></span></span></a><br><br><br>LINK DE PAGINA DE EVENTO<br><input type="text" name="Mail_Subscribe_LINK" required value="<?php echo  $_SESSION["Mail_Subscribe_LINK"]; ?>"></center><br><br>
                <a href='https://www.facebook.com/wonkaproducciones/' class="w3-right" target='_blank' title='Facebook'><img alt='Facebook' height='32' src='https://i.imgur.com/hK5Q5ga.png'  title='Facebook' width='32' /></a>
                <center><button type="submit" name="email_SEND" class="btn btn-lg btn-info" style="font-size=30px"id="importado_click2">ENVIAR</button>
                  <!-- Rounded switch -->
                  
                      <label class="switch">
                        
                        <input type="checkbox" name="Stop_this_is_a_test" value="1">
                        <span class="slider round"></span>
                      </label>
                </center>
                <center><h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>TEST?</strong></h5></center>
                      <!-- Loading fake animation for dummyes --> 
                      <div id="loading_fake2" style="display:none;">
                        <div class="thecube">
			                  <div class="cube c1"></div>
			                  <div class="cube c2"></div>
			                  <div class="cube c4"></div>
                      <div class="cube c3"></div>
                      <!-- end of the fakery lmao --> 
                </form>
              </div>
          	</div>
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
$('#importado_click').click(function() {
  $( "#loading_fake" ).show( "slow");
  $( "#importado_click" ).hide( "slow");
});
$('#importado_click2').click(function() {
  $( "#loading_fake2" ).show( "slow");
  $( "#importado_click2" ).hide( "slow");
});

</script>



</html>
