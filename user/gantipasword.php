<?php include_once('header.php');
require_once "../config/config.php";
?>


<div class="row col-lg-12">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Ganti Password</h4>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="card-body">

                            <form action="" enctype="multipart/form-data" method="post">

                                <div class="form-group">
                                    <div class="section-title mt-0">Password Baru</div>
                                    <div class="input-group mb-2">
                                        <input type="text" name="password" required autofocus class="form-control" placeholder="Password Baru Anda">
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
    $password = $_POST['password'];
    $pass_enskripsi = md5($password);

    $idadmin = @$_SESSION['id_admin'];
    $update = mysqli_query($con, "UPDATE admin set password='$pass_enskripsi' WHERE id_admin = '$idadmin'") or die(mysqli_error($con));

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