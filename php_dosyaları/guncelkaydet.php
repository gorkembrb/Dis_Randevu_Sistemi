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

$sql ="UPDATE randevu ".
"SET
randevudoktoradi='$dad',randevudoktorsoyadi='$dsoyad',randevutarih='$tarih',randevusaati='$saati' ".
"WHERE randevuid=".$_GET['id'];

$cevap = mysqli_query(
$baglanti,$sql);
echo "<html>";
echo "<meta http-equiv='Content-Type' ";
echo "content='text/html; charset=UTF-8' />";
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
      <p>Randevu Güncelleme</p>
    </div>
<form>
<?php
echo "<html>";
echo "<meta http-equiv='Content-Type' ";
echo "content='text/html; charset=UTF-8' />";
if(!$cevap){
echo '<br>Hata:' . mysqli_error($baglanti);
}
else{
echo "<br /><font size='4'>Randevunuz Güncellenmiştir!</font>";
echo "<br />";
echo "<br />";
}
echo "</html>";
?>
<br />
<a href='listele.php'><font size='4'>Randevularım</font></a><br />
<a href='anasayfa.php'><font size='4'>Ana Sayfaya Dön </font></a>
</form>
</body>
</html>
