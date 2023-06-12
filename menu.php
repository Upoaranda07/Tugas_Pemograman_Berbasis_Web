<header>
    <a href="dashboard.php" class="logo">TOPIKU</a>
    <ul>
      <li><a href="dashboard.php">Home</a></li>
      <li><a href="keranjang.php">Keranjang</a></li>
      <li><a href="checkout.php">Checkout</a></li>
      <?php if (isset($_SESSION["pelanggan"])): ?>
      <li><a href="riwayat.php">Riwayat Belanja</a></li>
      <li><a href="logout.php">Logout</a></li>
      <?php else: ?>
        <ul>
          <li><a href="daftar.php">Daftar</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      <?php endif ?>
      <form action="pencarian.php" method="get" class="navbar-form">
        <input type="text" class="form-control" name="$keyword" placeholder="Search...">
        <button class="btn btn-primary">Cari</button>
      </form>
    </ul>
  </header>