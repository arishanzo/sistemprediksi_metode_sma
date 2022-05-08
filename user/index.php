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
                            <h4 class="text-white">Data Admin</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <a class="btn btn-primary btn-action btn-xs mr-1" href="add.php" data-toggle="tooltip" title="Tambah Data"><span>Tambah Admin</span></a>
                            </div>
                            <form method="GET" action="index.php" style="text-align: center;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input type="search" class="form-control rounded" name="kata_cari" value="<?php if (isset($_GET['kata_cari'])) {
                                                                                                                            echo $_GET['kata_cari'];
                                                                                                                        } ?>" placeholder="Cari Data" />


                                            <button class="btn btn-primary mr-1" type="submit"><i class="fas fa-search"></i></button>
                                            <a href="index.php" class="btn btn-success mr-1">Refersh</a>

                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (isset($_GET['kata_cari'])) {
                                    //menampung variabel kata_cari dari form pencarian
                                    $kata_cari = $_GET['kata_cari'];

                                    //jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
                                    //jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
                                    $query = "SELECT * FROM admin WHERE nama_admin like '%" . $kata_cari . "%' OR username like '%" . $kata_cari . "%' ORDER BY id_admin ASC";

                                ?>

                            </form>
                        <?php

                                    $batas = 10;
                                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                    $previous = $halaman - 1;
                                    $next = $halaman + 1;

                                    $data = mysqli_query($con, "select * from admin");
                                    $jumlah_data = mysqli_num_rows($data);
                                    $total_halaman = ceil($jumlah_data / $batas);

                                    $SqlQuery = mysqli_query($con, "select * from admin WHERE nama_admin like '%" . $kata_cari . "%' OR username like '%" . $kata_cari . "%' ORDER BY id_admin ASC limit $halaman_awal, $batas");
                                } else {

                                    $batas = 10;
                                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                    $previous = $halaman - 1;
                                    $next = $halaman + 1;

                                    $data = mysqli_query($con, "select * from admin");
                                    $jumlah_data = mysqli_num_rows($data);
                                    $total_halaman = ceil($jumlah_data / $batas);

                                    $SqlQuery = mysqli_query($con, "select * from admin  limit $halaman_awal, $batas");
                                }
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0 admin" id="admin">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
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
                                                <td><?= $row['nama_admin'] ?></td>
                                                <td><?= $row['username'] ?></td>
                                                <td>
                                                    <a href="edit.php?id=<?= $row['id_admin'] ?>" class="btn btn-primary btn-action mr-1" title="Edit"><i class="fas fa-pencil-alt"></i></a>

                                                    <a href="delete.php?id=<?= $row['id_admin'] ?>" class="btn btn-danger btn-xs delete-data" title="hapus"><i class="fas fa-trash"></i></a>
                                                </td>

                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan=\"4\" align=\"center\">data tidak ada</td></tr>";
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
</div>
</div>
</div>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<?php
if (isset($_POST['submit'])) {
    $tempdir = "asset/assets/img/fotouser";

    $id_user = $_POST['iduser'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pass_enskripsi = md5($password);
    $jabatan = $_POST['jabatan'];
    $File = $_POST['customFile'];
    $file_name = $_FILES['customFile']['name'];

    if ($file == '') {
        echo "<script type='text/javascript'>
                            setTimeout(function () { 
                                swal({ 
                                    title: 'Warning', 
                                    text: 'HARAP UPLOAD FOTO TERLEBIH DAHULU', 
                                    type: 'warning',
                                     timer: 3000,
                                      showConfirmButton: false });
                            },10);  
                            window.setTimeout(function(){ 
                              window.location.replace('#');
                            } ,3000); 
                            </script>";
    } else {
        $file_name = $_FILES['customFile']['name'];
        $file_size = $_FILES['customFile']['size'];
        $file_type = $_FILES['customFile']['type'];

        $image   = addslashes(file_get_contents($_FILES['customFile']['tmp_name']));

        $tmp_name = $_FILES['customFile']['tmp_name'];
        move_uploaded_file($tmp_name, "../asset/assets/img/fotouser" . $file_name);

        if ($file_size < 2048000 and ($file_type == 'image/jpeg' or $file_type == 'image/png' or $file_type == 'image/jpg')) {
            $save = mysqli_query($con, "INSERT INTO user VALUES ('$id_user', '$nama', '$username', '$pass_enskripsi', '$jabatan','$file_name' )") or die(mysqli_error($con));

            echo "<script type='text/javascript'>
                                setTimeout(function () { 
                                    swal({ 
                                        title: 'Suksess', 
                                        text: 'Data Berhasil Disimpan $nama', 
                                        type: 'success',
                                         timer: 3000,
                                          showConfirmButton: false });
                                },10);  
                                window.setTimeout(function(){ 
                                  window.location.replace('index.php');
                                } ,3000); 
                                </script>";
        } else {
            echo "<script type='text/javascript'>
                                setTimeout(function () { 
                                    swal({ 
                                        title: 'Warning', 
                                        text: 'File Melebihi Ukuran atau Tidak Sesuai', 
                                        type: 'warning',
                                         timer: 3000,
                                          showConfirmButton: false });
                                },10);  
                                window.setTimeout(function(){ 
                                  window.location.replace('index.php');
                                } ,3000); 
                                </script>";
        }
    }
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
<div>
</div>
</div>

<?php include_once('footer.php');
?>