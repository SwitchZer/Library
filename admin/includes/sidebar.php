<!-- Sidebar -->
<div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/profile.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo "$_SESSION[nama]" ; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="anggota.php
            " class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Anggota
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="buku.php" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
              <p>
                Buku
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sync-alt"></i>
              <p>
                Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="daftar-peminjaman.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Peminjaman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="input-peminjam.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Meminjam</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="daftar-pengembalian.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Pengembalian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pengembalian.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengembalian</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Log Out</p>
                </a>
              </li>
          </li>
        </ul>
      </nav>
    </div>
  </aside>