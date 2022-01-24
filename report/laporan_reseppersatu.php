<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Resep Pasien</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $sql = "SELECT * FROM resep WHERE id_resep='" . $_GET ['id'] . "'";
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
                        <h3>DATA RESEP PASIEN</h3>
                        <table class="table table-bordered table-striped table-hover">
                            <tbody>
                                <tr>
                                    <td>ID Resep</td> <td><?= $data['id_resep'] ?></td>
                                </tr>
								<tr>
                                    <td>ID Pasien</td> <td><?= $data['id_pasien'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Pasien</td> <td><?= $data['nama_pasien'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat Pasien</td> <td><?= $data['alamat_pasien'] ?></td>
                                </tr>
                                <tr>
                                    <td>Keluhan</td> <td><?= $data['keluhan'] ?></td>
                                </tr>
								<tr>
                                    <td>Nama Obat</td> <td><?= $data['nama_obat'] ?> </td>
                                </tr>
                                <tr>
                                    <td>Jumlah Obat</td> <td><?= $data['jml_obat'] ?> </td>
                                </tr>
                                <tr>
                                    <td>Aturan Pakai</td> <td><?= $data['aturan_pakai'] ?> </td>
                                </tr>
                                <tr>
                                    <td>Harga</td> <td><?= $data['harga'] ?> </td>
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
