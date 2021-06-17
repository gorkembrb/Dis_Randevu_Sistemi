<?php
session_start();
require('_mysqlbaglan.php');
if ( !isset($_SESSION['tc']) ) {
header("Location: _login.php");
exit();
}
$tcnumarasi=$_SESSION['tc'];
$sql="SELECT kullaniciadi,kullanicisoyadi FROM `kullanicilar` WHERE kullanicitc='$tcnumarasi' ";

$cevap = mysqli_query($baglanti, $sql);
$gelen=mysqli_fetch_array($cevap);
?>
<html>
<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />
<head>
  <link rel="stylesheet" type="text/css" href="form.css" />
</head>
<body>
    <div id="body_header">
      <h1>İNCİ DİŞ HASTANESİ RANDEVU SİSTEMİ</h1>
      <p>Giriş Başarılı !</p>
    </div>
	<form>
<p> <font size='4'>Merhaba <?php echo $gelen['kullaniciadi']; echo ' '; echo $gelen['kullanicisoyadi'] ?>, <br />
İNCİ Diş Hastanesine Hoş Geldiniz.</font><br /><br /></p>
<a href='anasayfa.php'><font size='4'>Randevu İçin Tıklayınız.<font></a><br />
<br />
<a href='_logout.php'><font size='4'>Oturumu Kapat</font></a>
</form>
</body>
</html>