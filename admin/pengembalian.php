<?php
include 'connect.php';
session_start();   
?>

<?php
include 'includes/navbar.php';
?>

<?php
include 'includes/sidebar.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengembalian</h1>
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
                <h3 class="card-title">Pengembalian</h3>
              </div>
              <div class="card-body p-0">
                  <form action="" method="POST">
                  <div class="modal fade" id="addnew">
            	<h4 class="modal-title"><b>Pengembalian Buku</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="">
          		  <div class="form-group">
                  	<label for="user" class="col-sm-3 control-label">User ID</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="user" name="user" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="kode" class="col-sm-3 control-label">Kode Buku</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="kode" name="kode[]" required>
                    </div>
                </div>
                <span id="append-div"></span>
          	</div>
          	<div class="modal-footer">
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
            </div>
               </form>
                <?php
    include 'connect.php';
	if(isset($_POST['add'])){
		$user = $_POST['user'];
		
		$sql = "SELECT * FROM user WHERE id_user = '$user'";
		$query = $conn->query($sql);
			$row = $query->fetch_assoc();
			$user_id = $row['id'];
			foreach($_POST['kode'] as $kode){
				if(!empty($kode)){
					$sql = "SELECT * FROM buku WHERE kode = '$kode'";
					$query = $conn->query($sql);
					if($query->num_rows > 0){
						$brow = $query->fetch_assoc();
						$bid = $brow['id'];

						$sql = "SELECT * FROM pinjam WHERE id_anggota = '$user_id' AND id_buku = '$bid' AND status = 0";
						$query = $conn->query($sql);
						if($query->num_rows > 0){
							$borrow = $query->fetch_assoc();
							$borrow_id = $borrow['id'];
							$sql = "INSERT INTO kembalikan (user_id, id_buku, tanggal_kembalikan) VALUES ('$user_id', '$bid', NOW())";
							if($conn->query($sql)){
								$sql = "UPDATE buku SET status = 0 WHERE id = '$bid'";
								$conn->query($sql);
								$sql = "UPDATE pinjam SET status = 1 WHERE id = '$borrow_id'";
								$conn->query($sql);
							}
						}
					}
				}
			}
		}

		
?>
              </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
include 'includes/footer.php';
?>