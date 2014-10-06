<?php
	require_once('../nucleo/ModeloConect.php');
	class clsInscripcion extends ModeloConect
	{
		private $lnInscripcion;
		private $lnEstudiante;
		private $lnCurso;
		private $ldFecha_Inscripcion;
		private $llEstatus;

		public function __construct() 
		{
	        $this->lnInscripcion 		= 0;
	        $this->lnEstudiante 		= 0;
	        $this->lnCurso 				= 0;
	        $this->ldFecha_Inscripcion 	= '';
	        $this->llEstatus 			= true;
    	}

    	public function set_Inscripcion($pnInscripcion)
		{
			$this->lnInscripcion=$pnInscripcion;
		}

		public function set_Estudiante($pnEstudiante)
		{
			$this->lnEstudiante=$pnEstudiante;
		}

		public function set_Curso($pnCurso)
		{
			$this->lnCurso=$pnCurso;
		}

		public function set_Fecha($pdFecha)
		{
			$this->ldFecha_Inscripcion=$pdFecha;
		}

		public function set_Estatus($plEstatus)
		{
			$this->llEstatus=$plEstatus;
		}

		public function registrar_inscripcion()
		{
			$this->conectar();
			$sql="INSERT INTO `tinscripcion`(`idestudiante`, `idcurso`, `estatus`) 
					VALUES 
				  ('$this->lnEstudiante','$this->lnCurso','$this->llEstatus')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		public function validar_inscripcion($idestudiante, $idcurso)
		{
			$inscrito = false;
			$this->conectar();
			$sql="SELECT * FROM tinscripcion WHERE idestudiante='$idestudiante' AND idcurso='$idcurso' AND estatus='1';";
			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$inscrito = true;
			}
			$this->desconectar();
			return $inscrito;
		}

		public function listado_clases()
		{
			$laEstudiante = array();
			$cont = 0;
			$this->conectar();
			$sql = "SELECT testudiante.* FROM testudiante, tinscripcion WHERE testudiante.idestudiante = tinscripcion.idestudiante AND tinscripcion.idcurso = '$this->lnCurso' ORDER BY apellido_unoest, apellido_dosest, nombre_unoest, nombre_dosest ASC;";
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
		

	}
?>
