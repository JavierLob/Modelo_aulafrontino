<?php
	require_once('../nucleo/ModeloConect.php');
	class clsAsignatura extends ModeloConect
	{
		private $lnIdAsignatura;
		private $lcCodigo;
		private $lcNombre;
		private $lcDescripcion;
		private $lnAno;
		private $lnUnidad;
		private $lcObservacion;
		private $lnHoras;
		private $llEstatus;

		public function __construct() 
		{
	        $this->lnIdAsignatura = 0;
	        $this->lcCodigo = '';
	        $this->lcNombre = '';
	        $this->lcDescripcion = '';
	        $this->lnAno = 0;
	        $this->lnUnidad = 0;
	        $this->lcObservacion = '';
	        $this->lnHoras = 0;
	        $this->llEstatus = true;
    	}

		function set_Asignatura($pnIdAsignatura)
		{
			$this->lnIdAsignatura=$pnIdAsignatura;
		}

		function set_Codigo($pcCodigo)
		{
			$this->lcCodigo=$pcCodigo;
		}

		function set_Nombre($pcNombre)
		{
			$this->lcNombre=$pcNombre;
		}

		function set_Descripcion($pcDescripcion)
		{
			$this->lcDescripcion=$pcDescripcion;
		}

		function set_Ano($pnAno)
		{
			$this->lnAno=$pnAno;
		}

		function set_Unidad($pnUnidad)
		{
			$this->lnUnidad=$pnUnidad;
		}

		function set_Observacion($pcObservacion)
		{
			$this->lcObservacion=$pcObservacion;
		}

		function set_Horas($pnHoras)
		{
			$this->lnHoras=$pnHoras;
		}
		function set_Estatus($plEstatus)
		{
			$this->llEstatus=$plEstatus;
		}

		function listar_asignaturas()
		{
			$this->conectar();
			$cont=0;
			$sql="SELECT * FROM tasignatura ";
			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont]['idasignatura']=$laRow['idasignatura'];
				$Fila[$cont]['codigoasi']=$laRow['codigoasi'];
				$Fila[$cont]['nombreasi']=$laRow['nombreasi'];
				$Fila[$cont]['descripcionasi']=$laRow['descripcionasi'];
				$Fila[$cont]['anoasi']=$laRow['anoasi'];
				$Fila[$cont]['unidad_creditoasi']=$laRow['unidad_creditoasi'];
				$Fila[$cont]['observacionasi']=$laRow['observacionasi'];
				$Fila[$cont]['horas_duracionasi']=$laRow['horas_duracionasi'];
				$Fila[$cont]['estatusasi']=$laRow['estatusasi'];
				$cont++;
			}
			$this->desconectar();
			return $Fila;
		}

		function listar_asignaturas_activas()
		{
			$this->conectar();
			$cont=0;
			$sql="SELECT * FROM tasignatura WHERE estatusasi='1'";
			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont]['idasignatura']=$laRow['idasignatura'];
				$Fila[$cont]['codigoasi']=$laRow['codigoasi'];
				$Fila[$cont]['nombreasi']=$laRow['nombreasi'];
				$Fila[$cont]['descripcionasi']=$laRow['descripcionasi'];
				$Fila[$cont]['anoasi']=$laRow['anoasi'];
				$Fila[$cont]['unidad_creditoasi']=$laRow['unidad_creditoasi'];
				$Fila[$cont]['observacionasi']=$laRow['observacionasi'];
				$Fila[$cont]['horas_duracionasi']=$laRow['horas_duracionasi'];
				$Fila[$cont]['estatusasi']=$laRow['estatusasi'];
				$cont++;
			}
			$this->desconectar();
			return $Fila;
		}

		
		function consultar_asignatura()
		{
			$this->conectar();
			$sql="SELECT * FROM tasignatura WHERE idasignatura='$this->lnIdAsignatura'";
			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$Fila['idasignatura']=$laRow['idasignatura'];
				$Fila['codigoasi']=$laRow['codigoasi'];
				$Fila['nombreasi']=$laRow['nombreasi'];
				$Fila['descripcionasi']=$laRow['descripcionasi'];
				$Fila['anoasi']=$laRow['anoasi'];
				$Fila['unidad_creditoasi']=$laRow['unidad_creditoasi'];
				$Fila['observacionasi']=$laRow['observacionasi'];
				$Fila['horas_duracionasi']=$laRow['horas_duracionasi'];
				$Fila['estatuasi']=$laRow['estatuasi'];
			}
			$this->desconectar();
			return $Fila;
		}


		function registrar_asignatura()
		{
			$this->conectar();
			$sql="INSERT INTO tasignatura (codigoasi,nombreasi,descripcionasi,anoasi,unidad_creditoasi,observacionasi,horas_duracionasi,estatusasi)
				VALUES
				('$this->lcCodigo','$this->lcNombre','$this->lcDescripcion','$this->lnAno','$this->lnUnidad','$this->lcObservacion','$this->lnHoras','1')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function desactivar_asignatura()
		{
			$this->conectar();
			$sql="UPDATE tasignatura SET estatusasi='0' WHERE idasignatura='$this->lnIdAsignatura' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function activar_asignatura()
		{
			$this->conectar();
			$sql="UPDATE tasignatura SET estatusasi='1' WHERE idasignatura='$this->lnIdAsignatura' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function editar_asignatura()
		{
			$this->conectar();
			$sql="UPDATE tasignatura SET 
					codigoasi='$this->lcCodigo',nombreasi='$this->lcNombre',descripcionasi='$this->lcDescripcion',
					anoasi='$this->lnAno',unidad_creditoasi='$this->lnUnidad',observacionasi='$this->lcObservacion
					',horas_duracionasi='$this->lnHoras' 
					WHERE idasignatura='$this->lnIdAsignatura' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		//ESTA FUNCIÓN DEBE PERTENECER A LA CLASE EL PROFESOR, TRASLADAR UNA VEZ SE HAGA LA CLASE PROFESOR
		
		function listar_profesores_activos()
		{
			$this->conectar();
			$cont=0;
			$sql="SELECT * FROM tprofesor WHERE estatuspro='1'";
			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont]['idprofesor']=$laRow['idprofesor'];
				$Fila[$cont]['cedulapro']=$laRow['cedulapro'];
				$Fila[$cont]['nombre_unopro']=$laRow['nombre_unopro'];
				$Fila[$cont]['apellido_unopro']=$laRow['apellido_unopro'];
				$Fila[$cont]['estatuspro']=$laRow['estatuspro'];
				$cont++;
			}
			$this->desconectar();
			return $Fila;
		}

		
	}
?>
