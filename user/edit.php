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
                                    $id = @$_GET['id'];
                                    $sql_user = mysqli_query($con, "SELECT * FROM admin WHERE id_admin = '$id'") or die(mysqli_error($con));
                                    $data = mysqli_fetch_array($sql_user)
                                    ?>
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <div class="section-title mt-0">Id admin</div>
                                            <div class="input-group mb-2">
                                                <input type="text" name="id" class="form-control" value="<?= $data['id_admin'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="section-title mt-0">Nama</div>
                                            <div class="input-group mb-2">
                                                <input type="text" name="nama" required autofocus class="form-control" value="<?= $data['nama_admin'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="section-title mt-0">Username</div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="section-title mt-0">Password</div>
                                            <div class="input-group mb-2">
                                                <input type="password" class="form-control" name="password" value="<?= $data['password'] ?>">
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
            $idadmin = $_POST['id'];
            $nama = $_POST['nama'];
            $username = $_POST['username'];

            $password = $_POST['password'];
            $pass = md5($password);

            $data = mysqli_query($con, "select * from admin Where id_admin='$idadmin'");
            $row = mysqli_fetch_array($data);

            if ($password == $row['password']) {


                $update = mysqli_query($con, "UPDATE admin set nama_admin = '$nama', username='$username' WHERE id_admin = '$idadmin'") or die(mysqli_error($con));

                echo "<script type='text/javascript'>
                        setTimeout(function () { 
                            swal({ 
                                title: 'success', 
                                text: 'Berhasil Di Update', 
                                type: 'success',
                                 timer: 3000,
                                  showConfirmButton: false });
                        },10);  
                        window.setTimeout(function(){ 
                          window.location.replace('index.php');
                        } ,3000); 
                        </script>";
            } else {
                $update = mysqli_query($con, "UPDATE admin set nama_admin = '$nama', username='$username', password='$pass' WHERE id_admin = '$idadmin'") or die(mysqli_error($con));

                echo "<script type='text/javascript'>
                        setTimeout(function () { 
                            swal({ 
                                title: 'success', 
                                text: 'Berhasil Di Update', 
                                type: 'success',
                                 timer: 3000,
                                  showConfirmButton: false });
                        },10);  
                        window.setTimeout(function(){ 
                          window.location.replace('index.php');
                        } ,3000); 
                        </script>";
            }
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