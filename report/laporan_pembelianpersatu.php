<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Pembelian Stok</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>  
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $sql = "SELECT * FROM beli WHERE id_pembelian='" . $_GET ['id'] . "'";
        //proses query ke database
        $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
        //Merubaha data hasil query kedalam bentuk array
        $data = mysqli_fetch_array($query);
        ?>   

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        <h2>Sistem Informasi Penjualan Obat Apotek Kisaran </h2>
                        <h4>Jalan Jendral Ahmad Yani No. 33, Sei Renggas, Kisaran, Sendang Sari <br> Kisaran Barat, Kabupaten Asahan, Sumatera Utara, 21211</h4>
                        <hr>
                        <h3>DATA PEMBELIAN STOK</h3>
                        <table class="table table-bordered table-striped table-hover"> 
                            <tbody>
								<tr>
                                    <td>ID Pembelian</td> <td><?= $data['id_pembelian'] ?></td>
                                </tr>
                                <tr>
                                    <td>ID Supplier</td> <td><?= $data['id_supplier'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Supplier</td> <td><?= $data['nama_supplier'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Beli</td> <td><?= $data['tgl_beli'] ?></td>
                                </tr>
								<tr>
                                    <td>Nomor Bukti</td> <td><?= $data['no_bukti'] ?></td>
                                </tr>
								<tr>
                                    <td>Diskon</td> <td><?= $data['diskon'] ?></td>
                                </tr>
                            </tbody>
                            <tfoot> 
                                <tr>
                                    <td colspan="2" class="text-right">
                                        Kisaran  <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>Kabag Hukum, S.Hum<strong></u><br>
                                        NIP.102871291416712
									</td>
								</tr>
							</tfoot> 
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>