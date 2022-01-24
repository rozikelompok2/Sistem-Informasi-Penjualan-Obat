<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="?page=utama">Sistem Informasi Penjualan Obat</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="?page=utama">Home</a></li>

                <?php if(isset($_SESSION['level']) && $_SESSION['level']==1) { ?>

                <li><a href="?page=transaksi&actions=tampil">Transaksi</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master Data <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?page=barang&actions=tampil">Data Barang</a></li>
                        <li><a href="?page=pembeli&actions=tampil">Data Pasien</a></li>
                        <li><a href="?page=pembelian&actions=tampil">Data Pembelian</a></li>
                        <li><a href="?page=resep&actions=tampil">Data Resep Pasien</a></li>
                        <li><a href="?page=supplier&actions=tampil">Data Supplier</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?page=barang&actions=report">Laporan Barang (Obat)</a></li>
						<li><a href="?page=pembeli&actions=report">Laporan Pembeli (Pasien)</a></li>
                        <li><a href="?page=pembelian&actions=report">Laporan Pembelian Barang</a></li>
                        <li><a href="?page=resep&actions=report">Laporan Resep Pasien</a></li>
                        <li><a href="?page=supplier&actions=report">Laporan Supplier</a></li>
                    </ul>
                </li>
                <li><a href="?page=user&actions=tampil">User</a></li>


                <?php } ?>


                <li><a href="?page=about&actions=tampil">About</a></li>
                <li><a href="?page=kontak&actions=tampil">Contact</a></li>

                    <?php if (isset($_SESSION['username'])) { ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>
