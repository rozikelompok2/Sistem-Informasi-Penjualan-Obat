<?php
if(!isset($_SESSION ['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Data Resep Pasien</h3>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th><th>ID Resep</th><th>ID Pasien</th><th>Nama Pasien</th><th>Alamat Pasien</th><th>Keluhan</th><th>Nama Obat</th><th>Jumlah Obat</th><th>Aturan Pakai</th><th>Harga</th><th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM resep";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
									<td><?= $data['id_resep'] ?></td>
									<td><?= $data['id_pasien'] ?></td>
									<td><?= $data['nama_pasien'] ?></td>
                                    <td><?= $data['alamat_pasien'] ?></td>
									<td><?= $data['keluhan'] ?></td>
                                    <td><?= $data['nama_obat'] ?></td>
                                    <td><?= $data['jml_obat'] ?></td>
                                    <td><?= $data['aturan_pakai'] ?></td>
                                    <td><?= $data['harga'] ?></td>
                                    <td>
                                        <a href="?page=resep&actions=detail&id_resep=<?= $data['id_resep'] ?>" class="btn btn-info btn-xs">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <a href="?page=resep&actions=edit&id_resep=<?= $data['id_resep'] ?>" class="btn btn-warning btn-xs">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="?page=resep&actions=delete&id_resep=<?= $data['id_resep'] ?>" class="btn btn-danger btn-xs">
                                            <span class="fa fa-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <a href="?page=resep&actions=tambah" class="btn btn-info btn-sm">
                                        Tambah Resepan

                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
