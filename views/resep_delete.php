<?php
//membuat query untuk hapus data
$sql="DELETE FROM resep WHERE id_resep ='".$_GET['id_resep']."'";
$query=mysqli_query($koneksi, $sql) or die ("SQL Hapus Error");
if($query){
    echo"<script> window.location.assign('?page=resep&actions=tampil');</script>";
}else{
    echo"<script> alert ('Maaf !!! Data Tidak Berhasil Dihapus') window.location.assign('?page=resep&actions=tampil');</scripr>";
}

