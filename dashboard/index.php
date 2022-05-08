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

            <!-- Earnings (Monthly) Card Example -->
            <div class="container-fluid">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <H3>Selamat Datang, <?= $_SESSION['nama']; ?> Di Sistem Peramalan</H3>

                        <div style=" width: 800px;margin: 0px auto; " class="img-fluid img-responsive">

                            <img class="img-fluid img-responsive" src=" <?= base_url() ?>/img/ramalan.png" width="90%">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {

                    labels: [
                        <?PHP
                        $SqlQuery = mysqli_query($con, "SELECT bulan from dt_aktual");
                        $no = 1;
                        while ($row = mysqli_fetch_array($SqlQuery)) {
                        ?> "<?= $row['bulan'] ?>",
                        <?php
                        }
                        ?>
                    ],

                    datasets: [{
                        label: '',
                        data: [
                            <?php
                            $jumlah_aktual = mysqli_query($con, "SELECT kebutuhan_air from dt_aktual");

                            while ($row = mysqli_fetch_array($jumlah_aktual)) {
                            ?> "<?= $row['kebutuhan_air'] ?>",
                            <?php
                            }
                            ?>
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>



    </div>
    <?php include_once('footer.php');
    ?>