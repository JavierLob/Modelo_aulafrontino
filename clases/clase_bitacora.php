<?php
	/* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
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