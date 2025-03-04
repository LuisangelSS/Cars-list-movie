<?php
require('../fpdf/fpdf.php');
include '../config/db_config.php';

$id = $_GET['id'];
$query = $conn->query("SELECT * FROM personajes WHERE id = $id");
$row = $query->fetch_assoc();

class PDF extends FPDF
{
    function Header()
    {
        // Fondo rojo en el encabezado
        $this->SetFillColor(255, 0, 0); // Rojo brillante
        $this->Rect(0, 0, $this->GetPageWidth(), 20, 'F');

        // Texto del encabezado
        $this->SetFont('Arial', 'B', 20);
        $this->SetTextColor(255, 255, 255); // Blanco
        $this->Cell(0, 10, 'Informacion del Personaje - Cars 2006', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        // Línea negra en el pie de página
        $this->SetDrawColor(0, 0, 0); // Negro
        $this->SetLineWidth(0.5);
        $this->Line(10, $this->GetPageHeight() - 20, $this->GetPageWidth() - 10, $this->GetPageHeight() - 20);

        // Texto del pie de página
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(50, 50, 50); // Gris oscuro
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();

// Título principal del personaje
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(255, 0, 0); // Rojo brillante
$pdf->Cell(0, 10, $row['nombre'], 0, 1, 'C');
$pdf->Ln(10);

// Información del personaje
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->Cell(0, 10, 'Color: ' . $row['color'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Tipo: ' . $row['tipo'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Nivel: ' . $row['nivel'], 0, 1, 'C');
$pdf->Ln(10);

// Imagen del personaje con marco amarillo
$imagePath = '../assets/' . $row['foto'];
list($originalWidth, $originalHeight) = getimagesize($imagePath);
$maxWidth = 150; // Maximum width for the image
$maxHeight = 150; // Maximum height for the image
$ratio = min($maxWidth / $originalWidth, $maxHeight / $originalHeight);
$newWidth = $originalWidth * $ratio;
$newHeight = $originalHeight * $ratio;

// Fondo amarillo para la imagen
$pdf->SetFillColor(255, 204, 0); // Amarillo brillante
$pdf->Rect(($pdf->GetPageWidth() - $newWidth) / 2 - 5, $pdf->GetY() - 5, $newWidth + 10, $newHeight + 10, 'F');

// Imagen
$pdf->Image($imagePath, ($pdf->GetPageWidth() - $newWidth) / 2, $pdf->GetY(), $newWidth, $newHeight);

$pdf->Output();
?>
