<?php
  /**
  * Inicio del sistema
  *
  * @package    ModeloAulafrontino
  * @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
  * @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
  * @link       https://github.com/EquipoAulaFrontino
  * @version    v1.0
  */
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
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="SHORT ICON" href="bootstrap-3/img/favicon.ico">
    <title>Modelo de seguridad</title>
    <!-- CSS -->
    <link href="bootstrap-3/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3/css/style-home.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- EMPIEZA: MENU SUPERIOR -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#myCarousel"><img height="100%;" src="bootstrap-3/img/logo_af.png"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#myCarousel">INICIO</a></li>
            <li><a href="#acerca">ACERCA</a></li>
            <li><a href="#contacto">CONTACTO</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">MENÚ <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Opción</a></li>
                <li><a href="#">Otra opción</a></li>
                <li class="divider"></li>
                <li><a href="#">Separación</a></li>
                <li class="divider"></li>
                <li><a href="#">Mas opciones</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-right" action="controlador/control_acceso.php" method="POST" role="search">
            <div class="form-group">
              <input type="text" class="form-control input-sm" name="usuario" placeholder="Usuario">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-sm" name="clave" placeholder="Clave">
            </div>
            <input type="submit" name="entrar" class="btn btn-danger btn-sm" value="Entrar"/>
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!-- FIN: MENU SUPERIOR -->
    <!-- EMPIEZA: SLIDER -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="bootstrap-3/img/slider/img1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Texto ejemplo slide 1</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p><a class="btn btn-lg btn-danger" href="#" role="button">Enlace</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="bootstrap-3/img/slider/img2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Texto ejemplo slide 2</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="bootstrap-3/img/slider/img3.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Texto ejemplo slide 3</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p><a class="btn btn-lg btn-danger" href="#" role="button">Enlace</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    <!-- FIN: SLIDER -->
    <!-- EMPIEZA: CONTENEDOR -->
    <div class="container marketing">
      <!-- Three columns of text below the carousel -->
      <div id="acerca" class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="bootstrap-3/img/icon3.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Modelo de seguridad</h2>
          <p>Este es un pequeño modulo de seguridad que busca mostrar de forma sencilla el método de asignación de módulos y servicios mediante roles a usuario, de forma tal que se pueda mejorar la seguridad lógica de los sistemas. Para entrar al sistema puedes entrar con el usuario : <strong>Administrador</strong>, Clave: <strong>Administrador</strong>, usuario : <strong>Estudiante</strong>, Clave: <strong>Estudiante</strong> y con el Usuario: <strong>Profesor</strong>, Clave: <strong>Profesor</strong>.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="bootstrap-3/img/icon1.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Diseño</h2>
          <p>Este el diseño del modelo está hecho con bootstrap, que no es mas que un framework, que nos permite usar una gran variedad de estilos y herramientas tanto de css como de javascript, y de esta forma hacernos la vida más fácil con los formulario y la maquetacion de las paginas, solo hay que leer un poco.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="bootstrap-3/img/icon2.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Vistas</h2>
          <p>El sistema cuenta con un sistema de vistas dinámicas, lo cual nos permite utilizar un cuerpo como base para todos los enlaces a los cuales queramos accesar mediante el uso de variables en los mismos enlaces.</p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      <!-- START THE FEATURETTES -->
      <hr class="featurette-divider">
      <div class="row featurette">
        <div class="col-md-9">
          <h2 class="featurette-heading">Acerca <span class="text-muted"></span></h2>
          <p>Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-3">
          <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="500x500" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjI1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjMxcHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NTAweDUwMDwvdGV4dD48L3N2Zz4=">
        </div>
      </div>
      <hr class="featurette-divider">
      <div class="row featurette" id="contacto">
        <div class="col-md-12">
          <h2 class="featurette-heading">Contacto <span class="text-muted"></span></h2>
          <p class="lead">Puedes enviarnos tus inquietudes, comentarios, sugerencias y/o recomendaciones a través del siguiente formulario.</p>
          <p>Ingresa tus datos de contacto, un mensaje corto abajo y lo contestaremos lo más pronto posible.</p>
          <div class="row">
            <div class="col-md-8 center-block">
              <form role="form ">
                <div class="form-group">
                  <label for="exampleInputEmail1">Correo</label>
                  <input type="email" class="form-control" id="" name="" placeholder="Escribe tu correo">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nombre</label>
                  <input type="text" class="form-control" id="" name="" placeholder="Escribe tu nombre">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Apellido</label>
                  <input type="text" class="form-control" id="" name="" placeholder="Escribe tu apellido">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Mensaje</label>
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-danger">Enviar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <hr class="featurette-divider">
      <!-- /END THE FEATURETTES -->
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#myCarousel">Subir</a></p>
        <p>© Equipo de desarrollo aulafrontino | <a href="#">Condiciones de uso</a></p>
      </footer>
    </div>
    <!-- FIN: CONTENEDOR -->
    <!-- jQuery (necesario para los plugins de bootstrap) -->
    <script src="bootstrap-3/DataTables-1.10.2/media/js/jquery.js"></script>
    <!-- Incluye todos los plugins después de esta línea -->
    <script src="bootstrap-3/js/bootstrap.min.js"></script>
    <!-- Scipt para el SLOW SCROLL -->
    <script>
      $(document).ready(function(){
        $('a[href^="#"]').on('click',function (e) {
            e.preventDefault();
            var target = this.hash,
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 900, 'swing', function () {
                window.location.hash = target;
            });
        });
      });
    </script>
  </body>
</html>