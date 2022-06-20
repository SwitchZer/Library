<?php
    session_start();
?>

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Anggota</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">

    <form action="" method="POST" enctype="multipart/form-data">
            <table class="table table-head-fixed text-nowrap">
            <div class="form-group">
              <input type="hidden" class="form-control" id="exampleInputKode1" aria-describedby="emailHelp" name="kode" >
            </div>
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="username">
            </div>
            <div class="form-group">
              <label for="">Nama</label>
              <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="nama">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" id="" aria-describedby="emailHelp" name="email">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" class="form-control" id="" aria-describedby="emailHelp" name="password">
            </div>
        </table>
        <tr>
                <td>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-success" >
                    <a href="anggota.php" class="btn btn-warning">Kembali</a> <br> <br>
                </td>
                
            </tr>
    </form>
    <?php
     include 'connect.php';
     $error = 0;
     if (isset($_POST['simpan'])){
       $id_user = rand(10000,100000);
       $update = mysqli_query($conn, "INSERT INTO `user` ( `id_user`, `username`, `nama`, `email`, `password`, `level`) VALUES('$id_user', '".$_POST['username']."', '".$_POST['nama']."', '".$_POST['email']."', MD5('".$_POST['password']."'), 'user'); ");
         if ($update){
           echo"
               <script language=JavaScript>
                   alert('Data Berhasil Disimpan!');
               </script> ";
       } elseif(!$error) {
           $email=mysqli_real_escape_string($conn,trim($_POST['email']));
           $sql="select * from user where (email='$email');";
           $res=mysqli_query($conn,$sql);
           if (mysqli_num_rows($res) > 0) {
           $row = mysqli_fetch_assoc($res);
           if($email==$row['email'])
           {
               echo"
               <script language=JavaScript>
                   alert('Email Already Exist!');
               </script> ";
           }
       }else {
           echo "alright";
       }
       }}
    ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'includes/footer.php'; ?>
