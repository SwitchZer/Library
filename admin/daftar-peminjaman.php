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
            <h1 class="m-0">Daftar Peminjaman</h1>
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
                <h3 class="card-title">Tabel Peminjaman</h3>
              </div>
              <div class="card-body p-0">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Date</th>
                  <th>Id User</th>
                  <th>Nama</th>
                  <th>Kode Buku</th>
                  <th>Judul</th>
                  <th>Status</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, user.id_user AS stud, pinjam.status AS barstat FROM pinjam LEFT JOIN user ON user.id=pinjam.id_anggota LEFT JOIN buku ON buku.id=pinjam.id_buku ORDER BY tanggal_pinjam DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      if($row['barstat']){
                        $status = '<span class="badge badge-success">returned</span>';
                      }
                      else{
                        $status = '<span class="badge badge-danger">not returned</span>';
                      }
                      echo "
                        <tr>
                          <td>".date('M d, Y', strtotime($row['tanggal_pinjam']))."</td>
                          <td>".$row['stud']."</td>
                          <td>".$row['nama']."</td>
                          <td>".$row['kode']."</td>
                          <td>".$row['judul']."</td>
                          <td>".$status."</td>
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
