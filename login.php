<?php
session_start();
// koneksi
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/login.css">

    <title>Login Form - Pure Coding</title>
</head>

<body background="bg.jpg">
    <div class="cont">
        <form action="" method="POST" class="login-email">
            <h2>Login</h2>
            <div class="box-login">
                <input type="email" class="posisi" placeholder="Email" name="email_pelanggan">
                <input type="password" placeholder="password" name="password_pelanggan" >
            </div>
            <div class="input-group">
                <button name="login" class="btn-group">Login</button>
            </div>
            <p class="register-text">Don't have an account? <a href="daftar.php">Register Here</a>.</p>
        `   </div>
        </form>
        <?php
if (isset($_POST["login"])) 
{
    $email = $_POST["email_pelanggan"];
    $password = $_POST["password_pelanggan"];
    // lakukan kuery ngecek akun di tabel pelanggan di db
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan= md5('$password')");

    // ngitung akun yang terambil
    $akunyangcocok = $ambil->num_rows;

    // jika 1 akun yang cocok, maka login
    if ($akunyangcocok==1)
    {
        //anda sukses login
        //mendapatkan akun dlm bentuk array
        $akun = $ambil->fetch_assoc();
        //simpan di session pelanggan
        $_SESSION['pelanggan'] = $akun;
        echo "<script>alert('anda sukses login');</script>";
        //jk sudah belanja
        if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang']))
        {
            echo "<script>location='checkout.php'</script>";
        }
        else
        {
            echo "<script>location='riwayat.php';</script>";
        }
    }
    else
    {
        echo "<script>alert('anda gagal login, priksa akun anda');</script>";
        echo "<script>location='login.php';</script>";
    }
}
?>
    </div>
</body>
</html>