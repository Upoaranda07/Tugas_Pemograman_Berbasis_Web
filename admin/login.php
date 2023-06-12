<?php
session_start();
//koneksi
$koneksi = new mysqli("localhost","root","","trainittoko");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Topiku</title>
    <title>Topiku</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body background="bg.jpg">
    <div class="cont">
        <form action="" method="POST" class="login-email">
            <h2>Login</h2>
            <div class="box-login">
                <input type="email" class="posisi" placeholder="Email" name="email">
                <input type="password" placeholder="password" name="password" >
            </div>
            <div class="input-group">
                <button name="login" class="btn-group">Login</button>
            </div>
            <p class="register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
        `   </div>
        </form>
        <?php
         if (isset($_POST['login']))
        {
            $ambil=$koneksi->query("SELECT * FROM admin WHERE username ='$_POST[email]' AND password = md5('$_POST[password]')");
            $yangcocok = $ambil->num_rows;
            if ($yangcocok==1) 
            {
                $_SESSION['admin']=$ambil->fetch_assoc();
                echo "<div class='alert alert-info'>Login Sukses</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
            }
            else
            {
                echo '<script>alert("email atau password Anda salah!")</script>';
                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
            }
        }
        ?>
    </div>
</body>
</html>