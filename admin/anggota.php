<?php
session_start();    
if(isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `user` WHERE CONCAT(`id_user`, `username`, `nama`, `email`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM `user`";
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
            <h1 class="m-0">Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a href="tambah-anggota.php" type="button" class="btn btn-primary">Tambah Anggota</a>
            </ol>
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
                <h3 class="card-title">Tabel Anggota</h3>
                <div class="card-tools">
                  <form action="anggota.php" method="POST">
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
                    <tr>
                      <th style="width: 10px">Id User</th>
                      <th style="width: 200px">Username</th>
                      <th style="width: 200px">Nama</th>
                      <th style="width: 200px">Email</th>
                      <th style="width: 70px">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
        <?php
        include 'connect.php';
        $select = mysqli_query($conn, "SELECT * FROM user");
        if (mysqli_num_rows($select) > 0) {
        while($hasil = mysqli_fetch_array($search_result)){
        ?>
        <tr style = "">
            <td>
                <?php echo $hasil['id_user'] ?>
            </td>
            <td>
            <?php echo $hasil['username'] ?>
            </td>
            <td>
            <?php echo $hasil['nama'] ?>
            </td>
            <td>
            <?php echo $hasil['email'] ?>
            </td>
            <td>
                <a class="badge badge-secondary" href=edit.php?id=<?php echo $hasil['id_user'] ?>>Edit</a> ||
                <a class="badge badge-danger" href="delete-anggota.php?id=<?php echo $hasil['id_user'] ?>">Hapus</a> 
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'includes/footer.php'; ?>