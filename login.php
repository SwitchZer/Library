<?php
include 'connect.php';
session_start();


if (isset($_POST['login'])) {
    $log = mysqli_query($conn, "SELECT * FROM user WHERE username='$_POST[username]' AND password=MD5('$_POST[password]') ");
    $cek = mysqli_num_rows($log);   

    if($cek = 1) { 
        $data = mysqli_fetch_assoc($log);
        $_SESSION["id"] = $data["id"];
        $_SESSION["id_user"] = $data["id_user"];
        $_SESSION["nama"] = $data["nama"];
        $_SESSION["level"] = $data["level"];
        if ($data["level"] == 'user') {
            header("location:hal.php");
        } 
    
    
        ?>
        <script language="JavaScript">
           {
               alert('Wrong Username or Password');
               javaScript:history.back();
           }
        </script>
        <?php
    }
}
?>