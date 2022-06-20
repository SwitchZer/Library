<?php
include 'connect.php';
session_start();

$log = mysqli_query($conn, "SELECT * FROM tbl_special WHERE username='$_POST[username]' AND password=MD5('$_POST[password]') ");
$cek = mysqli_num_rows($log);

if($cek > 0) { 
    $data = mysqli_fetch_assoc($log);
    $_SESSION["id"] = $data["username"];
    $_SESSION["nama"] = $data["nama"];
    $_SESSION["level"] = $data["level"];
    if ($data["level"] == 'admin') {
        header("location:dashboard.php");
    } 
    
    
    ?>
    <script language="JavaScript">
        {
            alert('Please enter a username and password');
            javaScript:history.back();
        }
    </script>
    <?php
}
?>