<?php

include "../../lib/koneksi.php";

if (isset($_GET['id']))
{
    $id = mysqli_real_escape_string($koneksi, trim($_GET['id']));
    $query = "DELETE FROM transaksi WHERE no_nota = '$id'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql)
    {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<script>window.location='main.php'</script>";
    }
}
else
{
    echo "<script>window.location='main.php'</script>";
}

?>