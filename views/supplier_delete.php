<?php
//membuat query untuk hapus data
$sql="DELETE FROM supplier WHERE id_supplier ='".$_GET['id_supplier']."'";
$query=mysqli_query($koneksi, $sql) or die ("SQL Hapus Error");
if($query){
    echo"<script> window.location.assign('?page=supplier&actions=tampil');</script>";
}else{
    echo"<script> alert ('Maaf !!! Data Tidak Berhasil Dihapus') window.location.assign('?page=supplier&actions=tampil');</scripr>";
}

