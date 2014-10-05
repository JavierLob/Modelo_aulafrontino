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

/*tinscripcion
Columna	Tipo	Nulo	Predeterminado	Enlaces a 	Comentarios
idinscripcion 	int(11)	No 	  	  	 
idestudiante 	int(11)	No 	  	testudiante -> idestudiante  	 
idcurso 	int(11)	No 	  	tcurso -> idcurso  	 
fecha_inscripcion 	timestamp	No 	CURRENT_TIMESTAMP  	  	 
estatus */
		

	}
?>
