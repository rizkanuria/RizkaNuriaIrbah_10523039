<?php
include ('../koneksi/koneksi.php');

$nim=$_GET["nim"];
$nip=$_GET["nip"];
$delMhs  ="DELETE FROM nilai WHERE nim='$nim' and nip='$nip' ";
$resultMhs  =mysqli_query($koneksi, $delMhs);

if($resultMhs)
{
        echo"<script>alert('Data nilai berhasil Dihapus !') </script>";
        echo"<script type='text/javascript'>window.location='./?adm=nilai'</script>";
}
else
{
    echo"<script>alert('Data nilai Gagal Dihapus !') </scripat>";
        echo"<script type='text/javascript'>window.location='./?adm=nilai'</script>";
}
?>