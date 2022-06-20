<?php
session_start(); 
include 'connect.php';   

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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content d-flex p-2">

    <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php
                  $result=mysqli_query($conn, "SELECT count(*) as total from user");
                  $data=mysqli_fetch_array($result);
                  echo $data['total'];
                ?></h3>

                <p>Anggota</p>
              </div>
              <div class="icon">
              <i class="fas fa-users"></i>
              </div>
              <a href="anggota.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6 ">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php
                  $result=mysqli_query($conn, "SELECT count(*) as total from buku");
                  $data=mysqli_fetch_array($result);
                  echo $data['total'];
                ?></h3>

                <p>Buku</p>
              </div>
              <div class="icon">
              <i class="fas fa-book"></i>
              </div>
              <a href="buku.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'includes/footer.php'; ?>
