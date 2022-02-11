<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
}

include "../../lib/koneksi.php";
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../../lib/pagination.php";

include "../templates/header.php";
if (isset($_POST['simpan']))
{
    $no = $_POST['no'] - 1 ;
    for ($i = 0; $i < $no; $i++)
    {
        print_r($_POST['no']);
        $tanggal = mysqli_real_escape_string($koneksi, trim($_POST['tanggal']));
        $id_transaksi = mysqli_real_escape_string($koneksi, trim($_POST['id_transaksi']));
        $id_barang = mysqli_real_escape_string($koneksi, trim($_POST['id_barang'][$i]));
        $id_pasien = mysqli_real_escape_string($koneksi, trim($_POST['id_pasien']));
        $no_nota = mysqli_real_escape_string($koneksi, trim($_POST['no_nota']));
        $total = mysqli_real_escape_string($koneksi, trim($_POST['total']));
        $subtotal = mysqli_real_escape_string($koneksi, trim($_POST['stotal'][$i]));
        $qty = mysqli_real_escape_string($koneksi, trim($_POST['qty'][$i]));
        $bayar = mysqli_real_escape_string($koneksi, trim($_POST['bayar']));
        $kembalian = mysqli_real_escape_string($koneksi, trim($_POST['kembalian']));
        
        $query = "INSERT INTO transaksi VALUES ('', '$id_transaksi', '$id_barang', '$id_pasien', '$no_nota', '$subtotal', '$qty', '$tanggal', '$total', '$bayar', '$kembalian')";
        
        $sql = mysqli_query($koneksi, $query);
    }
?>

<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h3>Cetak Nota</h3>
            <br>
            <button id="print-btn" class="btn btn-default">Print Struk</button>
            <a href="main.php" class="btn btn-default">Kembali</a>
		</div>
	</div>
	<div class="clearfix"></div>
    <hr>
    <div id="print-div">
        <div class="col-md-5">
            <h3 align="center">STRUK PEMBELIAN OBAT</h3>
            <h4 align="center">Apotek Sari Farma</h4>
            <hr>
            <center>
                <span><b>Tanggal : </b></span>
                <span><?= $_POST['tanggal'] ?></span>
            </center>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <center>
                        <span><b>ID Transaksi : </b></span>
                        <span><?= $_POST['id_transaksi'] ?></span>
                    </center>
                </div>
                <div class="col-md-6">
                    <center>
                        <span><b>No. Nota : </b></span>
                        <span><?= $_POST['no_nota'] ?></span>
                    </center>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <center>
                    <span>Nama Barang</span>
                    <?php
                        foreach($_POST['nama_barang'] as $b)
                        {
                            echo "<h5>".$b."</h5>";
                        }
                    ?>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                    <span>Harga</span>
                    <?php
                        foreach($_POST['harga'] as $h)
                        {
                            echo "<h5>".number_format($h)."</h5>";
                        }
                    ?>
                    </center>
                </div>
                <div class="col-md-2">
                    <center>
                    <span>QTY</span>
                    <?php
                        foreach($_POST['qty'] as $qty)
                        {
                            echo "<h5>x ".$qty."</h5>";
                        }
                    ?>
                    </center>
                </div>
                <div class="col-md-4">
                    <center>
                    <span>Sub Total</span>
                    <?php
                        foreach($_POST['stotal'] as $st)
                        {
                            echo "<h5>Rp. ".number_format($st)."</h5>";
                        }
                    ?>
                    </center>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5 align="left"><b>Total</b></h5>
                    <h5 align="left"><b>Bayar</b></h5>
                    <h5 align="left"><b>Kembalian</b></h5>
                </div>
                <div class="col-md-4">
                    <h5 align="center">Rp. <?= number_format($_POST['total']) ?></h5>
                    <h5 align="center">Rp. <?= number_format($_POST['bayar']) ?></h5>
                    <h5 align="center">Rp. <?= number_format($_POST['bayar'] - $_POST['total']) ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(window).ready(function(){
        $('#print-btn').on('click', function(){
            window.print();
        })
    })
</script>
<?php
    include "../templates/footer.php";
    unset($_POST);
}
else
{
    echo "<script>window.location='main.php'</script>";
}

?>