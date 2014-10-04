<?php
	/* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
	require_once('../nucleo/ModeloConect.php');

	class clsUsuario extends ModeloConect
	{
		private $lcUsuario;
		private $lcClave;
		private $lnIdRol;
		private $lnIdPersona;


		function set_Usuario($pcUsuario)
		{
			$this->lcUsuario=$pcUsuario;
		}

		function set_Clave($pcClave)
		{
			$this->lcClave=$pcClave;
		}

		function set_Rol($pcIdRol)
		{
			$this->lnIdRol=$pcIdRol;
		}

		function set_Persona($pnIdPersona)
		{
			$this->lnIdPersona=$pnIdPersona;
		}

		function consultar()
		{
			$this->conectar();
			$sql="SELECT * FROM tusuario WHERE idtusuario='$this->lcUsuario' ";
			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$Fila[0]=$laRow['idtusuario'];
				$Fila[1]=$laRow['claveusu'];
				$Fila[2]=$laRow['trol_idtrol'];
				$Fila[3]=$laRow['tpersona_idtpersona'];
			}
			$this->desconectar();
			return $Fila;
		}

		function login()
		{
			$this->conectar();
			$Fila[0]=0;
			$sql="SELECT idtusuario,nombrerol,idtrol,idtpersona FROM tusuario,trol,tpersona WHERE idtusuario='$this->lcUsuario' AND tpersona_idtpersona=idtpersona AND claveusu=md5('$this->lcClave') AND trol_idtrol=idtrol ";
			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$Fila[0]=$laRow['idtusuario'];
				$Fila[1]=$laRow['nombrerol'];
				$Fila[2]=$laRow['idtrol'];
				$Fila[3]=$laRow['idtpersona'];
			}
			$this->desconectar();
			return $Fila;
		}
	}
?>