<?php
session_start();
require('_mysqlbaglan.php');
if ( !isset($_SESSION['tc']) ) {
header("Location: _login.php");
exit();
}
include("_mysqlbaglan.php");
$sql = "SELECT randevudoktoradi,randevudoktorsoyadi,randevutarih,randevusaati FROM randevu WHERE
randevuid=".$_GET['id'];
$cevap = mysqli_query($baglanti,$sql);
if(!$cevap ){
echo '<br>Hata:' . mysqli_error($baglanti);
}
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
      <p>Randevu Güncelleme </p>
    </div>
<form action="guncelkaydet.php?id=<?php echo
$_GET['id'] ?>" method="POST">
<font size='4'>Doktor Seçiniz: </font> 
<select name="doktor">
	<option value="Mehmet"> Mehmet Elçi </option>
	<option value="Feridun"> Feridun Kalem </option>
	<option value="Fatma"> Fatma Kılınç </option>
	<option value="Kazım"> Kazım Kağan </option>
	<option value="Derya"> Derya Toköz </option>
</select> <br />
<font size='4'>Randevu Tarihi :</form> <input type="date" name="tarih" min=<?php echo date('Y-m-d'); ?>  value="<?php echo $gelen['randevutarih'] ?>" /> <br />
<font size='4'>Randevu Saati:</form> <input type="time" name="saati" min="10:00" max="17:00" value="<?php echo $gelen['randevusaati'] ?>" /> <span class="validity"></span> <br />
<input type="submit" value="Güncelle"/>
<br />
<br />
<a href='listele.php'><font size='4'>Geri</font></a>
</form>
</body>
</html>