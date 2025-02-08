<?php
include "../koneksi/koneksi.php";

$queryDosen   ="SELECT * FROM dosen";
$resultDosen   =mysqli_query ($koneksi, $queryDosen);
$countDosen    =mysqli_num_rows ($resultDosen);
?>

<h3> DATA DOSEN </h3>
<hr/><br/>
<a href="./?adm=dosenAdd"><input name="add" type="submit" class="buttonadm" value="TAMBAH DATA DOSEN"/></a>
<br>
<br>
<table border="1" id="boxtable">
    <!-- TABEL MASTER DOSEN -->
     <tr class="odd">
        <th>NIP</th>
        <th>NAMA</th>
        <th>KODE MATA KULIAH</th>
        <th>PASSWORD</th>
        <th>AKSI</th>
</tr>
<?php
if ($countDosen > 0)
{
    while($dataDosen=mysqli_fetch_array($resultDosen, MYSQLI_NUM))
 {
?>

<tr class="add">
    <td class="value"><?php echo"$dataDosen[0]"; ?></td>
    <td class="value"><?php echo"$dataDosen[1]"; ?></td>
    <td class="value"><?php echo"$dataDosen[2]"; ?></td>
    <td class="value"><?php echo"$dataDosen[3]"; ?></td>
    <td class="value" >
        <a href="./?adm=dosenEdit&nip=<?php echo"$dataDosen[0]"; ?>">Edit</a> |
        <a href="./?adm=dosenDelete&nip=<?php echo"$dataDosen[0]"; ?>">Hapus</a> 
 </td>
</tr>
        <?php
      }
 }
        else 
  {
    echo"<tr>
     <td colspan='9' align='center' height='20'>
     <div> Belum ada data dosen</div></td>
     </tr>";
}
echo"</table>";