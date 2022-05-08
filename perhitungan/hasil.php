<?php include_once('header.php');
require_once "../config/config.php";
$tahun = $_GET['Tahun'];

$SqlQuery = mysqli_query($con, "SELECT * FROM data where tahun = '$tahun'");

if (mysqli_num_rows($SqlQuery) > 0) {

    $SqlJuli = mysqli_query($con, "SELECT * FROM data where bulan = 'Juli' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rowjuli = mysqli_fetch_array($SqlJuli);

    $Sqlagustus = mysqli_query($con, "SELECT * FROM data where bulan = 'Agustus' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rowagustus = mysqli_fetch_array($Sqlagustus);

    $Sqlseptember = mysqli_query($con, "SELECT * FROM data where bulan = 'September' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rowseptember = mysqli_fetch_array($Sqlseptember);


    // Bulan Oktober

    $juli = $rowjuli['jumlah'];
    $agustus = $rowagustus['jumlah'];
    $september = $rowseptember['jumlah'];

    $jmlhOktober =  $september + $agustus + $juli;
    $smaoktober = abs($jmlhOktober / 3);

    $Sqloktober = mysqli_query($con, "SELECT * FROM data where bulan = 'Oktober' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rowoktober = mysqli_fetch_array($Sqloktober);

    $mfeoktober = round($rowoktober['jumlah'] - $smaoktober);
    $maeoktober = abs($mfeoktober);
    $mseoktober = $mfeoktober * $mfeoktober;
    $Mapeoktober = round($mfeoktober / $rowoktober['jumlah'] * 100);

    if ($maeoktober == 'INF') {
        $Mapeoktoberhasil = '0';
    } else {
        $Mapeoktoberhasil = $Mapeoktober;
    }

    // Bulan November
    $agustus1 = $rowagustus['jumlah'];
    $september1 = $rowseptember['jumlah'];
    $oktober = $rowoktober['jumlah'];

    $jmlhnovember =  $agustus1 + $september1 + $oktober;
    $smanovember = abs($jmlhnovember / 3);

    $Sqlnovember = mysqli_query($con, "SELECT * FROM data where bulan = 'November' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rownovember = mysqli_fetch_array($Sqlnovember);

    $mfenovember = round($rownovember['jumlah'] - $smanovember);
    $maenovember = abs($mfenovember);
    $msenovember = $mfenovember * $mfenovember;
    $Mapenovember = round($maenovember / $rownovember['jumlah'] * 100);

    if ($maenovember == 'INF') {
        $Mapenovemberhasil = '0';
    } else {
        $Mapenovemberhasil = $Mapenovember;
    }

    // Bulan Desember
    $september2 = $rowseptember['jumlah'];
    $oktober1 = $rowoktober['jumlah'];
    $november = $rownovember['jumlah'];

    $jmlhdesember =  $september2 + $oktober1 + $november;
    $smadesember = abs($jmlhdesember / 3);

    $Sqldesember = mysqli_query($con, "SELECT * FROM data where bulan = 'desember' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rowdesember = mysqli_fetch_array($Sqldesember);

    $mfedesember = round($rowdesember['jumlah'] - $smadesember);
    $maedesember = abs($mfedesember);
    $msedesember = $mfedesember * $mfedesember;
    $Mapedesember = round($mfedesember / $rowdesember['jumlah'] * 100);
    $Mapedesember1 = abs($Mapedesember);

    if ($maedesember == 'INF') {
        $Mapedesemberhasil = '0';
    } else {
        $Mapedesemberhasil = $Mapedesember1;
    }
    // Bulan Januari
    $oktober2 = $rowoktober['jumlah'];
    $november1 = $rownovember['jumlah'];
    $desember = $rowdesember['jumlah'];

    $jmlhjanuari =  $oktober2 + $november1 + $desember;
    $smajanuari = round($jmlhjanuari / 3);

    $Sqljanuari = mysqli_query($con, "SELECT * FROM data where bulan = 'januari' && tahun='2022' && nama_kategori='$_GET[namakategori]'");
    $rowjanuari = mysqli_fetch_array($Sqljanuari);

    $mfejanuari = round($rowjanuari['jumlah'] - $smajanuari);
    $maejanuari = abs($mfejanuari);
    $msejanuari = $mfejanuari * $mfejanuari;
    $Mapejanuari = round($mfejanuari / $rowjanuari['jumlah'] * 100);

    if ($maejanuari == 'INF') {
        $Mapejanuarihasil = '0';
    } else {
        $Mapejanuarihasil = $Mapejanuari;
    }

    // Bulan Februari
    $totalmfe = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmae = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmse = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmape = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;
    if ($totalmape == 'INF') {
        $Mapefebhasil = '0';
    } else {
        $Mapefebhasil = $totalmape;
    }
    $totalmfefeb = round($totalmfe / 4);
    $totalmaefeb = round($totalmae / 4);
    $totalmsefeb = round($totalmse / 4);
    $totalmapefeb = round($totalmape / 4);

    $november2 = $rownovember['jumlah'];
    $desember1 = $rowdesember['jumlah'];
    $januari = $rowjanuari['jumlah'];
    $jmlhfebruari =  $november2 + $desember1 + $januari;
    $smafebruari = round($jmlhfebruari / 3);

    // Bulan Maret
    $totalmfemaret = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari + $totalmfefeb;
    $totalmaemaret = $maeoktober + $maenovember + $maedesember + $maejanuari + $totalmaefeb;
    $totalmsemaret = $mseoktober + $msenovember + $msedesember + $msejanuari + $totalmsefeb;
    $totalmapemaret = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari + $totalmapefeb;
    if ($totalmape == 'INF') {
        $Mapefebhasil = '0';
    } else {
        $Mapefebhasil = $totalmape;
    }
    $totalmfemar = $totalmfemaret / 4;
    $totalmaemar = $totalmaemaret / 4;
    $totalmsemar = $totalmsemaret / 4;
    $totalmapemar = $totalmapemaret / 4;

    $desember2 = $rowdesember['jumlah'];
    $januari1 = $rowjanuari['jumlah'];
    $februari = $smafebruari;

    $jmlhmaret =  $desember2 + $januari1 + $februari;
    $smamaret = round($jmlhmaret / 3);


    // Bulan Appril
    $totalmfe = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmae = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmse = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmape = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;
    if ($totalmape == 'INF') {
        $Mapefebhasil = '0';
    } else {
        $Mapefebhasil = $totalmape;
    }
    $totalmfemar = $totalmfe / 4;
    $totalmaemar = $totalmae / 4;
    $totalmsemar = $totalmse / 4;
    $totalmapemar = $totalmape / 4;

    $januari2 = $rowjanuari['jumlah'];
    $februari1 = $smafebruari;
    $maret = $smamaret;
    $jmlhappril =  $januari2 + $februari1 + $maret;
    $smaappril = ceil($jmlhappril / 3);

    // Bulan Mei
    $totalmfe = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmae = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmse = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmape = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;
    if ($totalmape == 'INF') {
        $Mapefebhasil = '0';
    } else {
        $Mapefebhasil = $totalmape;
    }
    $totalmfemar = $totalmfe / 4;
    $totalmaemar = $totalmae / 4;
    $totalmsemar = $totalmse / 4;
    $totalmapemar = $totalmape / 4;

    $februari3 = $smafebruari;
    $maret1 = $smamaret;
    $appril = $smaappril;
    $jmlhmei =  $februari3 + $maret1 + $appril;
    $smamei = ceil($jmlhmei / 3);

    // Bulan Juni
    $totalmfe = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmae = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmse = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmape = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;
    if ($totalmape == 'INF') {
        $Mapefebhasil = '0';
    } else {
        $Mapefebhasil = $totalmape;
    }
    $totalmfemar = $totalmfe / 4;
    $totalmaemar = $totalmae / 4;
    $totalmsemar = $totalmse / 4;
    $totalmapemar = $totalmape / 4;

    $maret2 = $smamaret;
    $appril1 = $smaappril;
    $mei = $smamei;
    $jmlhjun =  $maret2 + $appril1 + $mei;
    $smajun = ceil($jmlhjun / 3);

    // Bulan Juli
    $totalmfe = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmae = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmse = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmape = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;
    if ($totalmape == 'INF') {
        $Mapefebhasil = '0';
    } else {
        $Mapefebhasil = $totalmape;
    }
    $totalmfemar = $totalmfe / 4;
    $totalmaemar = $totalmae / 4;
    $totalmsemar = $totalmse / 4;
    $totalmapemar = $totalmape / 4;

    $appril2 = $smaappril;
    $mei1 = $smamei;
    $juni = $smajun;

    $jmlhjuli =  $appril2 + $mei1 + $juni;
    $smajuli = ceil($jmlhjuli / 3);

    // Bulan Agustus
    $totalmfe = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmae = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmse = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmape = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;
    if ($totalmape == 'INF') {
        $Mapefebhasil = '0';
    } else {
        $Mapefebhasil = $totalmape;
    }
    $totalmfemar = $totalmfe / 4;
    $totalmaemar = $totalmae / 4;
    $totalmsemar = $totalmse / 4;
    $totalmapemar = $totalmape / 4;

    $mei2 = $smamei;
    $juni1 = $smajun;
    $juli = $smajuli;

    $jmlhagus =  $mei2 + $juni1 + $juli;
    $smaagus = ceil($jmlhagus / 3);

    // Bulan September
    $totalmfe = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmae = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmse = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmape = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;
    if ($totalmape == 'INF') {
        $Mapefebhasil = '0';
    } else {
        $Mapefebhasil = $totalmape;
    }
    $totalmfemar = $totalmfe / 4;
    $totalmaemar = $totalmae / 4;
    $totalmsemar = $totalmse / 4;
    $totalmapemar = $totalmape / 4;

    $juni2 = $smajun;
    $juli1 = $smajuli;
    $agustus = $smaagus;

    $jmlhsep =  $juni2 + $juli1 + $agustus;
    $smasep = ceil($jmlhsep / 3);


    // Bulan September
    $totalmfe = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmae = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmse = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmape = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;
    if ($totalmape == 'INF') {
        $Mapefebhasil = '0';
    } else {
        $Mapefebhasil = $totalmape;
    }
    $totalmfemar = $totalmfe / 4;
    $totalmaemar = $totalmae / 4;
    $totalmsemar = $totalmse / 4;
    $totalmapemar = $totalmape / 4;

    $juli2 = $smajuli * 1;
    $agustus1 = $smaagus * 2;
    $september1 = $smasep * 3;

    $jmlhokto =  $juli2 + $agustus1 + $september1;
    $smaokto = ceil($jmlhokto / 6);

    // Bulan November
    $totalmfe = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmae = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmse = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmape = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;
    if ($totalmape == 'INF') {
        $Mapefebhasil = '0';
    } else {
        $Mapefebhasil = $totalmape;
    }
    $totalmfemar = $totalmfe / 4;
    $totalmaemar = $totalmae / 4;
    $totalmsemar = $totalmse / 4;
    $totalmapemar = $totalmape / 4;

    $agustus2 = $smaagus;
    $september1 = $smasep;
    $oktober1 = $smaokto;

    $jmlhnov =  $agustus2 + $september1 + $oktober1;
    $smanov = ceil($jmlhnov / 3);

    // Bulan Desember
    $totalmfe = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmae = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmse = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmape = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;
    if ($totalmape == 'INF') {
        $Mapefebhasil = '0';
    } else {
        $Mapefebhasil = $totalmape;
    }
    $totalmfemar = $totalmfe / 4;
    $totalmaemar = $totalmae / 4;
    $totalmsemar = $totalmse / 4;
    $totalmapemar = $totalmape / 4;

    $september2 = $smasep;
    $oktober2 = $smaokto;
    $november1 = $smanov;

    $jmlhdes =  $september2 + $oktober2 + $november1;
    $smades = ceil($jmlhdes / 3);

?>


    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <?php
            if ($_GET['Bulan'] == 'Febuari') {
            ?>
                <!-- Content Row -->
                <div class="row">

                    <div class="row col-lg-12">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <?php
                                    $Sql = mysqli_query($con, "SELECT * FROM kategori where nama_kategori='$_GET[namakategori]'");
                                    $row = mysqli_fetch_array($Sql);

                                    ?>
                                    <h4 class="text-white">Hasil Prediksi Bulan Februari Kategori <?= $row['nama_kategori']  ?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <div class="card-body">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped mb-0">
                                                                    <thead class="bg-primary text-white">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Bulan</th>
                                                                            <th>Tahun</th>
                                                                            <th>Jumlah Penjualan</th>
                                                                            <th>SMA</th>
                                                                            <th>ERROR</th>
                                                                            <th>[ERROR]</th>
                                                                            <th>ERROR'2</th>
                                                                            <th>%ERROR</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <td>1</td>
                                                                        <td>OKTOBER</td>
                                                                        <td>2021</td>
                                                                        <?php
                                                                        $Sql = mysqli_query($con, "SELECT * FROM data where nama_kategori='$_GET[namakategori]' && bulan='Oktober' && tahun='2021'");
                                                                        $row = mysqli_fetch_array($Sql);

                                                                        ?>
                                                                        <td><?= $row['jumlah'] ?></td>
                                                                        <td><?= $smaoktober ?></td>
                                                                        <td><?= $mfeoktober ?></td>
                                                                        <td><?= $maeoktober ?></td>
                                                                        <td><?= $mseoktober ?></td>
                                                                        <td><?= $Mapeoktoberhasil ?> %</td>
                                                                    </tbody>

                                                                    <tbody>
                                                                        <td>2</td>
                                                                        <td>November</td>
                                                                        <td>2021</td>
                                                                        <?php
                                                                        $Sql = mysqli_query($con, "SELECT * FROM data where nama_kategori='$_GET[namakategori]' && bulan='November' && tahun='2021'");
                                                                        $row = mysqli_fetch_array($Sql);

                                                                        ?>
                                                                        <td><?= $row['jumlah'] ?></td>
                                                                        <td><?= $smanovember ?></td>
                                                                        <td><?= $mfenovember ?></td>
                                                                        <td><?= $maenovember ?></td>
                                                                        <td><?= $msenovember ?></td>
                                                                        <td><?= $Mapenovemberhasil ?> %</td>
                                                                    </tbody>


                                                                    <tbody>
                                                                        <td>3</td>
                                                                        <td>Desember</td>
                                                                        <td>2021</td>
                                                                        <?php
                                                                        $Sql = mysqli_query($con, "SELECT * FROM data where nama_kategori='$_GET[namakategori]' && bulan='Desember' && tahun='2021'");
                                                                        $row = mysqli_fetch_array($Sql);

                                                                        ?>
                                                                        <td><?= $row['jumlah'] ?></td>
                                                                        <td><?= $smadesember ?></td>
                                                                        <td><?= $mfedesember ?></td>
                                                                        <td><?= $maedesember ?></td>
                                                                        <td><?= $msedesember ?></td>
                                                                        <td><?= $Mapedesemberhasil ?> %</td>
                                                                    </tbody>


                                                                    <tbody>
                                                                        <td>4</td>
                                                                        <td>Januari</td>
                                                                        <td>2021</td>
                                                                        <?php
                                                                        $Sql = mysqli_query($con, "SELECT * FROM data where nama_kategori='$_GET[namakategori]' && bulan='Januari' && tahun='2022'");
                                                                        $row = mysqli_fetch_array($Sql);

                                                                        ?>
                                                                        <td><?= $row['jumlah'] ?></td>
                                                                        <td><?= $smajanuari ?></td>
                                                                        <td><?= $mfejanuari ?></td>
                                                                        <td><?= $maejanuari ?></td>
                                                                        <td><?= $msejanuari ?></td>
                                                                        <td><?= $Mapejanuarihasil ?> %</td>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <td class="text-right font-weight-bold" colspan="5">
                                                                                Total
                                                                            </td>
                                                                            <td class="font-weight-bold">
                                                                                <?= $totalmfe ?>
                                                                            </td>
                                                                            <td class="font-weight-bold">
                                                                                <?= $totalmae ?>
                                                                            </td>
                                                                            <td class="font-weight-bold">
                                                                                <?= $totalmse ?>
                                                                            </td>
                                                                            <td class="font-weight-bold">
                                                                                <?= $totalmape ?> %
                                                                            </td>
                                                                        </tr>

                                                                        <tr class="bg-dark text-white">
                                                                            <td>5</td>
                                                                            <td>Februari</td>
                                                                            <td>2022</td>
                                                                            <td></td>
                                                                            <td><?= $smafebruari ?></td>
                                                                            <td><?= ceil($totalmfefeb) ?></td>
                                                                            <td><?= ceil($totalmaefeb) ?></td>
                                                                            <td><?= ceil($totalmsefeb) ?></td>
                                                                            <td><?= ceil($totalmapefeb) ?> %</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td class="text-right font-weight-bold" colspan="7">
                                                                                MAD</td>
                                                                            <td class=" font-weight-bold">MSE</td>
                                                                            <td class="font-weight-bold">MAPE</td>
                                                                        </tr>
                                                                    </tfoot>
                                                                    </tbody>
                                                                </table>
                                                                <form action="" enctype="multipart/form-data" method="post">
                                                                    <div class="card-footer bg-white text-right">
                                                                        <button class="btn btn-primary mr-1" type="submit" name="submit">Lihat Rekomendasi</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                } else {
                                    ?>
                                        <!-- Content Row -->
                                        <div class="row">

                                            <div class="row col-lg-12">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header bg-dark">
                                                            <?php
                                                            $Sql = mysqli_query($con, "SELECT * FROM kategori where nama_kategori='$_GET[namakategori]'");
                                                            $row = mysqli_fetch_array($Sql);

                                                            ?>
                                                            <h4 class="text-white">Hasil Prediksi Bulan <?= $_GET['Bulan']  ?> Kategori <?= $row['nama_kategori']  ?></h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="container">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <div class="card-body">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-striped mb-0">
                                                                                            <thead class="bg-primary text-white">
                                                                                                <tr>
                                                                                                    <th>No</th>
                                                                                                    <th>Bulan</th>
                                                                                                    <th>Tahun</th>
                                                                                                    <th>Jumlah Penjualan</th>
                                                                                                    <th>Hasil Peramalan</th>

                                                                                                    <th>Rekomendasi</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <?php
                                                                                            if ($_GET['Bulan'] == 'Maret') {
                                                                                            ?>
                                                                                                <tbody class="bg-warning">
                                                                                                    <td>1</td>
                                                                                                    <td>Maret</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smamaret ?></td>

                                                                                                    <?php
                                                                                                    if ($smamaret > $smafebruari) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smamaret = $smafebruari) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smamaret < $smafebruari) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            } else {
                                                                                            ?>
                                                                                                <tbody>
                                                                                                    <td>1</td>
                                                                                                    <td>Maret</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smamaret ?></td>

                                                                                                    <?php
                                                                                                    if ($smamaret > $smafebruari) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smamaret = $smafebruari) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smamaret < $smafebruari) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            }
                                                                                            ?>

                                                                                            <?php
                                                                                            if ($_GET['Bulan'] == 'Appril') {
                                                                                            ?>
                                                                                                <tbody class="bg-warning">
                                                                                                    <td>2</td>
                                                                                                    <td>Appril</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smaappril ?></td>

                                                                                                    <?php
                                                                                                    if ($smaappril > $smamaret) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smaappril == $smamaret) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smaappril < $smamaret) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            } else {
                                                                                            ?>
                                                                                                <tbody>
                                                                                                    <td>2</td>
                                                                                                    <td>Appril</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smaappril ?></td>

                                                                                                    <?php
                                                                                                    if ($smaappril > $smamaret) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smaappril == $smamaret) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smaappril < $smamaret) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            }
                                                                                            ?>


                                                                                            <?php
                                                                                            if ($_GET['Bulan'] == 'Mei') {
                                                                                            ?>
                                                                                                <tbody class="bg-warning">
                                                                                                    <td>3</td>
                                                                                                    <td>Mei</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smamei ?></td>

                                                                                                    <?php
                                                                                                    if ($smamei > $smaappril) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smamei == $smaappril) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smamei < $smaappril) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            } else {
                                                                                            ?>
                                                                                                <tbody>
                                                                                                    <td>3</td>
                                                                                                    <td>Mei</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smamei ?></td>

                                                                                                    <?php
                                                                                                    if ($smamei > $smaappril) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smamei == $smaappril) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smamei < $smaappril) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                            <?php
                                                                                            if ($_GET['Bulan'] == 'Juni') {
                                                                                            ?>
                                                                                                <tbody class="bg-warning">

                                                                                                    <td>4</td>
                                                                                                    <td>Juni</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smajun ?></td>

                                                                                                    <?php
                                                                                                    if ($smajun > $smamei) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smajun == $smamei) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smajun < $smamei) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            } else {
                                                                                            ?>
                                                                                                <tbody>
                                                                                                    <td>4</td>
                                                                                                    <td>Juni</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smajun ?></td>

                                                                                                    <?php
                                                                                                    if ($smajun > $smamei) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smajun == $smamei) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smajun < $smamei) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                            <?php
                                                                                            if ($_GET['Bulan'] == 'Juli') {
                                                                                            ?>
                                                                                                <tbody class="bg-warning">
                                                                                                    <td>5</td>
                                                                                                    <td>Juli</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smajuli ?></td>

                                                                                                    <?php
                                                                                                    if ($smajuli > $smajun) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smajuli == $smajun) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smajuli < $smajun) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            } else {
                                                                                            ?>
                                                                                                <tbody>
                                                                                                    <td>5</td>
                                                                                                    <td>Juli</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smajuli ?></td>

                                                                                                    <?php
                                                                                                    if ($smajuli > $smajun) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smajuli == $smajun) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smajuli < $smajun) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                            <?php
                                                                                            if ($_GET['Bulan'] == 'Agustus') {
                                                                                            ?>
                                                                                                <tbody class="bg-warning">
                                                                                                    <td>6</td>
                                                                                                    <td>Agustus</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smaagus ?></td>

                                                                                                    <?php
                                                                                                    if ($smaagus > $smajuli) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smaagus == $smajuli) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smaagus < $smajuli) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            } else {
                                                                                            ?>
                                                                                                <tbody>
                                                                                                    <td>6</td>
                                                                                                    <td>Agustus</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smaagus ?></td>

                                                                                                    <?php
                                                                                                    if ($smaagus > $smajuli) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smaagus == $smajuli) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smaagus < $smajuli) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                            <?php
                                                                                            if ($_GET['Bulan'] == 'September') {
                                                                                            ?>
                                                                                                <tbody class="bg-warning">
                                                                                                    <td>7</td>
                                                                                                    <td>September</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smasep ?></td>

                                                                                                    <?php
                                                                                                    if ($smasep > $smaagus) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smasep == $smaagus) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smasep < $smaagus) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            } else {
                                                                                            ?>
                                                                                                <tbody>
                                                                                                    <td>7</td>
                                                                                                    <td>September</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smasep ?></td>

                                                                                                    <?php
                                                                                                    if ($smasep > $smaagus) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smasep == $smaagus) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smasep < $smaagus) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                            <?php
                                                                                            if ($_GET['Bulan'] == 'Oktober') {
                                                                                            ?>
                                                                                                <tbody class="bg-warning">

                                                                                                    <td>8</td>
                                                                                                    <td>Oktober</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smaokto ?></td>

                                                                                                    <?php
                                                                                                    if ($smaokto > $smasep) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smaokto == $smasep) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smaokto < $smasep) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            } else {
                                                                                            ?>
                                                                                                <tbody>
                                                                                                    <td>8</td>
                                                                                                    <td>Oktober</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smaokto ?></td>

                                                                                                    <?php
                                                                                                    if ($smaokto > $smasep) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smaokto == $smasep) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smaokto < $smasep) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                            <?php
                                                                                            if ($_GET['Bulan'] == 'November') {
                                                                                            ?>
                                                                                                <tbody class="bg-warning">

                                                                                                    <td>9</td>
                                                                                                    <td>November</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smanov ?></td>

                                                                                                    <?php
                                                                                                    if ($smanov > $smaokto) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smanov == $smaokto) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smanov < $smaokto) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            } else {
                                                                                            ?>

                                                                                                <tbody>
                                                                                                    <td>9</td>
                                                                                                    <td>November</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smanov ?></td>

                                                                                                    <?php
                                                                                                    if ($smanov > $smaokto) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smanov == $smaokto) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smanov < $smaokto) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                            <?php
                                                                                            if ($_GET['Bulan'] == 'Desember') {
                                                                                            ?>
                                                                                                <tbody class="bg-warning">
                                                                                                    <td>10</td>
                                                                                                    <td>Desember</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smades ?></td>

                                                                                                    <?php
                                                                                                    if ($smades > $smanov) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smades == $smanov) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smades < $smanov) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            <?php
                                                                                            } else {
                                                                                            ?>
                                                                                                <tbody>
                                                                                                    <td>10</td>
                                                                                                    <td>Desember</td>
                                                                                                    <td>2022</td>
                                                                                                    <td>0</td>
                                                                                                    <td><?= $smades ?></td>

                                                                                                    <?php
                                                                                                    if ($smades > $smanov) {
                                                                                                    ?>

                                                                                                        <td><?= 'Tambahi Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smades == $smanov) {
                                                                                                    ?>
                                                                                                        <td><?= 'Pertahankan Stock' ?></td>
                                                                                                    <?php
                                                                                                    } else if ($smades < $smanov) {
                                                                                                    ?>
                                                                                                        <td><?= 'Kurangi Stock' ?></td>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                        </table>
                                                                                    <?php
                                                                                            }
                                                                                    ?>
                                                                                    </div>
                                                                                </div>
                                                                                </section>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            <?php
                                                        }
                                                            ?>
                                                            <?php
                                                            if (isset($_POST['submit'])) {

                                                                $idadmin = @$_SESSION['id_admin'];
                                                                $idkategori = $_GET['namakategori'];
                                                                $bulan = $_GET['Bulan'];
                                                                $tahun = $_GET['Tahun'];

                                                                $del1 = mysqli_query($con, "DELETE FROM peramalan where nama_kategori='$idkategori'");
                                                                $hasil = $smafebruari;
                                                                $del1 = mysqli_query($con, "DELETE FROM peramalan WHERE nama_kategori='$idkategori'");
                                                                $saveoktober = mysqli_query($con, "INSERT INTO peramalan VALUES ('', '$idadmin', '$idkategori', 'Oktober', '2021', '$rowoktober[jumlah]','$smaoktober')") or die(mysqli_error($con));
                                                                $savenovember = mysqli_query($con, "INSERT INTO peramalan VALUES ('', '$idadmin', '$idkategori', 'November', '2021', '$rownovember[jumlah]','$smanovember')") or die(mysqli_error($con));
                                                                $savedesember = mysqli_query($con, "INSERT INTO peramalan VALUES ('', '$idadmin', '$idkategori', 'Desember', '2021', '$rowdesember[jumlah]', '$smadesember')") or die(mysqli_error($con));
                                                                $savejanuari = mysqli_query($con, "INSERT INTO peramalan VALUES ('', '$idadmin', '$idkategori', 'Januari', '2022', '$rowjanuari[jumlah]', '$smajanuari')") or die(mysqli_error($con));


                                                                // mengambil data barang dengan kode paling besar
                                                                $query = mysqli_query($con, "SELECT max(id_peramalan) as maxKode FROM peramalan ");
                                                                $data = mysqli_fetch_array($query);
                                                                $id = $data['maxKode'];

                                                                // // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                                                                // // dan diubah ke integer dengan (int)
                                                                // $urutan = (int) substr($id, 1, 1);
                                                                $urutan = $id;
                                                                $urutan++;
                                                                $huruf = "";
                                                                $id = $huruf . sprintf("%03s", $urutan);

                                                                $Sqljanuari1 = mysqli_query($con, "SELECT * FROM data where bulan = 'januari' && tahun='2022' && nama_kategori='$_GET[namakategori]'");
                                                                $rowjanuari1 = mysqli_fetch_array($Sqljanuari1);
                                                                $januarihasil = $rowjanuari1['jumlah'];
                                                                if ($hasil > $januarihasil) {
                                                                    $rekomendasi = 'Perbanyak Stok Barang';

                                                                    $savefebruari = mysqli_query($con, "INSERT INTO peramalan VALUES ('$id', '$idadmin', '$idkategori', '$bulan', '$tahun', '0', '$hasil')") or die(mysqli_error($con));
                                                                    $saverekomendasi = mysqli_query($con, "INSERT INTO rekomendasi VALUES ('', '$id', '$rekomendasi')") or die(mysqli_error($con));
                                                                } else if ($hasil < $januarihasil) {
                                                                    $rekomendasi = 'Kurangi Stok Barang';

                                                                    $savefebruari = mysqli_query($con, "INSERT INTO peramalan VALUES ('$id', '$idadmin', '$idkategori', '$bulan', '$tahun', '0', '$hasil')") or die(mysqli_error($con));
                                                                    $saverekomendasi = mysqli_query($con, "INSERT INTO rekomendasi VALUES ('', '$id', '$rekomendasi')") or die(mysqli_error($con));
                                                                } else if ($hasil == $januarihasil) {
                                                                    $rekomendasi = 'Pertahankan Stok Barang';

                                                                    $savefebruari = mysqli_query($con, "INSERT INTO peramalan VALUES ('$id', '$idadmin', '$idkategori', '$bulan', '$tahun', '0', '$hasil')") or die(mysqli_error($con));
                                                                    $saverekomendasi = mysqli_query($con, "INSERT INTO rekomendasi VALUES ('', '$id', '$rekomendasi')") or die(mysqli_error($con));
                                                                }
                                                            ?>

                                                                <div class="row col-lg-12">
                                                                    <div class="col-lg-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="text-center">Hasil Rekomendasi Stok Bulan Selanjutnya</h4><br>
                                                                                <h5 class=" text-danger text-center">Hasil Prediksi Bulan <?= $_GET['Bulan'] ?> adalah <?= $smafebruari ?> </h5>

                                                                                <div class="table-responsive">
                                                                                    <div class="table-responsive">
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
                                                                                                $SqlQuery = mysqli_query($con, "SELECT * FROM peramalan INNER JOIN rekomendasi as r on peramalan.id_peramalan=r.id_peramalan WHERE peramalan.nama_kategori='$_GET[namakategori]'");
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
                                                                                                    echo "<tr><td colspan=\"4\" align=\"center\">data tidak ada</td></tr>";
                                                                                                }
                                                                                                ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                <?php
                                                            }

                                                                ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php include_once('footer.php');
                            } else {
                                echo "<script type='text/javascript'>
    setTimeout(function () { 
        swal({ 
            title: 'Maaf', 
            text:  'Mohon Isi Data Bulan Lalu atau Tahun Tidak Ada',
            type: 'warning',
            timer: 5000,
            ConfirmButton: 'OK',
            showConfirmButton: true});
    },10);  
    window.setTimeout(function(){ 
      window.location.replace('index.php');
    } ,1000); 
    </script>";
                            }
                                ?>