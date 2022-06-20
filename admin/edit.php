<?php
    session_start();
    include 'connect.php';
    $data_edit = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '".$_GET['id']."'");
    $result = mysqli_fetch_array($data_edit);
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
            <h1 class="m-0">Edit</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">

    <form action="" method="POST">
            <table class="table table-head-fixed text-nowrap">
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="username" value="<?php echo $result['username'] ?>" >
            </div>
            <div class="form-group">
              <label for="">Nama</label>
              <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="nama" value="<?php echo $result['nama'] ?>" >
            </div>
        </table>
        <tr>
                <td>
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success" >
                    <a href="anggota.php" class="btn btn-warning">Kembali</a> <br> <br>
                </td>
                
            </tr>
    </form>
    <?php
    include 'connect.php';
    if (isset($_POST['edit'])){
        $update = mysqli_query($conn, "UPDATE user SET nama = '".$_POST['nama']."', username ='".$_POST['username']."' WHERE id_user = '".$_GET['id']."' ");
        if ($update) {
            echo 'Edit Success';
        } else {
            echo 'Edit Failed';
        }
    }
    ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="">Alfred</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
</body>
</html>
