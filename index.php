<?php
    /* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */

    session_start(); //inicia la session, la cual permite trabajar con la variable $_SESSION
    $msj=(isset($_SESSION['msj']))?$_SESSION['msj']:"";
    $vista=(isset($_GET['vista']))?$_GET['vista']:"";//toma el valor que se guarda en la variable vista que está en la URL.
    if($msj) //verifica si existe algún texto en el arreglo msj de la variable $_SESSION
    {
        echo '<script>alert("'.$msj.'");</script>'; // si existia un mensaje este lo imprime mediante un alert!
        unset($_SESSION['msj']); //borra lo que habia en la variable.
    }
?>
<!DOCTYPE html>
<html lang="es" class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="SHORT ICON" href="bootstrap/img/icon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>La hoja geek | Inicio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="bootstrap/css/main.css">

        <script src="bootstrap/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <header class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.php">La hoja geek</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="index.php">Inicio</a></li>
                            <li><a href="?vista=acerca">Acerca</a></li>
                            <li><a href="?vista=contactanos">Contacto</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menú <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="?vista=accion">Acción</a></li>
                                    <li><a href="?vista=otra_accion">Otra acción</a></li>
                                    <li><a href="?vista=otra_cosa_aqui">Otra cosa aqui</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Titulo de separacion</li>
                                    <li><a href="?vista=enlace_separado">enlace separado</a></li>
                                    <li><a href="?vista=otro_enlace_separado">otro enlace separado</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form pull-right" name="form_intranet" action="controlador/control_acceso.php" method="POST">
                            <input class="span2" type="text" name="usuario" placeholder="Usuario">
                            <input class="span2" type="password" name="clave" placeholder="Clave">
                            <input type="submit" name="entrar" class="btn" value="Entrar">
                        </form>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </header>

        <section class="container">
            <!--COMIENZA EL CARROUSEL-->
            <div id="carousel-example-generic" class="carousel slide">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              </ol>
              <div class="carousel-inner" >
                <div class="item active">
                  <img src="bootstrap/img/lahojageek_small.png" style="height:300px;width:100%" class="img-responsive" alt="Perry programando">
                  <div class="carousel-caption">
                    <p class="text-muted">La hoja geek.</p>
                  </div>
                </div>
                <!--<div class="item">
                  <img src="bootstrap/img/lahojageek_small.png" style="height:300px;width:100%" class="img-responsive" alt="Perry en la pc">
                   <div class="carousel-caption">
                        <p class="text-muted">Perry hablando por skype con sus amigos.</p>
                  </div>
                </div>-->
            
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="icon-prev"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="icon-next"></span>
              </a>
            </div>
            <!--FIN EL CARROUSEL-->
            <!--COMIENZA EL CONTENIDO DE LA VISTA-->
            <?php
                if(file_exists('vista/'.$vista.'.html')) //verifica el contenido de la variable vista.
                {
                        include('vista/'.$vista.'.html');// y si exite el archivo que trae este incluirá el cintenido
                }   
                else
                {
                    include('vista/index.html');// Si no exite o no tiene nada la variable vista entonces trae por defecto la vista index.html
                }
            ?>            

            <hr>

            <footer>
                <p>&copy; Javier Martín 2013</p>
            </footer>

        </section> <!-- /container -->

        <script src="bootstrap/js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="bootstrap/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="bootstrap/js/vendor/bootstrap.min.js"></script>

        <script src="bootstrap/js/plugins.js"></script>
        <script src="bootstrap/js/main.js"></script>

    </body>
</html>
