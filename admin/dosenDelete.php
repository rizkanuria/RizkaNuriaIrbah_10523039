<?php
include ('../koneksi/koneksi.php');

$nip=$_GET["nip"];
$delDosen  ="DELETE FROM dosen WHERE nip='$nip'";
$resultDosen  =mysqli_query($koneksi, $delDosen);

if($resultDosen)
{
        echo"<script>alert('Data dosen berhasil Dihapus !') </script>";
        echo"<script type='text/javascript'>window.location='./?adm=dosen'</script>";
}
else
{
    echo"<script>alert('Data dosen Gagal Dihapus !') </script>";
        echo"<script type='text/javascript'>window.location='./?adm=dosen'</script>";
}
?>