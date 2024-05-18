<?php
require "../../../header.php";
require "../../dbh.inc.php";
$path = "http://localhost/zakat-fitrah";

if (!isset($_SESSION['userId'])) {
    header("Location: {$path}/index.php?error=notLogin");
    exit();
}

$id = $_GET['id'];

$query_muzakki_distribusi = mysqli_query($conn,"select * from muzakki_distribusi where id_muzakki_distribusi='$id'");
$query_mustahik = mysqli_query($conn,"select * from kategori_mustahik where nama_kategori in ('Miskin', 'Fakir', 'Mampu', 'Amil')");
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

            <h3 class="page-title">Formulir Pendistribusian Zakat</h3>

            <?php while ($data = mysqli_fetch_array($query_muzakki_distribusi)) :?>
                <form class="form-signup" action="add-distribusi-zakat-warga.inc.php?id=<?php echo $id?>" method="post">
                    <label for="nama_muzakki">Nama Muzakki</label>
                    <input type="text" id="nama_muzakki" name="nama_muzakki" class="readonly" value="<?php echo $data["nama_muzakki"]?>" readonly >

                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="kategori">
                        <option value=""> -- Kategori -- </option>
                        <?php while ($kategori = mysqli_fetch_array($query_mustahik)) :?>
                            <option value="<?php echo $kategori["nama_kategori"]?>"><?php echo $kategori["nama_kategori"]?></option>
                        <?php endwhile; ?>
                    </select>

                    <label for="jml_hak">Jumlah Hak</label>
                    <input type="number" id="jml_hak" name="jml_hak" class="readonly" readonly >

                    <button type="submit" name="distribusi-zakat-submit">Submit</button>
                </form>
            <?php endwhile;?>
        </section>
    </div>
</main>

<script src="../../../scripts/datatable.js"></script>
<script src="../../../scripts/distribusi-zakat.js"></script>

<?php
require "../../../footer.php";
?>
