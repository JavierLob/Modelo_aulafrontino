<?php
	/* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
	require_once('../nucleo/ModeloConect.php');
	class clsServicio extends ModeloConect
	{
		private $lcIdServicio;
		private $lcNombre;
		private $lcEnlace;
		private $lcModulo;

		function set_Servicio($pcIdServicio)
		{
			$this->lcIdServicio=$pcIdServicio;
		}

		function set_Nombre($pcNombre)
		{
			$this->lcNombre=$pcNombre;
		}

		function set_Enlace($pcEnlace)
		{
			$this->lcEnlace=$pcEnlace;
		}

		function set_Modulo($pcModulo)
		{
			$this->lcModulo=$pcModulo;
		}

		function consultar_servicios()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idtservicio,nombreser,enlaceser,nombremod FROM tservicio,tmodulo WHERE tservicio.tmodulo_idtmodulo=tmodulo.idtmodulo ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idtservicio'];
					$Fila[$cont][1]=$laRow['nombreser'];
					$Fila[$cont][2]=$laRow['enlaceser'];
					$Fila[$cont][3]=$laRow['nombremod'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_servicios_modulo($idmodulo)
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idtservicio,nombreser,enlaceser,nombremod FROM tservicio,tmodulo WHERE tmodulo_idtmodulo='$idmodulo' AND tmodulo_idtmodulo=idtmodulo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idtservicio'];
					$Fila[$cont][1]=$laRow['nombreser'];
					$Fila[$cont][2]=$laRow['enlaceser'];
					$Fila[$cont][3]=$laRow['nombremod'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_servicio()
		{
			$this->conectar();
				$sql="SELECT idtservicio,nombreser,enlaceser,tmodulo_idtmodulo FROM tservicio WHERE idtservicio='$this->lcIdServicio'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idtservicio'];
					$Fila[1]=$laRow['nombreser'];
					$Fila[2]=$laRow['enlaceser'];
					$Fila[3]=$laRow['tmodulo_idtmodulo'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function registrar_servicio()
		{
			$this->conectar();
			$sql="INSERT INTO tservicio (nombreser,enlaceser,tmodulo_idtmodulo)VALUES('$this->lcNombre','$this->lcEnlace','$this->lcModulo')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_servicio()
		{
			$this->conectar();
			$sql="DELETE FROM tservicio WHERE idtservicio='$this->lcIdServicio' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function editar_servicio()
		{
			$this->conectar();
			$sql="UPDATE tservicio SET nombreser='$this->lcNombre',enlaceser='$this->lcEnlace',tmodulo_idtmodulo='$this->lcModulo' WHERE idtservicio='$this->lcIdServicio' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
	}
?>