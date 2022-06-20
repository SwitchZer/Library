<?php
include 'connect.php';
if (isset($_GET['id'])){
    $delete = mysqli_query($conn, "DELETE FROM user WHERE id_user = '".$_GET['id']."' ");
    header('location:anggota.php');
}
?>  