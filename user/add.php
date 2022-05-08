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
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Tambah Data</h4>
                    </div>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="card-body">
                                    <?php
                                    // mengambil data barang dengan kode paling besar
                                    $query = mysqli_query($con, "SELECT max(id_admin) as maxKode FROM admin ");
                                    $data = mysqli_fetch_array($query);
                                    $id = $data['maxKode'];

                                    // // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                                    // // dan diubah ke integer dengan (int)
                                    // $urutan = (int) substr($id, 1, 1);
                                    $urutan = $id;
                                    $urutan++;
                                    $huruf = "";
                                    $id = $huruf . sprintf("%03s", $urutan);
                                    ?>
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <div class="section-title mt-0">Id Admin</div>
                                            <div class="input-group mb-2">
                                                <input type="text" name="id" class="form-control" value="<?php echo $id ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="section-title mt-0">Nama</div>
                                            <div class="input-group mb-2">
                                                <input type="text" name="nama" required autofocus class="form-control" placeholder="Isi Nama Anda">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="section-title mt-0">Username</div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="username" required placeholder="Isi Username Anda">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="section-title mt-0">Password</div>
                                            <div class="input-group mb-2">
                                                <input type="password" class="form-control" name="password" required placeholder="Isi Password Anda">
                                            </div>
                                        </div>
                                </div>

                                <div class="card-footer bg-white text-right">
                                    <button class="btn btn-primary mr-1" type="submit" name="submit">Submit</button>
                                    <button class="btn btn-danger" type="reset">Reset</button>
                                </div>
                                </from>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_POST['submit'])) {

            $id_user = $_POST['id'];
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $pass_enskripsi = md5($password);

            $save = mysqli_query($con, "INSERT INTO admin VALUES ('$id_user', '$nama', '$username', '$pass_enskripsi')") or die(mysqli_error($con));

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
        }


        ?>

        <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
        <?php include_once('footer.php');

        ?>