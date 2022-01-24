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
                    $sql = "SELECT *FROM supplier WHERE id_supplier='" . $_GET ['id_supplier'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">Id Supplier</td> <td><?= $data['id_supplier'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Supplier</td> <td><?= $data['nama_supplier'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Supplier</td> <td><?= $data['alamat_supplier'] ?></td>
                        </tr>
						<tr>
                            <td>No. Telephone</td> <td><?= $data['telpon'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=supplier&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Supplier </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

