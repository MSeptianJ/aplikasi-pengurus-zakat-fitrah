<?php
require "../../../header.php";
require "../../dbh.inc.php";
$path = "http://localhost/zakat-fitrah";

if (!isset($_SESSION['userId'])) {
    header("Location: {$path}/index.php?error=notLogin");
    exit();
}
$no = 1;
$query_muzzaki_bayar = mysqli_query($conn,"select * from muzakki_bayar");
?>

<main>
    <div class="wrapper-main">
        <h1 class="main-title">Aplikasi Zakat Fitrah</h1>
        <section class="section-default">
            <h3 class="page-label">Add Bayar Zakat</h3>

            <div class="button-box">
                <button onclick="history.back()">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </button>
            </div>

            <div class="box-table">
                <table id="table-data" class="display">
                    <thead>
                    <tr>
                        <th class="table-small-width">No</th>
                        <th class="table-wide-width">Nama</th>
                        <th class="table-small-width">Tanggungan</th>
                        <th class="table-small-width">Keterangan</th>
                        <th class="table-small-width">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while($data = mysqli_fetch_array($query_muzzaki_bayar)) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td class="text-left"><?php echo $data['nama_muzakki']; ?></td>
                            <td><?php echo $data['jumlah_tanggupan']; ?></td>
                            <td class="text-left"><?php echo $data['keterangan']; ?></td>
                            <td>
                                <a href="add-bayar-zakat-form.php?id=<?php echo $data['id_muzakki_bayar'];?>" class="table-button">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</main>

<script src="../../../scripts/datatable.js"></script>

<?php
require "../../../footer.php";
?>
