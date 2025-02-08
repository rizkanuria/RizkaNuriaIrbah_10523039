<?php
include ('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA MATA KULIAH</h3>
<br /><hr /><br />
<p>
<?php
if (!isset($_POST['submit']))
{
?>
    <form enctype="multipart/form-data" method="post">
        <table width="100%" border="0">
        <tr>
        <td width="27%"> KODE MATA KULIAH</td> 
        <td width="4%">:</td>
        <td width="69%"><input type="text" name="kode_matkul" size="30" placeholder="KODE MATKUL"></td> 
</tr>

<tr> 
    <td>NAMA MATA KULIAH</td> 
    <td>:</td> 
    <td><label>
        <select name="nama_matkul">
            <option value="">-PILIH-</option>
            <option value="pemrograman web"> PEMROGRAMAN WEB</option>
            <option value="akuntansi"> AKUNTANSI</option>
            <option value="matematika"> MATEMATIKA</option>
            <option value="agama"> AGAMA</option>
            <option value="bahasa inggris"> BAHASA INGGRIS</option>
            <option value="javascript"> JAVASCRIPT</option>
            <option value="algoritma"> ALGORITMA</option>
            <option value="struktur data"> STRUKTUR DATA</option>
            <option value="bahasa indonesia"> BAHASA INDONESIA</option>
    </select> </label><br /></td>
</tr>
        <td>
        <input id="submit" name="submit" type="submit" value="TAMBAH"></td>
</tr>
</table>
</form>

    <?php
}
    else
    { 
    $kode_matkul    =$_POST["kode_matkul"];
    $nama_matkul    =ucwords(strtolower($_POST["nama_matkul"]));

    //input Data Mata Kuliah

    $insertmatkul="INSERT INTO matakuliah VALUE ('$kode_matkul','$nama_matkul')";
    $querymatkul=mysqli_query($koneksi,$insertmatkul);

    if ($querymatkul)
    {
    echo"<script>alert('Mata Kuliah Berhasil Disimpan !') </script>";
    echo"<script type='text/javascript'>window.location='./?adm=matakuliah'</script>";
    }
else
{
    echo"<script>alert('Mata Kuliah Gagal Disimpan !') </script>";
    echo"<script type='text/javascript'>window.location='./?adm=matakuliah'</script>";
    }
}
?>
<a href="./?adm=matakuliah">&raquo; KEMBALI</a>