<?php
session_start();
include 'koneksi.php';


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

<!-- konten -->
<section class="konten">
  <div class="container">
    <h1>Produk Terbaru</h1>

    <div class="row">
      
      <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
      <?php while($perproduk = $ambil->fetch_assoc()){ ?>

      <div class="col-md-3">
        <div class="thumbnail">
          <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
          <div class="caption">
            <h3><?php echo $perproduk['nama_produk']; ?></h3>
            <h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
            <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
            <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-success">Detail</a>
          </div>
        </div>
      </div>
      <?php } ?>

    </div>
  </div>
</section>

</body>
</html>