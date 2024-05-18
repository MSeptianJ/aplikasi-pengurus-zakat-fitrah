<?php
require "../../../header.php";
require "../../dbh.inc.php";
$path = "http://localhost/zakat-fitrah";

if (!isset($_SESSION['userId'])) {
    header("Location: {$path}/index.php?error=notLogin");
    exit();
}
$id = $_GET['id'];
$query_muzakki_bayar = mysqli_query($conn,"select * from muzakki_bayar where id_muzakki_bayar='$id'");
?>

<main>
    <div class="wrapper-main">
        <h1 class="main-title">Aplikasi Zakat Fitrah</h1>
        <section class="section-default">

            <div class="button-box">
                <button onclick="history.back()">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </button>
            </div>

            <h3 class="page-title">Formulir Pembayaran Zakat</h3>

            <?php while ($data = mysqli_fetch_array($query_muzakki_bayar)) :?>
                <form class="form-signup" action="add-bayar-zakat.inc.php?id=<?php echo $id?>" method="post">
                    <label for="nama_muzakki">Nama Muzakki</label>
                    <input type="text" id="nama_muzakki" name="nama_muzakki" class="readonly" value="<?php echo $data["nama_muzakki"]?>" readonly >

                    <label for="jml_tngpn">Jumlah Tanggungan</label>
                    <input type="number" id="jml_tngpn" name="jml_tngpn" class="readonly" value="<?php echo $data["jumlah_tanggupan"]?>" readonly >

                    <label for="jml_bayar">Jumlah Pembayaran</label>
                    <input type="number" id="jml_bayar" name="jml_bayar" class="readonly" value="<?php echo $data["jumlah_tanggupan"]?>" readonly >

                    <label for="jenis">Jenis Pembayaran</label>
                    <select id="jenis" name="jenis">
                        <option value=""> -- Jenis Pembayaran -- </option>
                        <option value="Beras">Beras</option>
                        <option value="Uang">Uang</option>
                    </select>

                    <label for="jml_uang">Jumlah Uang</label>
                    <input type="number" id="jml_uang" name="jml_uang" class="readonly" readonly >

                    <label for="jml_beras">Jumlah Beras</label>
                    <input type="number" step="any" id="jml_beras" name="jml_beras" class="readonly" readonly >

                    <button type="submit" name="bayar-zakat-submit">Submit</button>
                </form>
            <?php endwhile;?>
        </section>
    </div>
</main>

<script src="../../../scripts/datatable.js"></script>
<script src="../../../scripts/bayar-zakat.js"></script>

<?php
require "../../../footer.php";
?>
