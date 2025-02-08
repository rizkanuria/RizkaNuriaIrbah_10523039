<?php
 include ('../koneksi/koneksi.php');
 ?>

 <h3> TAMBAH DATA DOSEN </h3>
 <br/> <hr/> <br/>
 <p>
    <?php
    if (!isset($_POST['submit']))
{
    ?>
    <form enctype="multipart/form-data" method="post">
        <table width="100%" border="0">
            <tr>
                <td width="27%">NIP</td>
                <td width="4%">:</td>
                <td width="69%"><input type="text" name="nip" size="30" placeholder="NIP"> </td>
</tr>
<tr>
    <td>NAMA</td>
    <td>:</td>
    <td><input name="nama" type="text" id="nama" size="30" placeholder="NAMA"/></td>
</tr>
<tr>
    <td>KODE MATA KULIAH</td>
    <td>:</td>
    <td><input name="kode_matkul" type="text" id="kode_matkul" size="30" placeholder="KODE MATA KULIAH"></td>
</tr>

<tr>
    <td>PASSWORD</td>
    <td>:</td>
    <td><input name="password" type="text" id="pasword" size="30" placeholder="PASSWORD"></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>
    <input id="submit" name="submit" type="submit" value="TAMBAH"></td>
</tr>
</table>
</form>
<?php
}
else
{
    $nip              =$_POST["nip"];
    $nama             =$_POST["nama"];
    $kode_matkul      =$_POST["kode_matkul"]; 
    $password         =md5($_POST["password"]);

    //input data dosen

    $insertDosen="INSERT INTO dosen VALUE ('$nip', '$nama', '$kode_matkul', '$password')";
    $queryDosen=mysqli_query($koneksi, $insertDosen);

    if($queryDosen)
    {
        echo"<script>alert('Daftar Berhasil Disimpan !') </script>";
        echo"<script type='text/javascript'>window.location='./?adm=dosen'</script>";
    }
    else
    {
        echo"<script>alert('Daftar Gagal Disimpan !') </script>";
        echo"<script type='text/javascript'>window.location='./?adm=dosen'</script>";
    }

}
?>
<a href="./?adm=dosen">&raquo; KEMBALI</a>