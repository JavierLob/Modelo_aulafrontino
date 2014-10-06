<?php
	/**
	* Clase usuario
	*
	* @package    ModeloAulafrontino
	* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
	* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
	* @link       https://github.com/EquipoAulaFrontino
	* @version    v1.0
	*/require_once('../nucleo/ModeloConect.php');

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