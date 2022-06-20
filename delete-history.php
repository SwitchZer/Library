<?php
include 'connect.php';
if (isset($_GET['id'])){
    $delete = mysqli_query($conn, "DELETE FROM pinjam WHERE id = '".$_GET['id']."' ");
    header('location:hal.php');
}
?>    