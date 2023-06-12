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

<section class="konten">
	<div class="container">
		
<h1>Detail Pembelian</h1>
<link href="assets/css/detail.css" rel="stylesheet" />
<div class="container">
	<?php
	$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
	$detail = $ambil->fetch_assoc();
	?>
	

</div>
<?php
$idpelangganyangbeli = $detail["id_pelanggan"];
$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

if ($idpelangganyangbeli !==$idpelangganyanglogin)
{
	echo "<script>alert('jangan nakal');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>

<br>


<div class="row">
		<div class="col-md-4">
				<h3>Pembelian</h3>
				<strong>No. Pembelian: <?php echo $detail['id_pembelian'] ?></strong> <br>
				Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
				Total : <?php echo number_format($detail['total_pembelian']) ?>
		</div>
		<div class="col-md-4">
				<h3>Pelanggan</h3>
				<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
				<p>
						<?php echo $detail['telepon_pelanggan']; ?> <br>
						<?php echo $detail['email_pelanggan']; ?>
				</p>
		</div>
		<div class="col-md-4">
			   <h3>Pengiriman</h3>
			   <strong><?php echo $detail['nama_kota'] ?></strong> <br>
			   Ongkos kirim : Rp. <?php echo number_format($detail['tarif']); ?> <br>
			   Alamat: <?php echo $detail['alamat_pengiriman'] ?>
		</div>
			
</div>


<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama produk</th>
			<th>harga</th>
			<th>Berat</th>
			<th>jumlah</th>
			<th>subberat</th>
			<th>subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $pecah['berat']; ?> gr. </td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['subberat']; ?> gr.</td>
			<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
		</tr>
		<?php $nomor++;?>
		<?php } ?>
	</tbody>
</table>

<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
				<strong>BANK BRI 131-0001088-1031 AN. Andreas Bagus Upo Aranda</strong>
			</p>
		</div>
	</div>
</div>
</section>
</body>
</html>