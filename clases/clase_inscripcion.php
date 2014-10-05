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

    	function set_Inscripcion($pnInscripcion)
		{
			$this->lnInscripcion=$pnInscripcion;
		}

		function set_Estudiante($pnEstudiante)
		{
			$this->lnEstudiante=$pnEstudiante;
		}

		function set_Curso($pnCurso)
		{
			$this->lnCurso=$pnCurso;
		}

		function set_Fecha($pdFecha)
		{
			$this->ldFecha_Inscripcion=$pdFecha;
		}

		function set_Estatus($plEstatus)
		{
			$this->llEstatus=$plEstatus;
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