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
            <h1 class="m-0">Tambah Buku</h1>
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
              <label for="exampleInputJudul1">Judul Buku</label>
              <input type="text" class="form-control" id="exampleInputJudul1" aria-describedby="emailHelp" name="judul">
            </div>
            <div class="form-group">
              <label for="exampleInputTahun1">Tahun Terbit</label>
              <input type="text" class="form-control" id="exampleInputTahun1" aria-describedby="emailHelp" name="tahun_terbit">
            </div>
            <div class="form-group">
              <label for="exampleInputPengarang1">Pengarang</label>
              <input type="text" class="form-control" id="exampleInputPengarang1" aria-describedby="emailHelp" name="pengarang">
            </div>
        </table>
        <tr>
                <td>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-success" >
                    <a href="buku.php" class="btn btn-warning">Kembali</a> <br> <br>
                </td>
                
            </tr>
    </form>
    <?php
    include 'connect.php';
    if (isset($_POST['simpan'])) {
      $kode = rand(1000,10000).$_POST['kode'];
      $judul = $_POST['judul'];
      $terbitan = $_POST['tahun_terbit'];
      $pengarang = $_POST['pengarang'];
      $Query = " INSERT INTO buku (kode, judul, tahun_terbit, pengarang) VALUES ('$kode','$judul','$terbitan','$pengarang')";
      $insert = mysqli_query($conn,$Query);
      if (!empty($insert)) {
        echo"
        <script language=JavaScript>
            alert('Data Berhasil Disimpan!');
        </script> ";
      } else {
        echo"
        <script language=JavaScript>
            alert('Data Gagal Disimpan: " .mysqli_error($conn); echo "');
        </script> ";
      }
    }
    ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'includes/footer.php'; ?>
