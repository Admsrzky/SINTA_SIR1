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
$sheet->setCellValue('B1', 'NIDN');
$sheet->getStyle('B1')->getFont()->setBold(true);
$sheet->getStyle('B1')->getFont()->setSize(12);
$sheet->setCellValue('C1', 'Nama Dosen');
$sheet->getStyle('C1')->getFont()->setBold(true);
$sheet->getStyle('C1')->getFont()->setSize(12);
$sheet->setCellValue('D1', 'Email');
$sheet->getStyle('D1')->getFont()->setBold(true);
$sheet->getStyle('D1')->getFont()->setSize(12);
$sheet->setCellValue('E1', 'Agama');
$sheet->getStyle('E1')->getFont()->setBold(true);
$sheet->getStyle('E1')->getFont()->setSize(12);
$sheet->setCellValue('F1', 'Alamat');
$sheet->getStyle('F1')->getFont()->setBold(true);
$sheet->getStyle('F1')->getFont()->setSize(12);
 
$data = mysqli_query($koneksi,"select * from dosen");
$i = 2;
$no = 1;
while($d = mysqli_fetch_array($data))
{
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $d['nidn']);
    $sheet->setCellValue('C'.$i, $d['nama']);
    $sheet->setCellValue('D'.$i, $d['email']);
    $sheet->setCellValue('E'.$i, $d['agama']);    
    $sheet->setCellValue('F'.$i, $d['alamat']);    
    $i++;
}
foreach (range('A', $sheet->getHighestColumn()) as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}
$writer = new Xlsx($spreadsheet);
$writer->save('Data Dosen.xlsx');
echo "<script>window.location = 'Data Dosen.xlsx'</script>";
 
?>