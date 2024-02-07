<?php

include('../layout/Config.php');
require '../vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('defaultFont', 'Arial'); // Set the default font (choose any font you want)
$dompdf = new Dompdf($options);

// Fetch Mahasiswa data from the database
$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($koneksi, $query);

// Generate HTML content for the PDF
$html = '
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    </style>
    <table border="1" style="width:100%">
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Alamat</th>
        </tr>';

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '
        <tr>
            <td>' . $row['id_mahasiswa'] . '</td>
            <td>' . $row['nim'] . '</td>
            <td>' . $row['nama_mahasiswa'] . '</td>
            <td>' . $row['prodi'] . '</td>
            <td>' . $row['alamat'] . '</td>
        </tr>';
}

$html .= '</table>';

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('mahasiswa_report.pdf', array('Attachment' => 0));

?>
