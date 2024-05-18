<?php
require '../../vendor/autoload.php';
require '../dbh.inc.php';
use Spipu\Html2Pdf\Html2Pdf;

$path = "http://localhost/zakat-fitrah";

$query_warga = mysqli_query(
    $conn,
    "SELECT 
                    COUNT(nama) AS 'total-mustahik-warga',
                    SUM(hak) AS 'total-beras'
                FROM mustahik_warga"
);

$query_lainnya = mysqli_query(
    $conn,
    "SELECT 
                    COUNT(nama) AS 'total-mustahik-lainnya',
                    SUM(hak) AS 'total-beras'
                FROM mustahik_lainnya"
);

$query_mustahik_warga = mysqli_query(
    $conn,
    "select 
                    * 
                from kategori_mustahik 
                where nama_kategori in ('Miskin', 'Fakir', 'Mampu', 'Amil')"
);

$query_mustahik_lainya = mysqli_query(
    $conn,
    "select 
                    * 
                from kategori_mustahik 
                where nama_kategori in ('Ibnu Sabil', 'Muallaf', 'Fisabilillah')"
);

$mustahik_warga = mysqli_fetch_array($query_warga);
$mustahik_lainnya = mysqli_fetch_array($query_lainnya);

$totMustahikWarga = $mustahik_warga["total-mustahik-warga"];
$totBerasWarga = $mustahik_warga["total-beras"];
$totMustahikLainnya = $mustahik_lainnya["total-mustahik-lainnya"];
$totBerasLainnya = $mustahik_lainnya["total-beras"];

$pdfWarga = "
    <page backtop='7mm' backbottom='7mm' backleft='10mm' backright='10mm'>
        <page_header>
            <h3 style='text-align: center'>Laporan Distribusi Zakat</h3>
        </page_header>
        <p>Dari kegiatan pendistribusian zakat fitrah yang dilakukan pada tgl 30 Bulan Ramadhan tahun 1443, didapatkan poin point sebegai berikut:</p>
        <h5 style='margin: 0'>A. Distribusi ke Mustahik Warga</h5>
            <p style='margin: 0'>Kategori Mustahik</p>
            <ul>";
while ($data = mysqli_fetch_array($query_mustahik_warga)) {
    $pdfWarga .= "<li style='list-style: square'>{$data['nama_kategori']} : {$data['jumlah_hak']}</li>";
}
$pdfWarga .="
            </ul>
        <p style='margin: 0'>Total Mustahik Warga: $totMustahikWarga</p>
        <p style='margin: 0'>Total Beras Warga: $totBerasWarga</p>
";

$pdfWarga .= "
        <h5 style='margin: 0'>B. Distribusi ke Mustahik Lainnya</h5>
            <p style='margin: 0'>Kategori Mustahik</p>
            <ul>";
while ($data = mysqli_fetch_array($query_mustahik_lainya)) {
    $pdfWarga .= "<li>{$data['nama_kategori']} : {$data['jumlah_hak']}</li>";
}
$pdfWarga .="
            </ul>
        <p style='margin: 0'>Total Mustahik Lainnya: $totMustahikLainnya</p>
        <p style='margin: 0'>Total Beras Lainnya: $totBerasLainnya</p>
    </page>
";

$html2pdf = new Html2Pdf('P', 'A4');
$html2pdf->writeHTML($pdfWarga);
$html2pdf->output('Laporan Distribusi Zakat.pdf', "D");

header("Location: {$path}/pages/distribusi-zakat-lainnya.php");
exit();