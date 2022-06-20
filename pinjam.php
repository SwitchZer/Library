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
                <h3 class="card-title">Peminjaman</h3>
              </div>
              <div class="card-body p-0">
                  <form action="" method="POST">
                  <div class="modal fade" id="addnew">
            	<h4 class="modal-title"><b>Borrow Books</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="">
          		  <div class="form-group">

                  	<div class="col-sm-9">
                    	
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
                if(isset($_POST['add'])){
                  $user_id = $_SESSION['id_user'];
                  header ('location: hal.php');
            
                    foreach($_POST['kode'] as $kode){
                      if(!empty($kode)){
                        $sql = "SELECT * FROM buku WHERE kode = '$kode' AND status != 1";
                        $query = $conn->query($sql);
                        $brow = $query->fetch_assoc();
                        $bid = $brow['id'];
                      }
              
                          $sql = "INSERT INTO pinjam (id_anggota, id_buku, tanggal_pinjam) VALUES ('$user_id', '$bid', NOW())";
                          if($conn->query($sql)){
                            $sql = "UPDATE buku SET status = 1 WHERE id = '$bid'";
                            $conn->query($sql);
                          }
                        } 
                      }
              
                
              ?>
              </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
<?php
include 'include/footer.php';
?>