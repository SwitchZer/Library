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
                  <th>Kode Buku</th>
                  <th>Judul</th>
                  <th>Status</th>
                </thead>
                <tbody>
                  <?php
                    $usid = $_SESSION['id_user'];
	                $sql = "SELECT * FROM pinjam LEFT JOIN buku ON buku.id=pinjam.id_buku WHERE id_anggota = '$usid' ORDER BY tanggal_pinjam DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                      <tr>
                          <td>".date('M d, Y', strtotime($row['tanggal_pinjam']))."</td>
                          <td>".$row['kode']."</td>
                          <td>".$row['judul']."</td>
                          <td>".$row['pengarang']."</td>
                      </tr>
                  ";
                    }
                  ?>
                </tbody>
              </table>
              </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
<?php
include 'include/footer.php';
?>