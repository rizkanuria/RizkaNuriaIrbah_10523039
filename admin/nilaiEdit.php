<?php
include "../koneksi/koneksi.php";

$queryNilai  ="select m.nim, m.nama, n.nl_tugas, n.nl_uts, n.nl_uas,
                (0.2 * n.nl_tugas) + (0.4 * n.nl_uts) + (0.4 * n.nl_uas),
                d.nip, d.nama from nilai n
                left join mahasiswa m on n.nim = m.nim
                left join dosen d on d.nip = n.nip";
$resultNilai  =mysqli_query($koneksi, $queryNilai);
$countNilai   =mysqli_num_rows($resultNilai);
?>
<h3> EDIT DATA NILAI </h3>
<br/><hr/><br/>
<p>

<?php
if (!isset($_POST['submit']))
{
    ?>
    <form enctype="multipart/form-data" method="post">
        <table width="100%" border="0">
        <tr>
    <td height="50"> NAMA MAHASISWA </td>
    <td>:</td>
    <td>
        <label>
            <select name="mhs" class='form-control'>
                <option value="">-=PILIH=-</option>
                <?php
                $queryMhs ="select nim, nama from mahasiswa";
                $resultMhs =mysqli_query($koneksi, $queryMhs);
                while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)) {
                    echo "<option value = '$dataMhs[0]'> $dataMhs[1] </option>";
                }
                ?>
                </select>
            </label>
            <br/>
            </td>
            </tr>
            <tr>
    <td height="50"> NAMA DOSEN </td>
    <td>:</td>
    <td>
        <label>
            <select name="dosen" class='form-control'>
                <option value="">-=PILIH=-</option>
                <?php
                $queryDosen ="select nip, nama from dosen";
                $resultDosen =mysqli_query($koneksi, $queryDosen);
                while ($dataDosen = mysqli_fetch_array($resultDosen, MYSQLI_NUM)) {
                    echo "<option value = '$dataDosen[0]'> $dataDosen[1] </option>";
                }
                ?>
                </select>
            </label>
            <br/>
            </td>
            </tr>
<tr>
    <td>NILAI TUGAS</td>
    <td>:</td>
    <td><input name="tugas" type="text" id="tugas" size="30" placeholder="TUGAS"/></td>
</tr>
<tr>
    <td>NILAI UTS</td>
    <td>:</td>
    <td><input name="uts" type="text" id="uts" size="30" placeholder="UTS"/></td>
</tr>
<tr>
    <td>NILAI UAS</td>
    <td>:</td>
    <td><input name="uas" type="text" id="uas" size="30" placeholder="UAS"/></td>
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
  $mhs   =$_POST["mhs"];
  $dosen   =$_POST["dosen"];
  $tugas   =$_POST["tugas"];
  $uts   =$_POST["uts"];
  $uas   =$_POST["uas"];


    //input data mahasiswa
    $updateNilai ="UPDATE nilai SET nl_tugas='$tugas', nl_uts='$uts', nl_uas='$uas', nip='$dosen' WHERE nim='$mhs'";

    $queryNilai=mysqli_query($koneksi, $updateNilai);

    if ($queryNilai)
    {
        echo"<script>alert('Data Berhasil Diubah !') </script>";
        echo"<script type='text/javascript'>window.location='./?adm=nilai'</script>";
    }
    else
    {
        echo"<script>alert('Data Gagal Diubah !') </script>";
        echo"<script type='text/javascript'>window.location='./?adm=nilai'</script>";
    }
}
?>
<a href="./?adm=nilai">&raquo;KEMBALI </a></p>