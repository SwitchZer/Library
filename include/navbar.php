<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Library</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index3.html" class="navbar-brand">
        <img src="dist/img/librarylogo.png" alt="" class="brand-image img-circle elevation-3" style="">
        <span class="brand-text font-weight-light">Library</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="hal.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="buku.php" class="nav-link">Buku</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Transaksi</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="pinjam.php" class="dropdown-item">Pinjam </a></li>
              <li><a href="tabel-pengembalian.php" class="dropdown-item">Kembalikan</a></li>
            </ul>
          </li>
        </ul>

      <ul class="order-1 order-md-3 navbar-nav navbar ml-auto">
        <li class='user user-menu'>
          <a href="profile.php">
            <img src='dist/img/profile.jpg' class='user-image img-circle elevation-2' alt='User Image'>
            <span class="brand-text text-secondary"><?php echo "$_SESSION[nama]" ; ?></span>
          </a>
                    
                </li>
                <a href='logout.php' class='nav-link'><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
      </ul>
    </div>
  </nav>