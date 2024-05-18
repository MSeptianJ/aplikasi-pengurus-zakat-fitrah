<?php
require "../header.php";
require "../includes/dbh.inc.php";
$path = "http://localhost/zakat-fitrah";

if (!isset($_SESSION['userId'])) {
    header("Location: {$path}/index.php?error=notLogin");
    exit();
}
$no = 1;
$query = mysqli_query($conn,"select * from muzakki");
?>

<main>
    <div class="wrapper-main">
        <h1 class="main-title">Aplikasi Zakat Fitrah</h1>
        <section class="section-default">
            <h3 class="page-label">Add Muzakki</h3>
            <form class="add-form add_muzakki" action="../includes/muzakki/add-muzakki.inc.php" method="post">
                <input type="text" name="nama_muzakki" placeholder="Nama Muzakki">
                <input type="number" name="jml_tngpn" placeholder="Jumlah Tanggupan">
                <select name="ket" id="ket">
                    <option value="Warga Tetap">Warga Tetap</option>
                    <option value="Warga Tidak Tetap">Warga Tidak Tetap</option>
                    <option value="Warga Luar">Warga Luar</option>
                </select>
                <button type="submit" name="muzakki-submit" title="Submit data">Submit</button>
            </form>

            <?php
                if(isset($_GET["addMuzakki"])) {
                    echo '<p class="signupSuccess">Data baru ditambahkan</p>';
                }
                elseif (isset($_GET['editMuzakki'])) {
                    echo '<p class="signupSuccess">Data telah diubah</p>';
                }
                elseif (isset($_GET['deleteMuzakki'])) {
                    echo '<p class="signupError">Data telah dihapus</p>';
                }
            ?>

            <h3 class="page-label">Detail Muzakki</h3>
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
                        <?php while($data = mysqli_fetch_array($query)) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td class="text-left"><?php echo $data['nama_muzakki']; ?></td>
                                <td><?php echo $data['jumlah_tanggupan']; ?></td>
                                <td class="text-left"><?php echo $data['keterangan']; ?></td>
                                <td>
                                    <a href="../includes/edit.inc.php?idMuzakki=<?php echo $data['id_muzakki'];?>" class="table-button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" onclick="confirmAction('../includes/muzakki/delete-muzakki.inc.php?id=<?php echo $data['id_muzakki']; ?>')" class="table-button">
                                        <i class="fas fa-trash"></i>
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

<script src="../scripts/datatable.js"></script>
<script src="../scripts/confirm-action.js"></script>

<?php
require "../footer.php";
?>
