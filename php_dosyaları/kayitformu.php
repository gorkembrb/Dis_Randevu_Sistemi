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
      <p>Lütfen Doktor,Tarih ve Saat Bilgisi Giriniz !</p>
    </div>
<form action="kaydet.php" method="POST">
<font size='4'>Doktor Seçiniz : </font>
<select name="doktor">
	<option value="Mehmet"> Mehmet Elçi </option>
	<option value="Feridun"> Feridun Kalem </option>
	<option value="Fatma"> Fatma Kılınç </option>
	<option value="Kazım"> Kazım Kağan </option>
	<option value="Derya"> Derya Toköz </option>
</select> <br />
<font size='4'>Randevu Tarihi :</font> <input type="date" name="tarih" min=<?php echo date('Y-m-d'); ?> /> <br />
<font size='4'>Randevu Saati (10:00-17:00) : </font><input type="time" name="saati" min="10:00" max="17:00" /> <span class="validity"></span> <br />
<input type="submit" value="Kaydet"/><br />
<br/><a href='anasayfa.php'> <font size='4'>Geri</font></a>
</form>
</body>
</html>