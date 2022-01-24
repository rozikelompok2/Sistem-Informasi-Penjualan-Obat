<?php
//membuat query untuk hapus data
$sql="DELETE FROM pasien WHERE id_pasien ='".$_GET['id_pasien']."'";
$query=mysqli_query($koneksi, $sql) or die ("SQL Hapus Error");
if($query){
    echo"<script> window.location.assign('?page=pembeli&actions=tampil');</script>";
}else{
    echo"<script> alert ('Maaf !!! Data Tidak Berhasil Dihapus') window.location.assign('?page=pembeli&actions=tampil');</scripr>";
}

