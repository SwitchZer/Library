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
                  	<label for="user" class="col-sm-3 control-label">Id User</label>
                  	<div class="col-sm-9">
                      <?php echo $_SESSION['id_user']; ?>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="kode" class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-9">
                    <?php echo $_SESSION['nama']; ?>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="submit" class="btn btn-primary btn-flat" name=""><i class="fa fa-save"></i><a href="hal.php" style="color: white">Kembali</a></button>
            	</form>
          	</div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
<?php
include 'include/footer.php';
?>