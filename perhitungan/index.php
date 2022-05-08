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
                            <h4 class="text-white"></h4>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="card-body">
                                            <form action="hasil.php" enctype="multipart/form-data" method="get">
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

                                                <div class="form-group">
                                                    <label for="Bulan">
                                                        <div class="section-title mt-0"> Bulan </div>
                                                    </label>

                                                    <select class="custom-select" id="Bulan" name="Bulan">
                                                        <option selected disabled>Pilih Bulan</option>
                                                        <option value="Januari">Januari</option>
                                                        <option value="Febuari">Februari</option>
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
                                                        <option value="2022">2022</option>

                                                    </select>
                                                </div>
                                                <div class="card-footer bg-white">
                                                    <button class="btn btn-primary mr-1" type="submit" name="submit">Hitung</button>
                                                </div>
                                                </from>
                                                <div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <?php include_once('footer.php');
        ?>