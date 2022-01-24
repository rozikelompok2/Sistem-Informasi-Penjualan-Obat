<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Pembelian Barang</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM beli WHERE id_pembelian='" . $_GET ['id_pembelian'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">Id Pembelian</td> <td><?= $data['id_pembelian'] ?></td>
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
                            <td>No. Bukti</td> <td><?= $data['no_bukti'] ?></td>
                        </tr>
                        <tr>
                            <td>Diskon</td> <td><?= $data['diskon'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=pembelian&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Pembelian </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

