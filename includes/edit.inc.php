<?php
require "../header.php";
require "../includes/dbh.inc.php";
$path = "http://localhost/zakat-fitrah";

if (!isset($_SESSION['userId'])) {
    header("Location: {$path}/index.php?error=notLogin");
    exit();
}
?>

<main>
    <div class="wrapper-main">
        <h1 class="main-title">Aplikasi Zakat Fitrah</h1>
        <section class="section-default">

            <?php
            if (isset($_GET['idMustahik'])) {
                $idMustahik = $_GET['idMustahik'];
                $query = mysqli_query($conn,"select * from kategori_mustahik where id_kategori='$idMustahik'");
                $row = mysqli_fetch_array($query);
                echo "
                    
                    <div class='button-box'>
                        <button onclick='history.back()'>
                            <i class='fas fa-arrow-left'></i>
                            Kembali
                        </button>
                    </div>

                    <h3 class='page-title'>Edit Data Mustahik</h3>

                    <form class='form-signup' action='../includes/mustahik/edit-mustahik.inc.php?id=$idMustahik' method='post'>
                        <label for='nama_kategori'>Nama</label>
                        <input type='text' name='nama_kategori' id='nama_kategori' placeholder='Nama Kategori' value='{$row['nama_kategori']}'>
                        
                        <label for='jml_hak'>Jumlah Hak</label>
                        <input type='number' name='jml_hak' id='jml_hak' placeholder='Jumlah Hak' value='{$row['jumlah_hak']}'>
                        
                        <button type='submit' name='edit-submit'>Submit</button>
                    </form>
                ";
            }
            elseif (isset($_GET['idMuzakki'])) {
                $idMuzakki  = $_GET['idMuzakki'];
                $query = mysqli_query($conn,"select * from muzakki where id_muzakki='$idMuzakki'");
                $row = mysqli_fetch_array($query);
                echo "
                    
                    <div class='button-box'>
                        <button onclick='history.back()'>
                            <i class='fas fa-arrow-left'></i>
                            Kembali
                        </button>
                    </div>

                    <h3 class='page-title'>Edit Data Muzakki</h3>

                    <form class='form-signup' action='../includes/muzakki/edit-muzakki.inc.php?id=$idMuzakki' method='post'>                      
                        <label for='nama_muzakki'>Jumlah Hak</label>
                        <input type='text' name='nama_muzakki' id='nama_muzakki' placeholder='Nama Muzakki' value='{$row['nama_muzakki']}'>
                        
                        <label for='jml_tngpn'>Jumlah Tanggupan</label>
                        <input type='number' name='jml_tngpn' id='jml_tngpn' placeholder='Jumlah Tanggupan' value='{$row['jumlah_tanggupan']}'>
                        
                        <label for='ket'>Keterangan</label>
                        <select name='ket' id='ket'>
                            <option value='{$row['keterangan']}'>{$row['keterangan']}</option>
                            <option value='Warga Tetap'>Warga Tetap</option>
                            <option value='Warga Luar'>Warga Luar</option>
                            <option value='Warga Asing'>Warga Asing</option>
                        </select>
                        
                        <button type='submit' name='edit-submit'>Submit</button>
                    </form>
                ";
            }
            elseif (isset($_GET['idBayar'])) {
                $idBayar = $_GET['idBayar'];
                $query = mysqli_query($conn,"select * from bayarzakat where id_zakat='$idBayar'");
                $row = mysqli_fetch_array($query);
                echo "
                    
                    <div class='button-box'>
                        <button onclick='history.back()'>
                            <i class='fas fa-arrow-left'></i>
                            Kembali
                        </button>
                    </div>
                    
                    <h3 class='page-title'>Edit Data Bayar Zakat</h3>

                    <form class='form-signup' action='./bayar-zakat/edit-bayar-zakat.inc.php?id=$idBayar' method='post'>
                        <label for='nama_muzakki'>Nama Muzakki</label>
                        <input type='text' id='nama_muzakki' name='nama_muzakki' class='readonly' value='{$row['nama_muzakki']}' readonly>
                        
                        <label for='jml_tngpn'>Jumlah Tanggungan</label>
                        <input type='number' id='jml_tngpn' name='jml_tngpn' class='readonly' value='{$row['jumlah_tanggungan']}' readonly>
                        
                        <label for='jml_bayar'>Jumlah Pembayaran</label>
                        <input type='number' id='jml_bayar' name='jml_bayar' class='readonly' value='{$row['jumlah_tanggunganyangdibayar']}' readonly>
                        
                        <label for='jenis'>Jenis Pembayaran</label>
                        <select id='jenis' name='jenis'>
                            <option value='{$row['jenis_bayar']}'>{$row['jenis_bayar']}</option>
                            <option value='Beras'>Beras</option>
                            <option value='Uang'>Uang</option>
                        </select>
                        
                        <label for='jml_uang'>Jumlah Uang</label>
                        <input type='number' id='jml_uang' name='jml_uang' class='readonly' value='{$row['bayar_uang']}' readonly>
                        
                        <label for='jml_beras'>Jumlah Beras</label>
                        <input type='number' step='any' id='jml_beras' name='jml_beras' class='readonly' value='{$row['bayar_beras']}' readonly>
                        
                        <button type='submit' name='edit-submit'>Submit</button>
                    </form>
                ";
            }
            elseif (isset($_GET['idDistribusi'])) {
                $idDistribusi = $_GET['idDistribusi'];
                $query = mysqli_query($conn,"select * from mustahik_warga where id_mustahikwarga='$idDistribusi'");
                $query_mustahik = mysqli_query($conn,"select * from kategori_mustahik where nama_kategori in ('Miskin', 'Fakir', 'Mampu', 'Amil')");
                $row = mysqli_fetch_array($query);
                echo "

                    <div class='button-box'>
                        <button onclick='history.back()'>
                            <i class='fas fa-arrow-left'></i>
                            Kembali
                        </button>
                    </div>
                    
                    <h3 class='page-title'>Edit Data Distribusi Zakat Warga</h3>

                    <form class='form-signup' action='./distribusi-zakat-warga/edit-distribusi-zakat-warga.inc.php?id=$idDistribusi' method='post'>
                        <label for='nama_muzakki'>Nama Muzakki</label>
                        <input type='text' id='nama_muzakki' name='nama_muzakki' class='readonly' value='{$row['nama']}' readonly >

                        <label for='kategori'>Kategori</label>
                        <select id='kategori' name='kategori'>
                            <option value='{$row['kategori']}'>{$row['kategori']}</option>
                ";

                while ($kategori = mysqli_fetch_array($query_mustahik)) {
                    echo "
                        <option value='{$kategori['nama_kategori']}'>{$kategori['nama_kategori']}</option>
                    ";
                }

                echo "
                        </select>

                        <label for='jml_hak'>Hak</label>
                        <input type='number' id='jml_hak' name='jml_hak' class='readonly' value='{$row['hak']}' readonly >

                        <button type='submit' name='edit-submit'>Submit</button>
                    </form>
                ";
            }elseif (isset($_GET['idLainnya'])) {
                $idLainnya = $_GET['idLainnya'];
                $query = mysqli_query($conn,"select * from mustahik_lainnya where id_mustahiklainnya='$idLainnya'");
                $query_mustahik = mysqli_query($conn,"select * from kategori_mustahik where nama_kategori in ('Ibnu Sabil', 'Muallaf', 'Fisabilillah')");
                $row = mysqli_fetch_array($query);
                echo "
                    
                    <div class='button-box'>
                        <button onclick='history.back()'>
                            <i class='fas fa-arrow-left'></i>
                            Kembali
                        </button>
                    </div>

                    <h3 class='page-title'>Edit Data Distribusi Zakat Warga Lainnya</h3>

                    <form class='form-signup' action='./distribusi-zakat-lainnya/edit-distribusi-zakat-lainnya.inc.php?id=$idLainnya' method='post'>
                        <label for='nama_muzakki'>Nama Muzakki</label>
                        <input type='text' id='nama_muzakki' name='nama_muzakki' class='readonly' value='{$row['nama']}' readonly >

                        <label for='kategori'>Kategori</label>
                        <select id='kategori' name='kategori'>
                            <option value='{$row['kategori']}'>{$row['kategori']}</option>
                ";

                while ($kategori = mysqli_fetch_array($query_mustahik)) {
                    echo "
                        <option value='{$kategori['nama_kategori']}'>{$kategori['nama_kategori']}</option>
                    ";
                }

                echo "
                        </select>

                        <label for='jml_hak'>Hak</label>
                        <input type='number' id='jml_hak' name='jml_hak' class='readonly' value='{$row['hak']}' readonly >

                        <button type='submit' name='edit-submit'>Submit</button>
                    </form>
                ";
            }

            ?>

        </section>
    </div>
</main>

<script src="../scripts/bayar-zakat.js"></script>
<script src="../scripts/distribusi-zakat.js" defer></script>

<?php
require "../footer.php";
?>
