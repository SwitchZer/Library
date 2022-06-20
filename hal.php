<?php
include 'connect.php';
session_start();
if(isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `buku` WHERE CONCAT(`kode`, `judul`, `tahun_terbit`, `pengarang`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM `buku`";
    $search_result = filterTable($query);
}
function filterTable($query) {
    include 'connect.php';
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}   

?>

<?php
include 'include/navbar.php';
?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
      </div>
    </div>

    <div class="row justify-content-center">
    <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">History</h3>
                <div class="card-tools">
                <form action="hal.php" method="POST">
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
                <table class="table table-bordered table-striped">
                  <thead>
                  <th style="width: 130px">Date</th>
                  <th>Kode Buku</th>
                  <th>Judul</th>
                  <th>Pengarang</th>
                  <th style="width: 60px">Opsi</th>
                </thead>
                <tbody>
                  <?php
                    $usid = $_SESSION['id_user'];
	                  $sql = "SELECT * FROM pinjam LEFT JOIN buku ON buku.id=pinjam.id_buku WHERE id_anggota = '$usid' ORDER BY tanggal_pinjam DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){ ?>
                      
                      <tr>
                          <td><?php echo date('d M, Y', strtotime($row['tanggal_pinjam'])) ?></td>
                          <td><?php echo $row['kode']?></td>
                          <td><?php echo $row['judul']?></td>
                          <td><?php echo $row['pengarang']?></td>
                          <td><a class='badge badge-danger' href='delete-history.php?id=<?php echo $row['id']?>'>Hapus</a></td> 
                      </tr>
                    <?php }?>
                </tbody>
              </table>
              </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
<?php
include 'include/footer.php';
?>