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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="text-white">Data Penjualan</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-body" style="text-align: right;">
                                <a class="btn btn-primary btn-action btn-xs mr-1" href="add.php" data-toggle="tooltip" title="Tambah Data"><span>Tambah Data</span></a>
                            </div>
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

                                    $batas = 10;
                                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                    $previous = $halaman - 1;
                                    $next = $halaman + 1;

                                    $data = mysqli_query($con, "select * from data");
                                    $jumlah_data = mysqli_num_rows($data);
                                    $total_halaman = ceil($jumlah_data / $batas);
                                    $SqlQuery = mysqli_query($con, "SELECT * FROM `data` AS ak INNER JOIN kategori AS st ON st.id_kategori=ak.id_kategori  WHERE ak.id_kategori=ak.id_kategori && ak.nama_kategori like '%" . $kata_cari . "%' OR ak.bulan like '%" . $kata_cari . "%'  OR ak.tahun like '%" . $kata_cari . "%'  OR ak.jumlah like '%" . $kata_cari . "%' ORDER BY ak.id_data ASC limit $halaman_awal, $batas ");
                                } else {
                                    $batas = 10;
                                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                    $previous = $halaman - 1;
                                    $next = $halaman + 1;

                                    $data = mysqli_query($con, "SELECT * FROM `data` AS ak INNER JOIN kategori AS st ON st.id_kategori=ak.id_kategori  WHERE ak.id_kategori=ak.id_kategori");
                                    $jumlah_data = mysqli_num_rows($data);
                                    $total_halaman = ceil($jumlah_data / $batas);

                                    $SqlQuery = mysqli_query($con, "SELECT * FROM `data` AS ak INNER JOIN kategori AS st ON st.id_kategori=ak.id_kategori  WHERE ak.id_kategori=ak.id_kategori limit $halaman_awal, $batas ");
                                }
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0 admin" id="admin">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Jumlah</th>
                                        <th>Action</th>
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
                                                <td><?= $row['nama_kategori'] ?></td>
                                                <td><?= $row['bulan'] ?></td>
                                                <td><?= $row['tahun'] ?></td>
                                                <td><?= $row['jumlah'] ?></td>
                                                <td>
                                                    <a href="edit.php?id=<?= $row['id_data'] ?>" class="btn btn-primary btn-action mr-1" title="Edit"><i class="fas fa-pencil-alt"></i></a>

                                                    <a href="delete.php?id=<?= $row['id_data'] ?>" class="btn btn-danger btn-xs delete-data" title="hapus"><i class="fas fa-trash"></i></a>
                                                </td>

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
    <div>
    </div>
</div>

<?php include_once('footer.php');
?>