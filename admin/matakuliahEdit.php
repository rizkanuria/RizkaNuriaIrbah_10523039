<?php
    include ('../koneksi/koneksi.php');

    $getkode       =$_GET["kode_matkul"];
    $editmatkul    ="SELECT * FROM matakuliah WHERE kode_matkul = '$getkode'";
    $resultmatkul  =mysqli_query($koneksi,$editmatkul);
    $datamatkul    =mysqli_fetch_array($resultmatkul);
?>

<h3>EDIT DATA MATA KULIAH</h3>
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
        <td width="69%"><input type="text" name="kode_matkul" size="30" value="<?php echo $datamatkul[0] ?>"
        readonly="readonly"></td> 
</tr>

<tr> 
    <td height="50">NAMA MATA KULIAH</td> 
    <td>:</td> 
    <td>
        <select name="nama_matkul">
            <option value="">-PILIH-</option>
            <option value="pemrograman web" <?php if ($datamatkul['nama_matkul'] == 'pemrograman web') echo 'selected'; ?>><?php echo ucwords('pemrograman web'); ?></option>
            <option value="akuntansi" <?php if ($datamatkul['nama_matkul'] == 'akuntansi') echo 'selected'; ?>><?php echo ucwords('akuntansi'); ?></option>
            <option value="matematika" <?php if ($datamatkul['nama_matkul'] == 'matematika') echo 'selected'; ?>><?php echo ucwords('matematika'); ?></option>
            <option value="agama" <?php if ($datamatkul['nama_matkul'] == 'agama') echo 'selected'; ?>><?php echo ucwords('agama'); ?></option>
            <option value="bahasa inggris" <?php if ($datamatkul['nama_matkul'] == 'bahasa inggris') echo 'selected'; ?>><?php echo ucwords('bahasa inggris'); ?></option>
            <option value="javascript" <?php if ($datamatkul['nama_matkul'] == 'javascript') echo 'selected'; ?>><?php echo ucwords('javascript'); ?></option>
            <option value="algoritma" <?php if ($datamatkul['nama_matkul'] == 'algoritma') echo 'selected'; ?>><?php echo ucwords('algoritma'); ?></option>
            <option value="struktur data" <?php if ($datamatkul['nama_matkul'] == 'struktur data') echo 'selected'; ?>><?php echo ucwords('struktur data'); ?></option>
            <option value="bahasa indonesia" <?php if ($datamatkul['nama_matkul'] == 'bahasa indonesia') echo 'selected'; ?>><?php echo ucwords('bahasa indonesia'); ?></option>
        </select>
    </td>
</tr>

        <td>
        <input id="submit" name="submit" type="submit" value="UBAH"></td>
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

    $insertmatkul="UPDATE matakuliah SET nama_matkul='$nama_matkul' WHERE kode_matkul='$kode_matkul'";
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