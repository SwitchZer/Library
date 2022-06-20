<?php
    session_start();
    include 'connect.php';
    $data_edit = mysqli_query($conn, "SELECT * FROM buku WHERE kode = '".$_GET['kode']."'");
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
            <h1 class="m-0">Edit Buku</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">

    <form action="" method="POST" enctype="multipart/form-data">
            <table class="table table-head-fixed text-nowrap">
            <div class="form-group">
              <label for="exampleInputJudul1">Judul Buku</label>
              <input type="text" class="form-control" id="exampleInputJudul1" aria-describedby="emailHelp" name="judul" value="<?php echo $result['judul'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputTahun1">Tahun Terbit</label>
              <input type="text" class="form-control" id="exampleInputTahun1" aria-describedby="emailHelp" name="tahun_terbit" value="<?php echo $result['tahun_terbit'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPengarang1">Pengarang</label>
              <input type="text" class="form-control" id="exampleInputPengarang1" aria-describedby="emailHelp" name="pengarang" value="<?php echo $result['pengarang'] ?>">
            </div>

        </table>
        <tr>
                <td>
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success" >
                    <a href="buku.php" class="btn btn-warning">Kembali</a> <br> <br>
                </td>
                
            </tr>
    </form>
    <?php
    include 'connect.php';
    if (isset($_POST['edit'])){
      $judul = $_POST['judul'];
      $terbitan = $_POST['tahun_terbit'];
      $pengarang = $_POST['pengarang'];
      $Image = rand(1000,10000)."-".$_FILES['sampul']['name'];
      $Type = $_FILES['sampul']['type'];
      $Temp = $_FILES['sampul']['tmp_name'];
      $size = $_FILES['sampul']['size'];
      $ImageExt = explode('.',$Image);
      $AllowExt = strtolower(end($ImageExt));
      $Allow = array('jpg','jpeg','png');
      $Target = 'image/';
      move_uploaded_file($Temp,$Target.'/'.$Image);
      if(in_array($AllowExt,$Allow)) {

        if($size<5000000) {
          $Query = " UPDATE buku SET judul = '$judul', tahun_terbit ='$terbitan', pengarang = '$pengarang', sampul = '$image'  WHERE kode = '".$_GET['kode']."'";
          $insert = mysqli_query($conn,$Query);
        } else {
          echo ' Edit Succesfully';
        }

      } else {
        echo ' Failed to Edit';
      }
    }
    ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'includes/footer.php'; ?>