<?php
include 'connect.php';
session_start();
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
    <div class="col-md-8 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pengembalian</h3>
              </div>
              <div class="modal-body">
            	<form class="form-horizontal" method="POST" action="">
          		
                <div class="form-group">
                    <label for="kode" class="col-sm-3 control-label">Kode Buku</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="kode" name="kode[]" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form> 
				<?php  
$kode = $_GET['kode'];
$sql = "SELECT * FROM buku WHERE kode = '$kode'";
	if(isset($_POST['add'])){
		
			$user_id = $_SESSION['id_user'];
			header("location:tabel-pengembalian.php");

			$return = 0;
			foreach($_POST['kode'] as $kode){
				if(!empty($kode)){
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
								$return++;
								$sql = "UPDATE buku SET status = 0 WHERE id = '$bid'";
								$conn->query($sql);
								$sql = "UPDATE pinjam SET status = 1 WHERE kode = '$borrow_id'";
								$conn->query($sql);
							}
						}

						

					}
		
				}
			}

			if($return > 0){
				$book = ($return == 1) ? 'Book' : 'Books';
				$_SESSION['success'] = $return.' '.$book.' successfully returned';
			}

		}
    

		?>
          	</div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
<?php
include 'include/footer.php';
?>
