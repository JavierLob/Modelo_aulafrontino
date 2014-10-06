<?php
	/**
	* Clase bitacora 
	*
	* @package    ModeloAulafrontino
	* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
	* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
	* @link       https://github.com/EquipoAulaFrontino
	* @version    v1.0
	*/
	require_once('../nucleo/ModeloConect.php');

	class clsBitacora extends ModeloConect
	{
		private $lnIdBitacora;
		private $lcDireccion;
		private $ldFecha;
		private $lcIp;
		private $lcOperacion;
		private $lcValorAnterior;
		private $lcValorNuevo;
		private $lcUsuario;
		private $lcAcceso;

		function set_IdBitacora($pnIdBitacora)
		{
			$this->lnIdBitacora=$pnIdBitacora;
		}

		function set_Datos($pcDireccion,$pdFecha,$pcIp,$pcOperacion,$pcValorAnterior,$pcValorNuevo,$pcUsuario,$pcAcceso)
		{
			$this->lcDireccion=$pcDireccion;
			$this->ldFecha=$pdFecha;
			$this->lcIp=$pcIp;
			$this->lcOperacion=$pcOperacion;
			$this->lcValorAnterior=$pcValorAnterior;
			$this->lcValorNuevo=$pcValorNuevo;
			$this->lcUsuario=$pcUsuario;
			$this->lcAcceso=$pcAcceso;
		}


		function registrar_bitacora()
		{
			$this->conectar();
			$sql="INSERT INTO tbitacora (direccionbit,fechabit,ipbit,operacionbit,valoranteriorbit,nuevovalorbit,tusuario_idtusuario,accesobit)VALUES('$this->lcDireccion','$this->ldFecha','$this->lcIp','$this->lcOperacion','$this->lcValorAnterior','$this->lcValorNuevo','$this->lcUsuario','$this->lcAcceso')";
			$lcHecho=$this->ejecutar($sql);
			$this->desconectar();
			return $lcHecho;
		}
	}

?>