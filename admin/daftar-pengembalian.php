<?php
include "connect.php";
session_start();
if(isset($_POST['search'])) {
  $valueToSearch = $_POST['valueToSearch'];
  $query = "SELECT *, user.id_user AS us FROM kembalikan LEFT JOIN user ON user.id=kembalikan.user_id LEFT JOIN buku ON buku.id=kembalikan.id_buku Like '%".$valueToSearch."%'";
  $search_result = filterTable($query);
} else {
  $query = "SELECT * FROM `kembalikan`";
  $search_result = filterTable($query);
}
function filterTable($query) {
  include 'connect.php';
  $filter_Result = mysqli_query($conn, $query);
  return $filter_Result;
}
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
            <h1 class="m-0">Daftar Pengembalian</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">

    <div class="row">
    <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Pengembalian</h3>
                <div class="card-tools">
                <form action="daftar-pengembalian.php" method="POST">
                  <div class="input-group input-group-sm" style="width: 200px; padding-bottom: 10px; padding-right: 10px;">
                      <input type="text" name="valueToSearch" class="form-control float-right" placeholder="Search">
                      <div class="input-group-append">
                        <button name="search" type="search" class="btn btn-default" value="search">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </form>
                  </div>
              </div>
              <div class="box-body">
                <table class="table table-bordered">
              <thead>
                  <th>Date</th>
                  <th>ID User</th>
                  <th>Nama</th>
                  <th>Kode Buku</th>
                  <th>Judul</th>
                </thead>
                <tbody>
                
                <?php
        include 'connect.php';
        $sql = "SELECT *, user.id_user AS us FROM kembalikan LEFT JOIN user ON user.id=kembalikan.user_id LEFT JOIN buku ON buku.id=kembalikan.id_buku ORDER BY tanggal_kembalikan DESC";
        $query = $conn->query($sql);
        while($row = $query->fetch_assoc()){
          if($row['status']){
            $status = '<span class="label label-danger">borrowed</span>';
          }
          else{
            $status = '<span class="label label-success">returned</span>';
          }
          echo "
            <tr>
              <td>".date('M d, Y', strtotime($row['tanggal_kembalikan']))."</td>
              <td>".$row['us']."</td>
              <td>".$row['nama']."</td>
              <td>".$row['kode']."</td>
              <td>".$row['judul']."</td>
            </tr>
          ";
        }
      ?>
        </tbody>
              </table>
              </div>       

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'includes/footer.php'; ?>
