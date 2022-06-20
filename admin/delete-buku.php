<?php
include 'connect.php';
if (isset($_GET['kode'])){
    $delete = mysqli_query($conn, "DELETE FROM buku WHERE kode = '".$_GET['kode']."' ");
    header('location:buku.php');
}
?>  