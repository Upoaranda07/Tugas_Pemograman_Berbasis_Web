<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"])) 
{
  echo "<script>alert('silahkan login');</script>";
  echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>checkout</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/checkout.css">


</head>
<body>
  <section class="banner"></section>
  <script type="text/javascript">
    window.addEventListener("scroll", function(){
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
    })
  </script>
</body>
<?php include'menu.php' ?>

<section class="riwayat">
    <div class="container">
      <h3>Riwayat Belanja <?php echo $_SESSION['pelanggan']['nama_pelanggan']?></h3>

      <table class = "table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $nomor=1;
          // mendapatkan id_pelanggan yang login dari session
          $id_pelanggan = $_SESSION['pelanggan'] ['id_pelanggan'];

          $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
          while($pecah = $ambil->fetch_assoc()){

          ?>
          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['tanggal_pembelian'] ?></td>
            <td>
                <?php echo $pecah['status_pembelian']?>
                <br>
                <?php if (!empty($pecah['resi_pengiriman'])): ?>
                Resi: <?php echo $pecah['resi_pengiriman']; ?>
              <?php endif ?>
            </td>
            <td>Rp. <?php echo number_format($pecah['total_pembelian'])?></td>
            <td>
              <a href="nota.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-danger">Nota</a>

              <?php if ($pecah['status_pembelian']=="pending"): ?>
              <a href="pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info"> Input Pembayaran
              </a>
            <?php else:?>
            <a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"];?>" class="btn btn-warning">
              Lihat Pembayaran
            </a>
            <?php endif ?>
            </td>
          </tr>
          <?php $nomor++; ?>
          <?php } ?>
        </tbody>
    </div>
</section>

</body>
</html>