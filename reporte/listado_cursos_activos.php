<?php
   /**
   * Reporte listado de cursos activos
   *
   * @package    ModeloAulafrontino
   * @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
   * @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
   * @link       https://github.com/EquipoAulaFrontino
   * @version    v1.0
   */
   require_once("../libreria/fpdf17/clase_fpdf.php");
   require_once("../clases/clase_curso.php");
   $lobjCurso=new clsCurso();
   $listado_cursos=$lobjCurso->listar_cursos_activos();
   ob_end_clean();

   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();

   //AddPage(Orientacion,tamaño)
   //Orientación de la pagina P=Vertical y L=Horizontal  
   //Tamaño de la pagina letter=carta y legal=oficio, exiten más pero estos son los mas comunes 
   $lobjPdf->AddPage("P","legal");
   //SetFont(Tipo de fuente,negrilla,tamaño de la fuente)
   $lobjPdf->SetFont("arial","B",12);
   //Ln(cantidad de lineas en blanco)
   $lobjPdf->Ln(3);

   //Parametros de la función CELL (ancho,alto,texto,borde,salto de linea,alineación)
   $lobjPdf->Cell(0,6,utf8_decode("LISTADO DE CURSOS ACTIVOS"),0,1,"C");
   $lobjPdf->Cell(10,6,utf8_decode("Nº"),1,0,"C");
   $lobjPdf->Cell(45,6,utf8_decode("Nombre"),1,0,"C");
   $lobjPdf->Cell(35,6,utf8_decode("Sección"),1,0,"C");
   $lobjPdf->Cell(45,6,utf8_decode("Asignación"),1,0,"C");
   $lobjPdf->Cell(60,6,utf8_decode("Profesor"),1,1,"C");
   $lobjPdf->SetFont("arial","",12);
   for($i=0;$i<count($listado_cursos);$i++)
   {
      $lobjPdf->Cell(10,6,utf8_decode($listado_cursos[$i]['idcurso']),1,0,"C");
      $lobjPdf->Cell(45,6,utf8_decode($listado_cursos[$i]['nombrecur']),1,0,"C");
      $lobjPdf->Cell(35,6,utf8_decode($listado_cursos[$i]['seccioncur']),1,0,"C");
      $lobjPdf->Cell(45,6,utf8_decode($listado_cursos[$i]['nombreasi']),1,0,"C");
      $lobjPdf->Cell(60,6,utf8_decode($listado_cursos[$i]['profesor']),1,1,"C");
   }

   $lobjPdf->Output();

?>