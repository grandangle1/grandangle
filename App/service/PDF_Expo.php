<?php
namespace App\Service;
use App\Entity\OeuvreEntity;
use App\Service\Pdf_Generator\FPDF;
use App\Utils;

class PDF_Expo extends FPDF {

    private $idExpo, $expo, $oeuvres;

    public function __construct($orientation = 'P', $unit = 'mm', $size = 'A4') {
        parent::__construct($orientation, $unit, $size);
        $this->idExpo = $_GET['id'];
        $this->expo = Utils::getTable('Exposition')->query("SELECT themeFr, week, generalDescrFR AS descr FROM exposition WHERE idExpo = ?", [$this->idExpo], true);
        $this->oeuvres = Utils::getTable('Oeuvre')->query("SELECT idOeuvre, nomOeuvre, salle FROM oeuvre WHERE idExpo = ? ORDER BY salle", [$this->idExpo]);
    }

// En-tete
    function Header()
    {

        // Logo
        $this->Image(ROOT.'/public/img/header/logo.png',30,8,25, 25);
        // Police Arial gras 15
        $this->SetFont('Arial','B',20);
        // D�calage � droite
        $this->Cell(50);
        // Titre
        $this->Cell(100,20,"Grand-Angle",1,0, 'C');
        // Saut de ligne
        $this->Ln(30);
    }

// Pied de page
    function Footer()
    {
        // Positionnement � 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial','I',8);
        // Num�ro de page
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    public function expo() {

        $this->ln('0');
        $this->SetFont('Times','',20);
        $this->Cell(0, 20, "Theme de l'exposition : ".$this->expo->themeFr, 0, 0, 'C');
        $this->ln('15');
        $this->SetFont('Times','I',15);
        $start = Utils::weekToDay($this->expo->week, true);
        $this->Cell(0, 15, "A partir du : ".$start, 0, 0, "");
        $this->ln();
        // Description expo
        $txt = iconv('UTF-8', 'windows-1252', $this->expo->descr);
        $this->SetFont('Times','',12);
        // Sortie du texte justifié
        $this->MultiCell(0,5,$txt);
    }
    public function oeuvres() {
        $this->ln('5');
        $this->SetFont('Times','',20);
        $this->Cell(0, 20, "Liste des oeuvres", 0, 0, 'C');
        $this->ln('15');

        foreach ($this->oeuvres as $oeuvre) {
            $this->ln('10');
            $path = $oeuvre->pathQr();
            $this->Cell(150, 15, $oeuvre->nomOeuvre."  :  $oeuvre->salle", 0, 0, "");
            $path = $oeuvre->pathQr();
            $this->Image($path,null,null,25, 25);

        }
    }
}

// Instanciation de la classe derivee
$pdf = new PDF_Expo();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->expo();
$pdf->oeuvres();
$pdf->SetTitle('Liste des oeuvres', true);

$pdf->Output();
?>