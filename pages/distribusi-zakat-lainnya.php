<?php
require "../header.php";
require "../includes/dbh.inc.php";
$path = "http://localhost/zakat-fitrah";

if (!isset($_SESSION['userId'])) {
    header("Location: {$path}/index.php?error=notLogin");
    exit();
}
$no = 1;
$query_bayar_zakat = mysqli_query($conn,"select * from mustahik_lainnya");
$query_report = mysqli_query(
    $conn,
    "SELECT 
                    COUNT(nama) AS 'total-mustahik-lainnya',
                    SUM(hak) AS 'total-beras'
                FROM mustahik_lainnya"
);
$query_mustahik = mysqli_query(
    $conn,
    "select 
                    * 
                from kategori_mustahik 
                where nama_kategori in ('Ibnu Sabil', 'Muallaf', 'Fisabilillah')"
);
?>

<main>
    <div class="wrapper-main">
        <h1 class="main-title">Aplikasi Zakat Fitrah</h1>
        <section class="section-default">
            <h3 class="page-label">Warga Lainnya yang sudah Menerima zakat</h3>

            <?php
                if(isset($_GET["addDistribusiZakat"])) {
                    echo '<p class="signupSuccess">Data baru ditambahkan</p>';
                }
                elseif (isset($_GET['editDistribusiZakat'])) {
                    echo '<p class="signupSuccess">Data telah diubah</p>';
                }
                elseif (isset($_GET['deleteMustahik'])) {
                    echo '<p class="signupError">Data telah dihapus</p>';
                }
            ?>

            <div class="button-box">
                <div class="add-button">
                    <a href="../includes/distribusi-zakat-lainnya/add-distribusi-zakat-lainnya/add-distribusi-zakat-lainnya-form.php">
                        <i class="fas fa-plus-square"></i>
                        Tambahkan
                    </a>
                </div>

                <div class="button-distribute">
                    <div class="distributes-pages">
                        <a href="./distribusi-zakat-warga.php">Distribusi Warga</a>
                    </div>
                    <div class="distributes-pages button-current">
                        <a href="javascript:void(0)">Distribusi Warga Lainnya</a>
                    </div>
                </div>
            </div>

            <div class="box-table">
                <table id="table-data" class="display">
                    <thead>
                    <tr>
                        <th class="table-small-width">No</th>
                        <th class="table-wide-width">Nama</th>
                        <th class="table-small-width">Kategori</th>
                        <th class="table-small-width">Hak</th>
                        <th class="table-small-width">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while($data = mysqli_fetch_array($query_bayar_zakat)) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td class="text-left"><?php echo $data['nama']; ?></td>
                            <td class="text-left"><?php echo $data['kategori']; ?></td>
                            <td class="text-left"><?php echo $data['hak']; ?> Kg</td>
                            <td>
                                <a href="../includes/edit.inc.php?idLainnya=<?php echo $data['id_mustahiklainnya'];?>" class="table-button">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" onclick="confirmAction('../includes/distribusi-zakat-lainnya/delete-distribusi-zakat-lainnya.inc.php?id=<?php echo $data['id_mustahiklainnya']; ?>')" class="table-button">
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
            <h3 class="page-label">Rekap Data Warga yang telah mendapatkan zakat</h3>
            <div class="report-box report-box-distribution">
                <div class="report-inner-box report-distribusi-category">
                    <p class="report-distribusi-category-label">Kategori Mustahik : </p>
                    <ul class="">
                        <?php while($data = mysqli_fetch_array($query_mustahik)) : ?>
                            <li>Kategori <?php echo $data['nama_kategori']?> mempunyai hak <?php echo $data['jumlah_hak']?> Kg beras</li>
                        <?php endwhile; ?>
                    </ul>
                </div>

                <div class="report-distribusi-mustahik">
                    <?php while($data = mysqli_fetch_array($query_report)) : ?>
                        <div class="report-inner-box ">
                            <p>Total Mustahik Warga : <?php echo $data["total-mustahik-lainnya"]?> Orang</p>
                        </div>
                        <div class="report-inner-box">
                            <p>Total Beras : <?php echo $data["total-beras"]?> Kg</p>
                        </div>
                    <?php endwhile; ?>
                    <div class="report-distribusi-button">
                        <a href="#" onclick="confirmAction('../includes/report/report-distribusi-zakat.php')" class="report-button">Cetak Laporan</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<script src="../scripts/datatable.js"></script>
<script src="../scripts/confirm-action.js"></script>

<?php
require "../footer.php";
?>
