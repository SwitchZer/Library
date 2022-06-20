<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="css/register-style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Register</title>
</head>
<body>
    <div class="center">
    <h1>Register</h1>
        <form action="" method="post">
        <div class="txt-field">
                <input type = "text" name = "username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt-field">
                <input type = "text" name = "nama" required>
                <span></span>
                <label>Nama</label>
            </div>
            <div class="txt-field">
                <input type = "email" name = "email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt-field">
                <input type = "password" name = "password" required>
                <span></span>
                <label>Password</label>
            </div>
        <input type = "submit" name='submit' value = "Register">
        <div class="signup_link">
            Already Have Account? <a href="index.php">Login</a>
        </div>
    </div>
    <?php
      include 'connect.php';
      $error = 0;
      if (isset($_POST['submit'])){
        $id_user = rand(10000,100000);
        $update = mysqli_query($conn, "INSERT INTO `user` ( `id_user`, `username`, `nama`, `email`, `password`, `level`) VALUES('$id_user', '".$_POST['username']."', '".$_POST['nama']."', '".$_POST['email']."', MD5('".$_POST['password']."'), 'user') ");
          if ($update){
            echo"
                <script language=JavaScript>
                    alert('Data Berhasil Disimpan!');
                </script> ";
        } elseif(!$error) {
            $email=mysqli_real_escape_string($conn,trim($_POST['email']));
            $sql="select * from user where (email='$email');";
            $res=mysqli_query($conn,$sql);
            if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if($email==$row['email'])
            {
                echo"
                <script language=JavaScript>
                    alert('Email Already Exist!');
                </script> ";
            }
        }else {
            echo "alright";
        }
        }}
    ?>
</form>
</body>
</html>

