<?php
    /* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
    session_start(); //inicia la session, la cual permite trabajar con la variable $_SESSION

    $usuario=(isset($_SESSION['usuario']))?$_SESSION['usuario']:"";//toma el valor que se guarda en la variable vista que está en la variable $_SESSION
    $msj=(isset($_SESSION['msj']))?$_SESSION['msj']:"";//toma el valor que se guarda en la variable vista que está en la variable $_SESSION
    $vista=(isset($_GET['vista']))?$_GET['vista']:"";//toma el valor que se guarda en la variable vista que está en la URL.
    if(!$usuario)  //verifica si existe algún usuario logueado en el arreglo usuario de la variable $_SESSION
    {
        echo '<script>alert("Acceso Denegado! Usted no tiene una sesión iniciada en el sistema.");window.location.href="../index.php";</script>'; // Si no existe un usuario logeado entonces le mostraŕa un mensaje y lo sacará para el inicio! 
    }
    if($msj)  //verifica si existe algún texto en el arreglo msj de la variable $_SESSION
    {
        echo '<script>alert("'.$msj.'");</script>';// si existia un mensaje este lo imprime mediante 
        unset($_SESSION['msj']);//borra lo que habia en la variable.
    }

    require_once('../clases/clase_rol.php');//Trae el archivo clase_rol.php para instanciarlo
    require_once('../libreria/utilidades.php');//Trae el archivo utilidades.php para luego instanciarlo
    require_once('../clases/clase_bitacora.php');//Trae el archivo utilidades.php para luego instanciarlo
    $lobjRol=new clsRol;//Instancia la clase clsRol en $lobjRol, para poder usar sus metodos y atributos 
    $lobjUtil=new clsUtil;//Instancia la clase clsUtil en $lobjRol, para poder usar sus metodos 
    $lobjBitacora=new clsBitacora;//Instancia la clase clsUtil en $lobjRol, para poder usar sus metodos
    $menu='';//Declaro la variable $menu
    $lobjRol->set_Rol($_SESSION['idrol']);//Aquí se envia  mediante un metodo SET a la clase rol el idrol del usuario (que se guardo cuando se logueo en el sistema).
    $laModulos=$lobjRol->consultar_modulos();//Se consultan y se guardan en la variable $laModulos los módulos que tiene asignado el rol del usuario,

    $Acceso_servicio=false;//Para verificar que el usuario no entre a un servicio que no tiene asignado declaro una variable como false, y luego la cambiaré a true si alguno de los servicios que tiene asignado el usuario es igual a la direccion a la que está entrando.

    for($i=0;$i<count($laModulos);$i++) //Se recorre un ciclo para poder extraer los datos de cada uno de los módulos que tiene asignado el rol
    {
        // se arma en la variable $menu todo el menu que se le mostrará al usuario
        $menu.='<li class="dropdown">'; 
        $menu.='<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$laModulos[$i][1].'<b class="caret"></b></a>';//Aquí se guar el nombre del módulo y los servicios de este modulo se van a ir anidando a partir de aquí.
        $menu.='<ul class="dropdown-menu">';

        $laServicios=$lobjRol->consultar_servicios($laModulos[$i][0]); // aquí se consultan y guardan en la variable $laServicios los servicios que tiene registrado este módulo.
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        { 
            if($laServicios[$j][3])//Sí el servicio es visible para el menú lo agrega, sino no
            {    
                $menu.='<li><a href="?vista='.$laServicios[$j][2].'">'.$laServicios[$j][1].'</a></li>'; //aqui se van agregando cada uno de los servicios al menú.
            }
            if($vista=="" || $vista==$laServicios[$j][2])//aquí voy comparando los servicios del usuario con la direccion a la cual a entrado.
            {
                $Acceso_servicio=true;

            }                                       
        } 
        $menu.='</ul>'; 
        $menu.='</li>'; //se cierra la construccion del menú
    }


    $lcReal_ip=$lobjUtil->get_real_ip();//Ejecuta el función get_real_ip para saber la IP de el usuario.
    $lcDireccion=$_SERVER['REQUEST_URI'];//obtiene la direccion en la que se encuentra el usuario
    $ldFecha=date('Y-m-d h:m');//obtiene la fecha actual

    $lobjBitacora->set_Datos($lcDireccion,$ldFecha,$lcReal_ip,'','','',$_SESSION['usuario'],$Acceso_servicio); //envia los datos a la clase bitacora
    $lnHecho=$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.

    if(!$Acceso_servicio)  //verifica si existe algún usuario logueado en el arreglo usuario de la variable $_SESSION
    {
        echo '<script>alert("Acceso Denegado! Usted no tiene el acceso permitido a este servicio del sistema.");window.location.href="intranet.php";</script>'; // Si no tiene asignado el servicio al cual intentó entrar, entonces lo manda al inicio de la intranet.! 
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="es" class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="SHORT ICON" href="../bootstrap/img/favicon.ico" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Aulafrontino | Intranet</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../bootstrap/css/main.css">
        <link href="../libreria/css/datatable/jquery-ui-1.8.4.custom.css" rel="stylesheet" type="text/css" />
        <link href="../libreria/css/formularios.css" rel="stylesheet" type="text/css" />
        <script src="../bootstrap/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <link href="../bootstrap/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script>window.jQuery || document.write('<script src="../bootstrap/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="../bootstrap/js/vendor/bootstrap.min.js"></script>

        <script src="../bootstrap/js/plugins.js"></script>
        <script src="../bootstrap/js/main.js"></script>
        <!--datatable-->
        <script type="text/javascript" language="javascript" src="../libreria/js/datatable/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8">
                $(document).ready(function() {
                    oTable = $('#filtro').dataTable({
                        "bJQueryUI": true,
                        "sPaginationType": "full_numbers",
                        "iDisplayLength": 5                    
                    });
                } );
        </script>
        <script type="text/javascript">
            $(function () {
                $("[data-toggle='popover']").popover();
            });
        </script>
        <!--datatable-->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <header class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="intranet.php"><img src="../bootstrap/img/logo_af.png" width="200px" height="50px"></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <?php
                                echo $menu; //se imprime el menú construido
                            ?>
                        </ul>
                    </div><!--/.nav-collapse -->
                     <form class="navbar-form pull-right" name="form_intranet" action="../controlador/control_acceso.php" method="POST">
                            <input type="submit" name="salir" class="btn" value="Salir">
                        </form>
                </div>
            </div>
        </header>

        <section class="container-fluid">
            
            <div class="span12" style="display:block;">
                <?php
                     if(file_exists($vista.'.php')) //verifica el contenido de la variable vista.
                {
                        include($vista.'.php');// y si exite el archivo que trae este incluirá el cintenido
                }   
                else
                {
                    include_once("panel_inicio.php");// Si no exite o no tiene nada la variable vista entonces trae por defecto la vista panel_inicio.php
                }
                    
                ?>
                    
            </div>
    

            <footer style="text-align:center;" class="col-lg-12 span12 pull-left" >
                <p >&copy; Equipo de desarrollo aulafrontino.</p>
            </footer>

        </section> <!-- /container -->

        
    </body>
</html>

