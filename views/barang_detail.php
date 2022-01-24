<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Arsip</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM barang WHERE id_barang ='" . $_GET ['id_barang'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">Ruang Arsip</td> <td><?= $data['id_barang'] ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Rak/Lemari</td> <td><?= $data['id_pembelian'] ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Tingkat/Laci</td> <td><?= $data['nama_barang'] ?></td>
                        </tr>
						<tr>
                            <td>Nomor Boks</td> <td><?= $data['harga_beli'] ?></td>
                        </tr>
                        <tr>
                            <td>Para Pihak</td> <td><?= $data['harga_jualsatuan'] ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Perkara</td> <td><?= $data['stok'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=barang&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Barang </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

