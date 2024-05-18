<?php
require '../../vendor/autoload.php';
require '../dbh.inc.php';
use Spipu\Html2Pdf\Html2Pdf;

$path = "http://localhost/zakat-fitrah";

$query_report = mysqli_query(
    $conn,
    "SELECT 
                    COUNT(nama_muzakki) AS 'Total Muzakki',
                    SUM(jumlah_tanggunganyangdibayar) AS 'Total Jiwa',
                    SUM(bayar_beras) AS 'Total Beras',
                    SUM(bayar_uang) AS 'Total Uang'
                FROM bayarzakat"
);

$data = mysqli_fetch_array($query_report);
$totMuzakki = $data["Total Muzakki"];
$totJiwa = $data["Total Jiwa"];
$totBeras = $data["Total Beras"];
$totUang = $data["Total Uang"];

$pdfFormat = "
    <page backtop='7mm' backbottom='7mm' backleft='10mm' backright='10mm'>
        <page_header>
            <h3 style='text-align: center'>Laporan Bayar Zakat</h3>
        </page_header>
        <p style='margin-top: 20px;'>Dari kegiatan pengumpulan zakat fitrah yang dilakukan pada tgl 28-30 Bulan Ramadhan tahun 1443, didapatkan poin point sebegai berikut:</p>
        <ul style='list-style: square'>
            <li style='list-style: square'>Total Muzakki : $totMuzakki Orang</li>
            <li style='list-style: square'>Total Jiwa : $totJiwa Jiwa</li>
            <li style='list-style: square'>Total Beras : $totBeras Kg</li>
            <li style='list-style: square'>Total Uang : Rp.$totUang</li>
        </ul>
    </page>
";

$html2pdf = new Html2Pdf('P', 'A4');
$html2pdf->writeHTML($pdfFormat);
$html2pdf->output('Laporan Bayar Zakat.pdf', 'D'); // Generate and load the PDF in the browser.

// $html2pdf->output('myPdf.pdf, 'D'); // Generate the PDF execution and force download immediately.

header("Location: {$path}/pages/bayar-zakat.php");
exit();