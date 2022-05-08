<?php
require_once "../config/config.php";

if (isset($_POST['pdf'])) {
?>
    <center>
        <h1>Hasil Laporan Data Peramalan Kategori <?= @$_POST['namakategori']; ?> <br>
            Bengkel Putra Jaya Motor
        </h1>
        <table border="4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Bulan </th>
                    <th>Tahun </th>
                    <th>Jumlah</th>
                    <th>Hasil Peramalan</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../config/config.php";
                $kategori = @$_POST['namakategori'];
                $Sql = mysqli_query($con, "SELECT * FROM peramalan where nama_kategori='$kategori'");
                $no = 1;
                if (mysqli_num_rows($Sql) > 0) {
                    while ($row = mysqli_fetch_array($Sql)) {
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
                }
                ?>
            </tbody>
        </table>
    </center>
    <script>
        window.print();
    </script>

<?php

} else if (isset($_POST['excel'])) {
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Dataperamalansprepartbengkelputrajayamotor.xls");
?>
    <center>
        <h1>Hasil Laporan Data Peramalan Kategori <?= @$_POST['namakategori']; ?> <br>
            Bengkel Putra Jaya Motor
        </h1>
        <table border="4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Bulan </th>
                    <th>Tahun </th>
                    <th>Jumlah</th>
                    <th>Hasil Peramalan</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../config/config.php";
                $kategori = @$_POST['namakategori'];
                $Sql = mysqli_query($con, "SELECT * FROM peramalan where nama_kategori='$kategori'");
                $no = 1;
                if (mysqli_num_rows($Sql) > 0) {
                    while ($row = mysqli_fetch_array($Sql)) {
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
                }
                ?>
            </tbody>
        </table>
    </center>

<?php
}
?>