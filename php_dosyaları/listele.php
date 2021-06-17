<?php
session_start();
require('_mysqlbaglan.php');
if ( !isset($_SESSION['tc']) ) {
header("Location: _login.php");
exit();
}
$tcno=$_SESSION['tc'];
include("_mysqlbaglan.php");
$sql = "SELECT randevuid,randevudoktoradi,randevudoktorsoyadi,randevutarih,randevusaati FROM randevu WHERE randevutc='$tcno'";

$cevap = mysqli_query($baglanti,$sql);
if(!$cevap ){
echo '<br>Hata:'. mysqli_error($baglanti);
}
echo "<html>";
echo "<meta http-equiv='Content-Type' ";
echo "content='text/html; charset=UTF-8'/>";

echo "<head>";
echo "<link rel='stylesheet' type='text/css' href='form.css' />";
echo "</head>";	

echo "<body>";
echo "<div id='body_header'>";
echo "<h1>İNCİ DİŞ HASTANESİ RANDEVU SİSTEMİ</h1>";
echo "<p>Randevularım</p>";
echo "</div>";

echo "<form>";
echo "<table border=1>";
echo "<tr>";
echo "<th>Doktor Adı</th>";
echo "<th>Doktor Soyadı</th>";
echo "<th>Tarih</th>";
echo "<th>Saat</th>";
echo "</tr>";

while($gelen=mysqli_fetch_array($cevap))
{	
echo "<tr><td>".$gelen['randevudoktoradi']."</td>";
echo "<td>".$gelen['randevudoktorsoyadi']."</td>";
echo "<td>".$gelen['randevutarih']."</td>";
echo "<td>".$gelen['randevusaati']."</td>";
echo "<td><a href=güncelle.php?id=";
echo $gelen['randevuid'];
echo ">Güncelle</a></td>";
echo "<td><a href=kayitsil.php?id=";
echo $gelen['randevuid'];
echo ">Sil</a></td></tr>";
}
echo "</table>";
echo "<br/><a href='anasayfa.php'><font size='4'> Geri Dön</font></a>";
echo "<br />";
echo "<a href='anasayfa.php'> <font size='4'>Ana sayfa </font></a>";
echo "</form>";
echo "</body>";
echo "</html>";

mysqli_close($baglanti);
?>

