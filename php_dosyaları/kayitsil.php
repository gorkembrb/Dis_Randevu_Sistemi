<?php
session_start();
require('_mysqlbaglan.php');
if ( !isset($_SESSION['tc']) ) {
header("Location: _login.php");
exit();
}
include("_mysqlbaglan.php");
$sql = "DELETE FROM randevu WHERE randevuid=".$_GET['id'];
$cevap = mysqli_query($baglanti,$sql);
echo "<html>";
echo "<meta http-equiv='Content-Type' ";
echo "content='text/html; charset=UTF-8' />";
if(!$cevap ){
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
      <p>Randevu Silme</p>
    </div>
<form>
<?php
echo "<meta http-equiv='Content-Type' ";
echo "content='text/html; charset=UTF-8' />";
if(!$cevap ){
echo '<br>Hata:' . mysqli_error($baglanti);
}
else
{
echo "<br /><font size='4'>Randevunuz Silinmiştir!</font></br>";
}
?>
<br /><br />
<a href='listele.php'><font size='4'>Randevularım </font></a><br />
<a href='anasayfa.php'><font size='4'>Ana Sayfa</font></a>
</form>
</body>
</html>




