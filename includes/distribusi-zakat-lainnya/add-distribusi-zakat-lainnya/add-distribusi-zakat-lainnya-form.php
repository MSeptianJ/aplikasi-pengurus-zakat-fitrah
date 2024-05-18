<?php
require "../../../header.php";
require "../../dbh.inc.php";
$path = "http://localhost/zakat-fitrah";

if (!isset($_SESSION['userId'])) {
    header("Location: {$path}/index.php?error=notLogin");
    exit();
}

$query_mustahik = mysqli_query($conn,"select * from kategori_mustahik where nama_kategori in ('Ibnu Sabil', 'Muallaf', 'Fisabilillah')");
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

            <h3 class="page-title">Formulir Pendistribusian Zakat Warga Lainnya</h3>
                <form class="form-signup" action="add-distribusi-zakat-lainnya.inc.php?" method="post">
                    <label for="nama_muzakki">Nama Muzakki</label>
                    <input type="text" id="nama_muzakki" name="nama_muzakki" required>

                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="kategori" required>
                        <option value=""> -- Kategori -- </option>
                        <?php while ($kategori = mysqli_fetch_array($query_mustahik)) :?>
                            <option value="<?php echo $kategori["nama_kategori"]?>"><?php echo $kategori["nama_kategori"]?></option>
                        <?php endwhile; ?>
                    </select>

                    <label for="jml_hak">Hak</label>
                    <input type="number" id="jml_hak" name="jml_hak" class="readonly" readonly >

                    <button type="submit" name="distribusi-zakat-submit">Submit</button>
                </form>
        </section>
    </div>
</main>

<script src="../../../scripts/datatable.js"></script>
<script src="../../../scripts/distribusi-zakat.js"></script>

<?php
require "../../../footer.php";
?>
