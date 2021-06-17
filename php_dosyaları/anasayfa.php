<?php
session_start();
if ( !isset($_SESSION['tc']) ) {
header("Location: _login.php");
exit();
}
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
      <p>Randevu İşlemlerinizi Buradan Gerçekleştirebilirsiniz</p>
    </div>
<form>
<ul>
<li><a href="kayitformu.php"> <font size='4'>Randevu Almak için Tıklayınız. </font></a>
<li><a href="listele.php"> <font size='4'>Randevularınızı Görüntülemek için Tıklayınız </font></a>
</ul>
<br />
<br />
<a href='_uyesayfasi.php'><font size='4'>Geri</font></a><br />
<a href='_logout.php'><font size='4'> Oturumu Kapat </font></a>
</form>
</body>
</html>