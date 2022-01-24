<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Barang</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>  
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $sql = "SELECT * FROM barang WHERE id_barang='" . $_GET ['id'] . "'";
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
                        <h3>DATA BARANG (OBAT)</h3>
                        <table class="table table-bordered table-striped table-hover"> 
                            <tbody>
								<tr>
                                    <td>ID Barang (Obat)</td> <td><?= $data['id_barang'] ?></td>
                                </tr>
                                <tr>
                                    <td>ID Pembelian</td> <td><?= $data['id_pembelian'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Barang</td> <td><?= $data['nama_barang'] ?></td>
                                </tr>
                                <tr>
                                    <td>Harga Beli</td> <td><?= $data['harga_beli'] ?></td>
                                </tr>
								<tr>
                                    <td>Harga Jual Satuan</td> <td><?= $data['harga_jualsatuan'] ?></td>
                                </tr>
								<tr>
                                    <td>Stok Barang</td> <td><?= $data['stok'] ?></td>
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