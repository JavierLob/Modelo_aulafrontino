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
        $menu.='<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$laModulos[$i][1].'<span class="caret"></span></a>';//Aquí se guar el nombre del módulo y los servicios de este modulo se van a ir anidando a partir de aquí.
        $menu.='<ul class="dropdown-menu" role="menu">';

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
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="SHORT ICON" href="../bootstrap-3/img/favicon.ico">
    <title>Modelo de seguridad</title>
    <!-- CSS -->
    <link href="../bootstrap-3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap-3/css/style-intranet.css" rel="stylesheet">
    <link href="../bootstrap-3/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link href="../bootstrap-3/DataTables-1.10.2/media/css/jquery.dataTables.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="../bootstrap-3/DataTables-1.10.2/media/js/jquery.js"></script>
  </head>
  <body>
    <!-- EMPIEZA: MENU SUPERIOR -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img height="100%;" src="../bootstrap-3/img/logo_af.png"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav movil">
            <li class="active"><a href="intranet.php">Inicio</a></li>          
            <?php echo $menu;?>
          </ul>
          <div class="navbar-form navbar-right">
                <form name="form_intranet" action="../controlador/control_acceso.php" method="POST">
                    <input type="submit" name="salir"  class="btn btn-danger" value="Salir">
                </form>
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!-- FIN: MENU SUPERIOR -->
    <!-- EMPIEZA: CONTENEDOR -->
    <div class="container-fluid">
      <div class="row">
        <!-- EMPIEZA: SIDEBAR -->
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="intranet.php">Inicio</a></li>          
            <?php echo $menu;?>
          </ul>
        </div>
        <!-- FIN: SIDEBAR -->
        <!-- EMPIEZA: CUERPO -->
        <div class="col-sm-9 col-md-10 main">
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

          <!-- EMPIEZA: PIE -->
          <footer>© Equipo de desarrollo aulafrontino.</footer>
          <!-- FIN: PIE -->
        </div>
        <!-- FIN: CUERPO -->
      </div>
    </div>
    <!-- FIN: CONTENEDOR -->
    <!-- jQuery (necesario para los plugins de bootstrap) -->
    <!-- Incluye todos los plugins después de esta línea -->
    <script src="../bootstrap-3/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="../bootstrap-3/DataTables-1.10.2/media/js/jquery.dataTables.js"></script>
    <script src="../bootstrap-3/datepicker/js/bootstrap-datepicker.js"></script>    
    <script type="text/javascript">
        $(document).ready(function() {
        $('#filtro').dataTable();
    } );
        $(function () {
            $("[data-toggle='popover']").popover();
        });

    </script>
  </body>
</html>