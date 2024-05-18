<?php
require "../header.php";
require "../includes/dbh.inc.php";
$path = "http://localhost/zakat-fitrah";

if (!isset($_SESSION['userId'])) {
    header("Location: {$path}/index.php?error=notLogin");
    exit();
}

$no = 1;
$query_bayar_zakat = mysqli_query($conn,"select * from bayarzakat");
$query_report = mysqli_query(
        $conn,
        "SELECT 
                    COUNT(nama_muzakki) AS 'Total Muzakki',
                    SUM(jumlah_tanggunganyangdibayar) AS 'Total Jiwa',
                    SUM(bayar_beras) AS 'Total Beras',
                    SUM(bayar_uang) AS 'Total Uang'
                FROM bayarzakat"
)
?>

<main>
    <div class="wrapper-main">
        <h1 class="main-title">Aplikasi Zakat Fitrah</h1>
        <section class="section-default">
            <h3 class="page-label">Warga yang sudah bayar zakat</h3>

            <?php
                if(isset($_GET["addBayarZakat"])) {
                    echo '<p class="signupSuccess">Data baru ditambahkan</p>';
                }
                elseif (isset($_GET['editZakat'])) {
                    echo '<p class="signupSuccess">Data telah diubah</p>';
                }
                elseif (isset($_GET['deleteMuzakki'])) {
                    echo '<p class="signupError">Data telah dihapus</p>';
                }
            ?>

            <div class="button-box">
                <div class="add-button">
                    <a href="../includes/bayar-zakat/add-bayar-zakat/add-bayar-zakat.php">
                        <i class="fas fa-plus-square"></i>
                        Tambahkan
                    </a>
                </div>
            </div>

            <div class="box-table">
                <table id="table-data" class="display">
                    <thead>
                    <tr>
                        <th class="table-small-width">No</th>
                        <th class="table-wide-width">Nama</th>
                        <th class="table-small-width">Tanggungan</th>
                        <th class="table-small-width">Jenis</th>
                        <th class="table-small-width">Pembayaran</th>
                        <th class="table-small-width">Beras</th>
                        <th class="table-small-width">Uang</th>
                        <th class="table-small-width">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while($data = mysqli_fetch_array($query_bayar_zakat)) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td class="text-left"><?php echo $data['nama_muzakki']; ?></td>
                            <td><?php echo $data['jumlah_tanggungan']; ?> orang</td>
                            <td class="text-left"><?php echo $data['jenis_bayar']; ?></td>
                            <td class="text-left"><?php echo $data['jumlah_tanggunganyangdibayar']; ?> orang</td>
                            <td class="text-left"><?php echo $data['bayar_beras']; ?> Kg</td>
                            <td class="text-left">Rp. <?php echo $data['bayar_uang']; ?></td>
                            <td>
                                <a href="../includes/edit.inc.php?idBayar=<?php echo $data['id_zakat'];?>" class="table-button">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" onclick="confirmAction('../includes/bayar-zakat/delete-bayar-zakat.inc.php?id=<?php echo $data['id_zakat']; ?>&nama=<?php echo $data['nama_muzakki']; ?>')" class="table-button">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="section-default">
            <h3 class="page-label">Rekap Data Warga yang telah bayar zakat</h3>

            <div class="report-box report-bayar">
                <?php while($data = mysqli_fetch_array($query_report)) : ?>
                    <div class="report-inner-box">
                        <p>Total Muzakki : <?php echo $data["Total Muzakki"]?> Perwakilan</p>
                    </div>
                    <div class="report-inner-box">
                        <p>Total Jiwa : <?php echo $data["Total Jiwa"]?> Jiwa</p>
                    </div>
                    <div class="report-inner-box">
                        <p>Total Beras : <?php echo $data["Total Beras"]?> Kg</p>
                    </div>
                    <div class="report-inner-box">
                        <p>Total Uang : Rp.<?php echo $data["Total Uang"]?></p>
                    </div>
                <?php endwhile; ?>
                <a href="#" onclick="confirmAction('../includes/report/report-bayar-zakat.php')" class="report-button">Cetak Laporan</a>
            </div>
        </section>
    </div>
</main>

<script src="../scripts/datatable.js"></script>
<script src="../scripts/confirm-action.js"></script>

<?php
require "../footer.php";
?>
