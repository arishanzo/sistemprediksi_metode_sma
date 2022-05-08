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
                            <h4 class="text-white">Input Data Penjualan</h4>
                        </div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-body">

                                        <form action="" enctype="multipart/form-data" method="post">

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
                                                        <option value="<?= $row2['id_kategori'] ?>"><?= $row2['nama_kategori'] ?></option>
                                                    <?php

                                                    }

                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="Bulan">
                                                    <div class="section-title mt-0"> Bulan </div>
                                                </label>

                                                <select class="custom-select" id="Bulan" name="Bulan">
                                                    <option selected disabled>Pilih Bulan</option>
                                                    <option value="Januari">Januari</option>
                                                    <option value="Febuari">Febuari</option>
                                                    <option value="Maret">Maret</option>
                                                    <option value="Appril">Appril</option>
                                                    <option value="Mei">Mei</option>
                                                    <option value="Juni">Juni</option>
                                                    <option value="Juli">Juli</option>
                                                    <option value="Agustus">Agustus</option>
                                                    <option value="September">September</option>
                                                    <option value="Oktober">Oktober</option>
                                                    <option value="November">November</option>
                                                    <option value="Desember">Desember</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="tahun">
                                                    <div class="section-title mt-0"> Tahun </div>
                                                </label>

                                                <select class="custom-select" id="Tahun" name="Tahun">
                                                    <option selected disabled>Pilih Tahun</option>
                                                    <?php
                                                    for ($i = date('Y'); $i >= date('Y') - 32; $i -= 1) {
                                                        echo "<option value='$i'> $i </option>";
                                                    }
                                                    ?>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <div class="section-title mt-0">Jumlah Penjualan</div>
                                                <div class="input-group mb-2">
                                                    <input type="number" class="form-control" name="jmlhpenjualan" required>
                                                </div>
                                            </div>

                                            <div class="card-footer bg-white">
                                                <button class="btn btn-primary mr-1" type="submit" name="submit">Submit</button>

                                            </div>
                                            </from>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $idadmin = @$_SESSION['id_admin'];
            $id = $_POST['namakategori'];

            $jmlh = $_POST['jmlhpenjualan'];
            $bulan = $_POST['Bulan'];
            $tahun = $_POST['Tahun'];

            $sql2 = mysqli_query($con, "SELECT * FROM kategori  where id_kategori='$id'");
            $row2 = mysqli_fetch_array($sql2);

            $namakategori = $row2['nama_kategori'];

            $sql = mysqli_query($con, "SELECT * FROM data where nama_kategori ='$namakategori' OR bulan='$bulan' OR tahun='$tahun'");
            $row = mysqli_num_rows($sql);
            if ($row > 0) {

                echo "<script type='text/javascript'>
                                        setTimeout(function () { 
                                            swal({ 
                                                title: 'Maaf', 
                                                text: 'Data sudah ada', 
                                                type: 'warning',
                                                 timer: 5000,
                                                  showConfirmButton: false });
                                        },10);  
                                        window.setTimeout(function(){ 
                                          window.location.replace('index.php');
                                        } ,3000); 
                                        </script>";
            } else {

                $save = mysqli_query($con, "INSERT INTO data VALUES ('', '$idadmin', '$id', '$namakategori', '$bulan', '$tahun', '$jmlh')") or die(mysqli_error($con));

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
                                          window.location.replace('add.php');
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