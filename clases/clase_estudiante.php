<?php
	require_once('../nucleo/ModeloConect.php');
	class clsEstudiante extends ModeloConect
	{
		
		private $lnIdestudiante;
		private $lcCedula;
		private $lcNombreuno;
		private $lcNombredos;
		private $lcApellidouno;
		private $lcApellidodos;
		private $lcSexo;
		private $lcDireccion;
		private $lnTelefonoMovil;
		private $lnTelefonoHab;
		private $lcCorreo;
		private $llEstatus;

		public function __construct() 
		{
	        $this->lnIdestudiante = 0;
	        $this->lcCedula = '';
	        $this->lcNombreuno = '';
	        $this->lcNombredos = '';
	        $this->lcApellidouno = '';
	        $this->lcApellidodos = '';
	        $this->lcSexo='';
	        $this->lcDireccion = '';
	        $this->lnTelefonoMovil = 0;
	        $this->lnTelefonoHab = 0;
	        $this->lcCorreo = '';
	        $this->llEstatus = true;
    	}
		
		public function set_Estudiante($pnIdestudiante)
		{
			$this->lnIdestudiante = $pnIdestudiante;
		}

		public function set_Cedula($pcCedula)
		{
			$this->lcCedula = $pcCedula;
		}

		public function set_Nombreuno($pcNombreuno)
		{
			$this->lcNombreuno = $pcNombreuno;
		}

		public function set_Nombredos($pcNombredos)
		{
			$this->lcNombredos = $pcNombredos;
		}

		public function set_Apellidouno($pcApellidouno)
		{
			$this->lcApellidouno = $pcApellidouno;
		}

		public function set_Apellidodos($pcApellidodos)
		{
			$this->lcApellidodos = $pcApellidodos;
		}

		public function set_Sexo($pcSexo)
		{
			$this->lcSexo = $pcSexo;
		}

		public function set_Direccion($pcDireccion)
		{
			$this->lcDireccion = $pcDireccion;
		}

		public function set_Telefonomovil($pnTelefonoMovil)
		{
			$this->lnTelefonoMovil = $pnTelefonoMovil;
		}

		public function set_Telefonohab($pnTelefonoHab)
		{
			$this->lnTelefonoHab = $pnTelefonoHab;
		}

		public function set_Correo($pcCorreo)
		{
			$this->lcCorreo = $pcCorreo;
		}

		public function set_Estatus($plEstatus)
		{
			$this->llEstatus = $plEstatus;
		}

		public function consultar_estudiante()
		{
			$laEstudiante = array();
			$this->conectar();
			$sql = "SELECT * FROM testudiante WHERE idestudiante='$this->lnIdestudiante';";
			$pcsql = $this->filtro($sql);
			while($laRow = $this->proximo($pcsql))
			{
				$laEstudiante['idestudiante']	= $laRow['idestudiante'];
				$laEstudiante['cedulaest']		= $laRow['cedulaest'];
				$laEstudiante['nombre_unoest']	= $laRow['nombre_unoest'];
				$laEstudiante['nombre_dosest']	= $laRow['nombre_dosest'];
				$laEstudiante['apellido_unoest']= $laRow['apellido_unoest'];
				$laEstudiante['apellido_dosest']= $laRow['apellido_dosest'];
				$laEstudiante['sexoest']= $laRow['sexoest'];
				$laEstudiante['direccionest']	= $laRow['direccionest'];
				$laEstudiante['telefono_movest']= $laRow['telefono_movest'];
				$laEstudiante['telefono_habest']= $laRow['telefono_habest'];
				$laEstudiante['correoest']		= $laRow['correoest'];
				$laEstudiante['estatusest']		= $laRow['estatusest'];
			}
			$this->desconectar();
			return $laEstudiante;
		}

		public function listar_estudiantes()
		{
			$laEstudiante = array();
			$cont = 0;
			$this->conectar();
			$sql = "SELECT * FROM testudiante;";
			$pcsql = $this->filtro($sql);
			while($laRow = $this->proximo($pcsql))
			{
				$laEstudiante[$cont]['idestudiante']	= $laRow['idestudiante'];
				$laEstudiante[$cont]['cedulaest']		= $laRow['cedulaest'];
				$laEstudiante[$cont]['nombre_unoest']	= $laRow['nombre_unoest'];
				$laEstudiante[$cont]['nombre_dosest']	= $laRow['nombre_dosest'];
				$laEstudiante[$cont]['apellido_unoest']	= $laRow['apellido_unoest'];
				$laEstudiante[$cont]['apellido_dosest']	= $laRow['apellido_dosest'];
				$laEstudiante[$cont]['sexoest']			= $laRow['sexoest'];
				$laEstudiante[$cont]['direccionest']	= $laRow['direccionest'];
				$laEstudiante[$cont]['telefono_movest']	= $laRow['telefono_movest'];
				$laEstudiante[$cont]['telefono_habest']	= $laRow['telefono_habest'];
				$laEstudiante[$cont]['correoest']		= $laRow['correoest'];
				$laEstudiante[$cont]['estatusest']		= $laRow['estatusest'];
				$cont++;
			}
			$this->desconectar();
			return $laEstudiante;
		}

		public function registrar_estudiante()
		{
			$this->conectar();
			$sql = "INSERT INTO `testudiante` 
					(`cedulaest`, `nombre_unoest`, `nombre_dosest`, `apellido_unoest`
						, `apellido_dosest`, `direccionest`, `sexoest`, `telefono_movest`, `telefono_habest`, `correoest`) 
					VALUES 
					('$this->lcCedula', UPPER('$this->lcNombreuno'), UPPER('$this->lcNombredos'), UPPER('$this->lcApellidouno')
						,UPPER('$this->lcApellidodos'),UPPER('$this->lcDireccion'), '$this->lcSexo' ,'$this->lnTelefonoMovil','$this->lnTelefonoHab','$this->lcCorreo');";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		public function desactivar_estudiante()
		{
			$this->conectar();
			$sql="UPDATE `testudiante` SET `estatusest`='0' WHERE idestudiante='$this->lnIdestudiante';";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		public function activar_estudiante()
		{
			$this->conectar();
			$sql="UPDATE `testudiante` SET `estatusest`='1' WHERE idestudiante='$this->lnIdestudiante';";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		public function editar_estudiante()
		{
			$this->conectar();
			$sql="UPDATE `testudiante` SET 
					`nombre_unoest`=UPPER('$this->lcNombreuno'),`nombre_dosest`=UPPER('$this->lcNombredos')
					,`apellido_unoest`=UPPER('$this->lcApellidouno'),`apellido_dosest`=UPPER('$this->lcApellidodos')
					,`direccionest`=UPPER('$this->lcDireccion'), `sexoest`='$this->lcSexo', `telefono_movest`='$this->lnTelefonoMovil'
					,`telefono_habest`='$this->lnTelefonoHab',`correoest`='$this->lcCorreo' 
				  WHERE idestudiante = '$this->lnIdestudiante' ;";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
	}
?>