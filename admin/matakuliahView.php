<?php
include "../koneksi/koneksi.php";

$querymatkul= "SELECT * FROM matakuliah";
$resultmatkul = mysqli_query ($koneksi, $querymatkul);
$countmatkul = mysqli_num_rows ($resultmatkul);
?>

<h3> DATA MATA KULIAH </h3>
<hr/><br/>
<a href="./?adm=matakuliahAdd"><input name="add" type="submit" class="buttonadm" value="TAMBAH DATA MATA KULIAH"/></a>
<br>
<br>
<table border="1" id="boxtable">
    <!-- TABEL MASTER matkul -->
    <tr>
        <th>KODE MATA KULIAH</th>
        <th>NAMA MATA KULIAH</th>
        <th>AKSI</th>
    </tr>
<?php
if ($countmatkul > 0)
{
    while($datamatkul=mysqli_fetch_array($resultmatkul, MYSQLI_NUM))
    {
?>
<tr class="add">
        <td class="value"><?php echo"$datamatkul[0]"; ?></td>
        <td class="value"><?php echo"$datamatkul[1]"; ?></td>
        <td class="value">
            <a href="./?adm=matakuliahEdit&kode_matkul=<?php echo"$datamatkul[0]"; ?>">Edit</a> |
            <a href="./?adm=matakuliahDelete&kode_matkul=<?php echo"$datamatkul[0]"; ?>">Hapus</a>
    </td>
 </tr>
 
<?php
    }
}
else
{
    echo"<tr>
    <td colspan='9' align='center' height='20'>
    <div> Belum ada Data Mata Kuliah</div></td>
    </tr>";
}
echo" </table>";