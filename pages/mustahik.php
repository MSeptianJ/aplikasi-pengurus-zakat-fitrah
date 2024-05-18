<?php
require "../header.php";
require "../includes/dbh.inc.php";
$path = "http://localhost/zakat-fitrah";

if (!isset($_SESSION['userId'])) {
    header("Location: {$path}/index.php?error=notLogin");
    exit();
}

$no = 1;
$query = mysqli_query($conn,"select * from kategori_mustahik");
?>

<main>
    <div class="wrapper-main">
        <h1 class="main-title">Aplikasi Zakat Fitrah</h1>
        <section class="section-default">
            <h3 class="page-label">Add Mustahik</h3>
            <form class="add-form add-mustahik" action="../includes/mustahik/add-mustahik.inc.php" method="post">
                <input type="text" name="nama_kategori" placeholder="Nama Kategori">
                <input type="number" name="jml_hak" placeholder="Jumlah Hak">
                <button type="submit" name="mustahik-submit" title="Submit data">Submit</button>
            </form>

            <?php
                if(isset($_GET["addMustahik"])) {
                    echo '<p class="signupSuccess">Data baru ditambahkan</p>';
                }
                elseif (isset($_GET['editMustahik'])) {
                    echo '<p class="signupSuccess">Data telah diubah</p>';
                }
                elseif (isset($_GET['deleteMustahik'])) {
                    echo '<p class="signupError">Data telah dihapus</p>';
                }
            ?>

            <h3 class="page-label">Detail Mustahik</h3>
            <div class="box-table">
                <table id="table-data" class="display">
                    <thead>
                        <tr>
                            <th class="table-small-width">No</th>
                            <th class="table-wide-width">Nama</th>
                            <th class="table-small-width">Jumlah Hak</th>
                            <th class="table-small-width">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($data = mysqli_fetch_array($query)) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td class="text-left"><?php echo $data['nama_kategori']; ?></td>
                                <td class="text-left"><?php echo $data['jumlah_hak']; ?> Kg</td>
                                <td>
                                    <a href="../includes/edit.inc.php?idMustahik=<?php echo $data['id_kategori']; ?>" class="table-button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" onclick="confirmAction('../includes/mustahik/delete-mustahik.inc.php?id=<?php echo $data['id_kategori']; ?>')" class="table-button">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</main>

<script src="../scripts/datatable.js"></script>
<script src="../scripts/confirm-action.js"></script>

<?php
require "../footer.php";
?>
