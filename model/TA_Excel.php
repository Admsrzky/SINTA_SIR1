<?php
include('../layout/Config.php');
require '../vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
 
$sheet->setCellValue('A1', 'No');
$sheet->getStyle('A1')->getFont()->setBold(true);
$sheet->getStyle('A1')->getFont()->setSize(12);
$sheet->setCellValue('B1', 'No TA');
$sheet->getStyle('B1')->getFont()->setBold(true);
$sheet->getStyle('B1')->getFont()->setSize(12);
$sheet->setCellValue('C1', 'Judul TA');
$sheet->getStyle('C1')->getFont()->setBold(true);
$sheet->getStyle('C1')->getFont()->setSize(12);
$sheet->setCellValue('D1', 'Nama Mahasiswa');
$sheet->getStyle('D1')->getFont()->setBold(true);
$sheet->getStyle('D1')->getFont()->setSize(12);
$sheet->setCellValue('E1', 'Nama Pembimbing');
$sheet->getStyle('E1')->getFont()->setBold(true);
$sheet->getStyle('E1')->getFont()->setSize(12);
 
$data = mysqli_query($koneksi,"select * from ta");
$i = 2;
$no = 1;
while($d = mysqli_fetch_array($data))
{
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $d['no_ta']);
    $sheet->setCellValue('C'.$i, $d['judul']);
    $sheet->setCellValue('D'.$i, $d['mahasiswa']);
    $sheet->setCellValue('E'.$i, $d['pembimbing']);    
    $i++;
}
foreach (range('A', $sheet->getHighestColumn()) as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}
$writer = new Xlsx($spreadsheet);
$writer->save('Data Tugas Akhir.xlsx');
echo "<script>window.location = 'Data Tugas Akhir.xlsx'</script>";
 
?>