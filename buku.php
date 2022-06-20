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
                <h3 class="card-title">List Buku</h3>
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
                    <tr>
                      <th style="width: 10px">Kode Buku</th>
                      <th style="width: 200px">Judul Buku</th>
                      <th style="width: 200px">Pengarang</th>
                      <th style="width: 10px">Tahun Terbit</th>
                      <th style="width: 60px">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
        include 'connect.php';
        $select = mysqli_query($conn, "SELECT * FROM buku");
        if (mysqli_num_rows($select) > 0) {
        while($hasil = mysqli_fetch_array($search_result)){
			$status = ($hasil['status'] == 0) ? '<span class="badge badge-success">available</span>' : '<span class="badge badge-danger">not available</span>';
            ?>
        <tr style = "">
            <td>
            <?php echo $hasil['kode'] ?>
            </td>
            <td>
            <?php echo $hasil['judul'] ?>
            </td>
            <td>
            <?php echo $hasil['pengarang'] ?>
            </td>
            <td>
            <?php echo $hasil['tahun_terbit'] ?>
            </td>
            <td>
			<?php echo $status ?>
            </td>

        </tr>
        <?php }} else { ?>
            <tr>
                <td colspan = "6" align="center">
                   No Data 
                </td>
            </tr>
        <?php } ?>
                  </tbody>
                </table>
              </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
<?php
include 'include/footer.php';
?>