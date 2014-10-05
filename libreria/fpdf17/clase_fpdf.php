<?php
	require_once("../libreria/fpdf17/fpdf.php");
	class clsFpdf extends FPDF
	{
		//Las funciones Header y Footer se ejecutan atraves de la inicialización de fpdf.php
		
		//Cabecera de página
		public function Header()
		{
			date_default_timezone_set('America/Caracas');
        	
        	//fecha al momento de generar el pdf
	        $lcFechaActual = date("d/m/Y").' '.date('h:i a', time() - 3600 * date('I'));
	        $this->SetFont('Arial', 'I', 8);
	        $this->Cell(0, 4, $lcFechaActual, 0, 1, "R");

	      	//Logo
	        $this->Image('../bootstrap-3/img/logo_af.png',15,15,40);
	        $this->Image('../bootstrap-3/img/logo_af.png',165,15,40);
	        $this->Ln(15);
	        //Membrete
	        $this->SetFont('Arial', '', 12);
	        $this->Cell(0, 6,utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'), 0, 1, 'C');
	        //colocar las demas lineas dependiendo de tu organización
		}

		//Pie de página
		public function Footer()
		{
			//Posición: con respecto al final
			$this->SetY(-20);
			//Arial italic 8
			$this->SetFont("Arial","I",8);
			//Dirección
			$this->Cell(0,7,"Acarigua Estado Portuguesa",0,1,"C");
			//Número de página
			$this->Cell(0,7,utf8_decode("Página ").$this->PageNo()."/{nb}",0,0,"C");
		}
	}
?>
