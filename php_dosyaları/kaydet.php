<?php
session_start();
require('_mysqlbaglan.php');
if ( !isset($_SESSION['tc']) ) {
header("Location: _login.php");
exit();
}
include("_mysqlbaglan.php");
extract($_POST);

$sql1="SELECT doktoradi,doktorsoyadi FROM doktorlar WHERE doktoradi='$doktor'";
$cevapa = mysqli_query($baglanti, $sql1);
$gelen=mysqli_fetch_array($cevapa);

$dad=$gelen['doktoradi'];
$dsoyad=$gelen['doktorsoyadi'];

echo "<html>";
echo "<meta http-equiv='Content-Type' ";
echo "content='text/html; charset=UTF-8' />";

$tcnumarasi=$_SESSION['tc'];

$sql = "INSERT INTO randevu ".
"(randevutc,randevudoktoradi,randevudoktorsoyadi,randevutarih,randevusaati) ".
"VALUES ( '$tcnumarasi','$dad','$dsoyad','$tarih','$saati')";

$cevap = mysqli_query( $baglanti,$sql);
if(!$cevap){
echo '<br>Hata:' . mysqli_error($baglanti);
}
echo "</html>";
mysqli_close($baglanti);
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="form.css" />
</head>
<body>
    <div id="body_header">
      <h1>İNCİ DİŞ HASTANESİ RANDEVU SİSTEMİ</h1>
      <p>Lütfen Şeçtiğiniz Tarih ve Saatte Hastanede Olunuz !</p>
    </div>
<br />
<form>
<?php 
echo "<html>";
echo "<meta http-equiv='Content-Type' ";
echo "content='text/html; charset=UTF-8' />";
echo "<font size='5'>Randevu Bilgileriniz</font></br><br />";
echo "<font size='4'>Doktor Seçiminiz: $dad $dsoyad</font></br>";
echo "<font size='4'>Tarih:$tarih </font></br>";
echo "<font size='4'>Saat :$saati </font></br>";

if(!$cevap){
echo '<br>Hata:' . mysqli_error($baglanti);
}
else
{
echo "<br />";
echo "<font size='4'>Randevunuz Oluşturulmuştur!</font>";
echo "<br />";
}
echo "</html>";
?>
<br />
<a href='anasayfa.php'> <font size='4'>Ana sayfa </font></a>
</form>
</body>
</html>