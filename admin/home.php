<center><h1>Selamat Datang Administrator</h1></center>

<h2>  Data Admin</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Nama Lengkap</th>

		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM admin"); ?>
		<?php while($pecah =$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['username']; ?></td>
			<td><?php echo $pecah['nama_lengkap']; ?></td>
		</tr>
		<?php $nomor++;?>
		<?php } ?>
	</tbody>
</table>
