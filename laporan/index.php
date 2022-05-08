<?php include_once('header.php');
require_once "../config/config.php";
?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->


        <!-- Content Row -->
        <div class="row">
            <div class="row col-lg-12">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="text-white">Cetak Laporan</h4>
                        </div>
                        <div class="card-body">
                            <div class="modal-body">
                                <form action="<?= base_url() ?>//laporan/cetak.php" method="POST">
                                    <div class="form-group">
                                        <label for="kategori">
                                            <div class="section-title mt-0"> Nama Kategori </div>
                                        </label>

                                        <select class="custom-select" id="namakategori" name="namakategori">
                                            <option disabled selected> Pilih Kategori</option>
                                            <?php

                                            $sql2 = mysqli_query($con, "SELECT * FROM kategori ");
                                            while ($row2 = mysqli_fetch_array($sql2)) {
                                            ?>
                                                <option value="<?= $row2['nama_kategori'] ?>"><?= $row2['nama_kategori'] ?></option>
                                            <?php

                                            }

                                            ?>
                                        </select>
                                    </div>


                                    <div class="modal-footer">
                                        <button class="btn btn-danger mr-1" type="submit" name="pdf">PDF</button>

                                        <button type="submit" class="btn btn-success" name="excel">EXCEL</button>

                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="text-white">Data Rekomendasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="modal-body">
                                <form method="GET" action="index.php" style="text-align: center;">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <input type="search" class="form-control rounded" name="kata_cari2" value="<?php if (isset($_GET['kata_cari'])) {
                                                                                                                                echo $_GET['kata_cari'];
                                                                                                                            } ?>" placeholder="Cari Data" />

                                                <button class="btn btn-primary mr-1" nama='cari' type="submit"><i class="fas fa-search"></i></button>
                                                <a href="index.php" class="btn btn-success mr-1">Refersh</a>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_GET['kata_cari2'])) {
                                        //menampung variabel kata_cari dari form pencarian
                                        $kata_cari = $_GET['kata_cari2'];
                                    ?>

                                </form>
                            <?php

                                        $batas = 5;
                                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                        $previous = $halaman - 1;
                                        $next = $halaman + 1;

                                        $data = mysqli_query($con, "SELECT * FROM peramalan INNER JOIN rekomendasi as r on peramalan.id_peramalan=r.id_peramalan");
                                        $jumlah_data = mysqli_num_rows($data);
                                        $total_halaman = ceil($jumlah_data / $batas);


                                        $SqlQuery = mysqli_query($con, "SELECT * FROM peramalan AS p INNER JOIN rekomendasi as r on p.id_peramalan=r.id_peramalan where p.nama_kategori like '%" . $kata_cari . "%' OR p.bulan like '%" . $kata_cari . "%'  OR p.tahun like '%" . $kata_cari . "%'  OR p.jumlah like '%" . $kata_cari . "%' OR p.hasil_peramalan like '%" . $kata_cari . "%' ORDER BY p.id_peramalan ASC   limit $halaman_awal, $batas");
                                    } else {
                                        $batas = 5;
                                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                        $previous = $halaman - 1;
                                        $next = $halaman + 1;

                                        $data = mysqli_query($con, "SELECT * FROM peramalan INNER JOIN rekomendasi as r on peramalan.id_peramalan=r.id_peramalan");
                                        $jumlah_data = mysqli_num_rows($data);
                                        $total_halaman = ceil($jumlah_data / $batas);


                                        $SqlQuery = mysqli_query($con, "SELECT * FROM peramalan INNER JOIN rekomendasi as r on peramalan.id_peramalan=r.id_peramalan limit $halaman_awal, $batas");
                                    }
                            ?>
                            <div class="table-responsive mt-3">
                                <table class="table table-striped mb-0 admin" id="admin">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Kategori</th>
                                            <th>Hasil</th>
                                            <th>Rekomendasi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if (mysqli_num_rows($SqlQuery) > 0) {
                                            while ($row = mysqli_fetch_array($SqlQuery)) {
                                        ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row['bulan'] ?></td>
                                                    <td><?= $row['tahun'] ?></td>
                                                    <td><?= $row['nama_kategori'] ?></td>
                                                    <td><?= $row['hasil_peramalan'] ?></td>
                                                    <td><?= $row['rekomendet'] ?></td>


                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan=\"8\" align=\"center\">data tidak ada</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <nav>
                                    <ul class="pagination justify-content-center mt-3">
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman > 1) {
                                                                        echo "href='?halaman=$previous'";
                                                                    } ?>>Previous</a>
                                        </li>
                                        <?php
                                        for ($x = 1; $x <= $total_halaman; $x++) {
                                        ?>
                                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                        echo "href='?halaman=$next'";
                                                                    } ?>>Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Data Peramalan</h4>
            </div>
            <div class="card-body">

                <form method="GET" action="index.php" style="text-align: center;">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="search" class="form-control rounded" name="kata_cari" value="<?php if (isset($_GET['kata_cari'])) {
                                                                                                                echo $_GET['kata_cari'];
                                                                                                            } ?>" placeholder="Cari Data" />

                                <button class="btn btn-primary mr-1" nama='cari' type="submit"><i class="fas fa-search"></i></button>
                                <a href="index.php" class="btn btn-success mr-1">Refersh</a>

                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['kata_cari'])) {
                        //menampung variabel kata_cari dari form pencarian
                        $kata_cari = $_GET['kata_cari'];
                    ?>

                </form>
            <?php

                        $batas = 5;
                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                        $previous = $halaman - 1;
                        $next = $halaman + 1;

                        $data = mysqli_query($con, "select * from peramalan");
                        $jumlah_data = mysqli_num_rows($data);
                        $total_halaman = ceil($jumlah_data / $batas);
                        $SqlQuery = mysqli_query($con, "SELECT * FROM peramalan where nama_kategori like '%" . $kata_cari . "%' OR bulan like '%" . $kata_cari . "%'  OR tahun like '%" . $kata_cari . "%'  OR jumlah like '%" . $kata_cari . "%' OR hasil_peramalan like '%" . $kata_cari . "%' ORDER BY id_peramalan ASC   limit $halaman_awal, $batas");
                    } else {
                        $batas = 5;
                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                        $previous = $halaman - 1;
                        $next = $halaman + 1;

                        $data = mysqli_query($con, "select * from peramalan");
                        $jumlah_data = mysqli_num_rows($data);
                        $total_halaman = ceil($jumlah_data / $batas);
                        $SqlQuery = mysqli_query($con, "SELECT * FROM peramalan   limit $halaman_awal, $batas");
                    }
            ?>
            <div class="table-responsive">
                <table class="table table-striped mb-0 admin" id="admin">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Bulan </th>
                            <th>Tahun </th>
                            <th>Jumlah</th>
                            <th>Hasil Peramalan</th </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (mysqli_num_rows($SqlQuery) > 0) {
                            while ($row = mysqli_fetch_array($SqlQuery)) {
                        ?>

                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $row['nama_kategori'] ?></td>
                                <td class="text-center"><?= $row['bulan'] ?></td>
                                <td class="text-center"><?= $row['tahun'] ?></td>
                                <td class="text-center"><?= $row['jumlah'] ?></td>
                                <td class="text-center"><?= $row['hasil_peramalan']  ?></td>

                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan=\"8\" align=\"center\">data tidak ada</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination justify-content-center mt-3">
                        <li class="page-item">
                            <a class="page-link" <?php if ($halaman > 1) {
                                                        echo "href='?halaman=$previous'";
                                                    } ?>>Previous</a>
                        </li>
                        <?php
                        for ($x = 1; $x <= $total_halaman; $x++) {
                        ?>
                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                        echo "href='?halaman=$next'";
                                                    } ?>>Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
            </div>
            </section>
        </div>
    </div>
</div>
</div>
</div>

<?php
if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $namakategori = $_POST['namakategori'];

    $save = mysqli_query($con, "INSERT INTO kategori VALUES ('$id', '$namakategori')") or die(mysqli_error($con));


    echo "<script type='text/javascript'>
                                setTimeout(function () { 
                                    swal({ 
                                        title: 'Suksess', 
                                        text: 'Data Berhasil Disimpan', 
                                        type: 'success',
                                         timer: 3000,
                                          showConfirmButton: false });
                                },10);  
                                window.setTimeout(function(){ 
                                  window.location.replace('index.php');
                                } ,3000); 
                                </script>";
}


?>

<script>
    $(document).ready(function() {
        $('.admin').DataTable({
            "paging": true,

        });

    });
</script>

<script>
    // swall
    $('.delete-data').on('click', function(e) {
        e.preventDefault();
        var getLink = $(this).attr('href');

        Swal.fire({
            title: 'Apa Anda Yakin?',
            text: "Data akan dihapus permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                window.location.href = getLink;
            }
        })
    });
</script>
<?php include_once('footer.php');

?>