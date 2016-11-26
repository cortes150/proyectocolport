
<!-- <div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <h4 class="text-center">L O G I N</h4>
            <hr>
            <form action="?c=Usuario&a=Sesiones" method="POST">
            <input type="text" name="nick" id="userName" class="form-control input-sm chat-input" placeholder="Username" />
            </br>
            <input type="text" name="clave" id="userPassword" class="form-control input-sm chat-input" placeholder="Contraseña" />
            </br>
            <div class="wrapper">
               <input class="btn btn-primary btn-bloque" type="submit" value="login">
            </form>
            </div>
            </div>
        </div>
    </div>
</div> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Diseño y Publicidad" content="">
        <meta name="Central de Diseño" content="">
        <link rel="icon" href="img/favicon.ico">
        <title>Central de Diseño - Login</title>
        <!-- Bootstrap core CSS -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
                <!--Inicio del formulario de Iniciar sesion-->
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="well"> <!--hace un sombreado a la columna-->
                            <center>
                                <h3><strong>INICIAR SESION</strong></h3><br>
                                <img src="usuario.png" class="img-circle" width="150" height="150">
                                
                                <br><br><br>
                                
                                <form action="?c=Usuario&a=Sesiones" method="POST">
                                    <div class="form-group">
                                      <label for="usuario">USUARIO</label>
                                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="user">
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                      <label for="pass">CONTRASEÑA</label>
                                        <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass">   
                                    </div>  
                                    <br><br>
                                    <input type="hidden" name="envio">
                                    <p><input type="submit" id="enviar" class="btn btn-success" value="INICIAR SESIÓN" name="btn_index">
                                     <a class="btn btn btn-danger" href="http://www.dostinhurtado.com" role="button">SALIR</a></p>
                                </form>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
              </div>
            </div>
            </form>   
	


<!--verifiacar las inserciones de cada vez q se hace un refresh-->