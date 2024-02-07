<?php

include('../layout/Config.php');
require '../vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('defaultFont', 'Arial'); // Set the default font (choose any font you want)
$dompdf = new Dompdf($options);

// Fetch Mahasiswa data from the database
$query = "SELECT * FROM ta";
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
            <th>NO TA</th>
            <th>Judul TA</th>
            <th>Nama Mahasiswa</th>
            <th>Nama Pembimbing</th>
        </tr>';

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '
        <tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['no_ta'] . '</td>
            <td>' . $row['judul'] . '</td>
            <td>' . $row['mahasiswa'] . '</td>
            <td>' . $row['pembimbing'] . '</td>
        </tr>';
}

$html .= '</table>';

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Tugas Akhir.pdf', array('Attachment' => 0));

?>
