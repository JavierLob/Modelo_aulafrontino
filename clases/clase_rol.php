<?php
	/**
	* Clase rol
	*
	* @package    ModeloAulafrontino
	* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
	* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
	* @link       https://github.com/EquipoAulaFrontino
	* @version    v1.0
	*/
	require_once('../nucleo/ModeloConect.php');
	class clsRol extends ModeloConect
	{
		private $lcIdRol;
		private $lcNombre;
		private $lcModulo;
		private $lcServicio;

		function set_Rol($pcIdRol)
		{
			$this->lcIdRol=$pcIdRol;
		}

		function set_Nombre($pcNombre)
		{
			$this->lcNombre=$pcNombre;
		}

		function set_Modulo($pcModulo)
		{
			$this->lcModulo=$pcModulo;
		}

		function set_Servicio($pcServicio)
		{
			$this->lcServicio=$pcServicio;
		}

		function consultar_roles()
		{
			$this->conectar();
			$cont=0;
			$sql="SELECT * FROM trol ";
			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['idtrol'];
				$Fila[$cont][1]=$laRow['nombrerol'];
				$cont++;
			}
			$this->desconectar();
			return $Fila;
		}

		function consultar_modulos()
		{
			$this->conectar();
			$cont=0;
			$sql="SELECT idtmodulo,nombremod FROM tmodulo,trol_has_tmodulo WHERE trol_idtrol='$this->lcIdRol' AND tmodulo_idtmodulo=idtmodulo";
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
		
		function consultar_servicios($IdModulo)
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idtservicio,nombreser,enlaceser,visibleser,nombremod FROM trol_has_tservicio,tservicio,tmodulo WHERE trol_idtrol='$this->lcIdRol' AND tmodulo_idtmodulo='$IdModulo' AND tservicio_idtservicio=idtservicio AND tmodulo_idtmodulo=idtmodulo ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idtservicio'];
					$Fila[$cont][1]=$laRow['nombreser'];
					$Fila[$cont][2]=$laRow['enlaceser'];
					$Fila[$cont][3]=$laRow['visibleser'];
					$Fila[$cont][4]=$laRow['nombremod'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_rol()
		{
			$this->conectar();
			$sql="SELECT * FROM trol WHERE idtrol='$this->lcIdRol'";
			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$Fila[0]=$laRow['idtrol'];
				$Fila[1]=$laRow['nombrerol'];
			}
			$this->desconectar();
			return $Fila;
		}


		function registrar_rol()
		{
			$this->conectar();
			$sql="INSERT INTO trol (nombrerol)VALUES('$this->lcNombre')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_rol()
		{
			$this->conectar();
			$sql="DELETE FROM trol WHERE idtrol='$this->lcIdRol' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function editar_rol()
		{
			$this->conectar();
			$sql="UPDATE trol SET nombrerol='$this->lcNombre' WHERE idtrol='$this->lcIdRol' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function asignar_modulo()
		{
			$this->conectar();
			$this->begin();
			$sql="DELETE FROM trol_has_tmodulo WHERE trol_idtrol='$this->lcIdRol' ";
			$this->ejecutar($sql);
			foreach ($this->lcModulo as $idModulo) 
			{
				$sql="INSERT INTO trol_has_tmodulo (trol_idtrol,tmodulo_idtmodulo)VALUES('$this->lcIdRol','$idModulo')";
				$lnHecho=$this->ejecutar($sql);
				if(!$lnHecho)
				{
					$this->rollback();
					break;
				}
			}
			if($lnHecho)
			{
				$this->commit();
			}
			$this->desconectar();
			return $lnHecho;
		}

		function asignar_servicio()
		{
			$this->conectar();
			$this->begin();
			$sql="DELETE FROM trol_has_tservicio WHERE trol_idtrol='$this->lcIdRol' ";
			$this->ejecutar($sql);
			foreach ($this->lcServicio as $idservicio) 
			{
				$sql="INSERT INTO trol_has_tservicio (trol_idtrol,tservicio_idtservicio)VALUES('$this->lcIdRol','$idservicio')";
				$lnHecho=$this->ejecutar($sql);
				if(!$lnHecho)
				{
					$this->rollback();
					break;
				}
			}
			if($lnHecho)
			{
				$this->commit();
			}
			$this->desconectar();
			return $lnHecho;
		}
	}
?>
