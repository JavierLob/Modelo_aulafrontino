<?php
	/* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
	require_once('../nucleo/ModeloConect.php');
	class clsModulo extends ModeloConect
	{
		private $lcIdModulo;
		private $lcNombre;

		function set_Modulo($pcIdModulo)
		{
			$this->lcIdModulo=$pcIdModulo;
		}

		function set_Nombre($pcNombre)
		{
			$this->lcNombre=$pcNombre;
		}

		function consultar_modulos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idtmodulo,nombremod FROM tmodulo ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idtmodulo'];
					$Fila[$cont][1]=$laRow['nombremod'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_modulo()
		{
			$this->conectar();
				$sql="SELECT idtmodulo,nombremod FROM tmodulo WHERE idtmodulo='$this->lcIdModulo'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idtmodulo'];
					$Fila[1]=$laRow['nombremod'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function registrar_modulo()
		{
			$this->conectar();
			$sql="INSERT INTO tmodulo (nombremod)VALUES('$this->lcNombre')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_modulo()
		{
			$this->conectar();
			$sql="DELETE FROM tmodulo WHERE idtmodulo='$this->lcIdModulo' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function editar_modulo()
		{
			$this->conectar();
			$sql="UPDATE tmodulo SET nombremod='$this->lcNombre' WHERE idtmodulo='$this->lcIdModulo' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
	}
?>